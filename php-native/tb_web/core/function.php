<?php
session_start();
require_once 'db.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
// fungsi ini buat memamggil file,dan juga mengrimkan data jika ada
function View($filename, $data = [])
{
    $file_folder = explode('/', $filename);
    $dir_view = 'Views/';
    if (!array_key_exists(1, $file_folder)) {
        if (file_exists('../' . $dir_view . $file_folder[0] . '.php')) {
            require_once '../' . $dir_view . $file_folder[0] . '.php';
        } else {
            require_once '../' . $dir_view . 'Not_found.php';
        }
    } else if (!array_key_exists(2, $file_folder)) {
        if (file_exists('../' . $dir_view . $file_folder[0] . '/' . $file_folder[1] . '.php')) {
            require_once '../' . $dir_view . $file_folder[0] . '/' . $file_folder[1] . '.php';
        } else {
            require_once '../' . $dir_view . 'Not_found.php';
        }
    } else {
        if (file_exists('../' . $dir_view . $file_folder[0] . '/' . $file_folder[1] . '/' . $file_folder[2] . '.php')) {
            require_once '../' . $dir_view . $file_folder[0] . '/' . $file_folder[1] . '/' . $file_folder[2] . '.php';
        } else {
            require_once '../' . $dir_view . 'Not_found.php';
        }
    }
}
function query($query)
{
    global $conn;
    $query = mysqli_query($conn, $query);
    $reslut = mysqli_affected_rows($conn);
    return $reslut;
}
// function untuk query data(read)
function get_data($query)
{
    global $conn;
    $data = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
    //meyimpan data yang di ambil dari database ke dalam array rows sekaligus merubahnya menjadi array assoc     
}

// function redirct
function redirect($location)
{
    header("Location: " . $location);
    exit;
}
function set_flashdata($pesan)
{
    $_SESSION["flash"] = $pesan;
}
