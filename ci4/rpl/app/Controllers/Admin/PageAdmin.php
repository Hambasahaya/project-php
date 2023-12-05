<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pendaftar;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PageAdmin extends BaseController
{
    protected $pendaftar;
    protected $mail;
    public function __construct()
    {
        $this->pendaftar = new Pendaftar();
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
    public function index()
    {
        return view('template/template_admin');
    }
    public function table()
    {
        $data = [
            "data_pendaftar" => $this->pendaftar->join('fakultas', 'id_fakultas=fakultas')->join('jurusan', 'id_jurusan=jurusan')->findAll()
        ];

        return view('page/admin/tables', $data);
    }
    public function delete($id)
    {
        $this->pendaftar->where('nim_pendaftar', $id)->delete();
        return redirect()->to('/admin/table');
    }
    public function verif($id)
    {
        $email = $this->pendaftar->where('nim_pendaftar', $id)->first();
        $this->mail->addAddress($email['email'], $email['nama_pendaftar']);
        $this->mail->Subject = 'Pendaftaran UKM PENCAK SILAT';
        $this->mail->Body    = '
        Kepada  ' . $email['nama_pendaftar'] .  '  calon anggota UKM Pencak Silat,
        Kami dengan senang hati ingin memberitahukan bahwa pendaftaran Anda untuk menjadi anggota UKM Pencak Silat telah lolos seleksi dan diterima
        Terima kasih telah berpartisipasi dalam proses pendaftaran, dan kami sangat antusias untuk menyambut Anda di dalam keluarga UKM Pencak Silat kami.';
        $this->mail->send();

        return redirect()->to('/admin/table');
    }
}
