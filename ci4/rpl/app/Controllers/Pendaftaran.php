<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pendaftar;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Pendaftaran extends BaseController
{
    protected $daftar;
    protected $mail;
    protected $valid;
    protected $ses;
    public function __construct()
    {
        $this->ses = \Config\Services::session();
        $this->valid = \Config\Services::validation();
        $this->daftar = new Pendaftar();
        $this->mail = new PHPMailer();
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'tokosupersemar1998@gmail.com';
        $this->mail->Password   = 'sdbqamgeihrwaysf';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port       = 465;
        $this->mail->setFrom('pencaksilatumb@gmail.com', 'pencaksilatumb@gmail.com');
    }
    public function Pendaftar()
    {
        if (!$this->validate([
            "nama" => "min_length[4]|required|string",
            "foto" => "uploaded[foto]|is_image[foto]",
            "nim" => "max_length[12]|required|numeric|"
        ])) {
            return redirect()->to('/');
        } else {
            $file_foto = $this->request->getFile('foto');
            $get_error_file = $file_foto->getError();
            $filename = '';
            if ($get_error_file === 4) {
                $filename = 'deflaut.jpg';
            } else {
                $filename = rand() . $file_foto->getName();
                $file_foto->move('foto_pendafar', $filename);
            }
            $data_pendafar = [
                "nim_pendaftar" => $this->request->getPost('nim'),
                "nama_pendaftar" => $this->request->getPost('nama'),
                "jurusan" => $this->request->getPost('jurusan'),
                "fakultas" => $this->request->getPost('fakultas'),
                "email" => $this->request->getPost('email'),
                "no_tlp" => $this->request->getPost('no'),
                "jk" => $this->request->getPost('jk'),
                "foto" => $filename,
                "status_pendaftar" => 1
            ];
            if ($this->daftar->where('nim_pendaftar', $data_pendafar['nim_pendaftar'])->findAll()) {
                $this->ses->setFlashdata('terdaftar');
            } else {
                if ($this->daftar->save($data_pendafar) > 0) {
                    $this->mail->addAddress($data_pendafar['email'], $data_pendafar['nama_pendaftar']);
                    $this->mail->Subject = 'Pendaftaran UKM PENCAK SILAT';
                    $this->mail->Body    = '
                    Kepada  ' . $data_pendafar['nama_pendaftar'] .  '  calon anggota UKM Pencak Silat,
                    Kami dengan senang hati ingin memberitahukan bahwa pendaftaran Anda untuk menjadi anggota UKM Pencak Silat telah berhasil!
                    Terima kasih telah berpartisipasi dalam proses pendaftaran, dan kami sangat antusias untuk menyambut Anda di dalam keluarga UKM Pencak Silat kami. 
                    Tim kami akan segera memproses data pendaftaran Anda dan mengirimkan email selanjutnya yang berisi informasi lebih lanjut mengenai Hasil seleksi.
                    Dalam waktu dekat. Jika memiliki pertanyaan atau kebutuhan informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui email ini. See you!!!';
                    $this->mail->send();
                    $_SESSION['oke'] = 'oke';
                    return redirect()->to('/');
                } else {

                    return redirect()->to('/');
                }
            }
        }
    }
}
