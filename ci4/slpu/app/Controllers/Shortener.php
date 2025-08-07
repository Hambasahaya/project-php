<?php

namespace App\Controllers;

use App\Models\LinkModel;
use Config\Services;

class Shortener extends BaseController
{
    private function random_string($length)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function check_url_with_virustotal($url)
    {
        $api_key = '964f15a6e58be968be71f229b33c52b56a9ba2ccfd8969df075e2700dc584d4a';
        $api_url = 'https://www.virustotal.com/vtapi/v2/url/report';

        $params = [
            'apikey' => $api_key,
            'resource' => $url,
            'scan' => 1
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        return isset($result['positives']) && $result['positives'] > 0;
    }

    public function shorten()
    {
        helper(['text', 'auth']);

        $url = $this->request->getPost('original_url');
        $alias_url = $this->request->getPost('alias_url');
        $encryption = $this->request->getPost('encryption');
        $password = $this->request->getPost('password');
        $userId = user_id();

        if (empty($url)) {
            return $this->response->setJSON(['error' => 'Original URL is required.']);
        }

        if ($this->check_url_with_virustotal($url)) {
            return $this->response->setJSON(['error' => 'URL Tidak Aman.', 'unsafe' => true]);
        }

        $model = new LinkModel();

        if (empty($alias_url)) {
            $random_alias = $this->random_string(6);
            $shortened_url = 'http://pupr.ai/s/' . $random_alias;
        } else {
            $shortened_url = 'http://pupr.ai/s/' . $alias_url;
        }

        $password = is_string($password) ? $password : '';

        $encrypted_password = null;
        if (!empty($password)) {
            // $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
            $config = new \Config\Encryption();
            $config->key = 'Pupr#book.2024';
            $config->driver = 'OpenSSL';
            $encrypter = Services::encrypter($config);

            $encrypted_password = base64_encode($encrypter->encrypt($password));
        }

        $encrypted_url = null;
        $is_encrypted = 0;
        if ($encryption) {
            $config = new \Config\Encryption();
            $config->key = 'Pupr#book.2024';
            $config->driver = 'OpenSSL';
            $encrypter = Services::encrypter($config);
            $encrypted_url = base64_encode($encrypter->encrypt($shortened_url));
            $is_encrypted = 1;
        }

        $data = [
            'original_url' => $url,
            'alias_url' => $alias_url,
            'shortened_url' => $shortened_url,
            'encryption' => $encrypted_url,
            'password' => $encrypted_password,
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
            'is_encrypted' => $is_encrypted
        ];

        $model->insert($data);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['shortened_url'][] = $shortened_url;

        return $this->response->setJSON(['shortened_url' => $shortened_url]);
    }

    public function redirect($shortened_url)
    {
        $model = new LinkModel();
        $link = $model->where('shortened_url', 'http://pupr.ai/s/' . $shortened_url)->first();

        if ($link) {
            if (!empty($link['password'])) {
                return view('encrypt', ['shortened_url' => $shortened_url]);
            } else {
                return redirect()->to($link['original_url']);
            }
        } else {
            return $this->response->setStatusCode(404)->setBody('Shortened URL not found.');
        }
    }

    public function decrypt()
    {
        $password = $this->request->getPost('password');
        $shortened_url = $this->request->getPost('shortened_url');

        if (empty($password)) {
            return redirect()->back()->with('error', 'Password is required.');
        }

        $config = new \Config\Encryption();
        $config->key = 'Pupr#book.2024';
        $config->driver = 'OpenSSL';
        $encrypter = \Config\Services::encrypter($config);

        $model = new LinkModel();
        $link = $model->where('shortened_url', 'http://pupr.ai/s/' . $shortened_url)->first();

        if ($link) {
            try {
                $decrypted_password = $encrypter->decrypt(base64_decode($link['password']));
            } catch (\CodeIgniter\Encryption\Exceptions\EncryptionException $e) {
                return redirect()->back()->with('error', 'Decryption failed.');
            }

            if ($password !== $decrypted_password) {
                return redirect()->back()->with('error', 'Incorrect password.');
            } else {
                return redirect()->to($link['original_url']);
            }
        } else {
            return redirect()->back()->with('error', 'Shortened URL not found.');
        }
    }

    public function delete($id)
    {
        $model = new LinkModel();

        $link = $model->find($id);
        if (!$link) {
            return $this->response->setJSON(['success' => false, 'message' => 'Link not found.']);
        }
        if ($model->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Link deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete the link.']);
        }
    }
}
