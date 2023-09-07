<?php

// function koneksi()
function conect($server_name, $username, $pasword, $table)
{
    $conn = mysqli_connect($server_name, $username, $pasword, $table);
    return $conn;
}
// rediert function
function redirect($location)
{
    header("Location: " . $location);
    exit;
}
// function untuk mengambil data dari request
function get($data)
{
    if (isset($_POST[$data])) {
        return $_POST[$data];
    }
    if (isset($_GET[$data])) {
        return $_GET[$data];
    }
    if (isset($_FILES[$data])) {
        return $_FILES[$data];
    }
    if (isset($_SESSION[$data])) {
        return $_SESSION[$data];
    }

    return '';
}
//function query
function query($query)
{
    global $conn;
    mysqli_query($conn, $query);
    $chek = mysqli_affected_rows($conn);
    return $chek;
    return $query;
}
// function set data session
function session($set, $pesan)
{
    return $_SESSION[$set] = $pesan;
}
function getdata($table)
{
    global $conn;
    $query = "SELECT * FROM  $table";
    $reslut = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($reslut)) {
        $rows[] = $row;
    }
    return $rows;
}
function hapus($id)
{
    global $conn;
    $query = "DELETE FROM user WHERE id_user= $id";
    mysqli_query($conn, $query);
    return  mysqli_affected_rows($conn);
}
