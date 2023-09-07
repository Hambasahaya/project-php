<?php
require '../core/function.php';
if (isset($_POST["simpan"])) {
    global $_POST;
    $nama_foto = '';
    $error = $_FILES['foto']['error'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga'];
    $stok = $_POST['stok'];
    if ($error === 4) {
        $nama_foto = "produk.jpg";
        if (query("INSERT INTO produk VALUES('','$nama_produk','$nama_foto','$harga_produk','$stok')") > 0) {
            redirect("http://localhost/tb_web/page/Produk.php");
        } else {
            echo "gagal insert!";
        }
    } else {
        $nama_foto = rand() . $_FILES["foto"]["name"];
        if (query("INSERT INTO produk VALUES('','$nama_produk','$nama_foto','$harga_produk','$stok')") > 0) {
            if (move_uploaded_file($tmp_name, '../asset/img/fp/' . $nama_foto)) {
                redirect("http://localhost/tb_web/page/Produk.php");
            } else {
                echo "gagal upload";
            }
        } else {
            echo "gagal insert!";
        }
    }
}
if (isset($_GET['hapus'])) {
    $id_produk = $_GET['hapus'];
    if (query("DELETE FROM produk WHERE id_produk=" . $id_produk) == 1) {
        redirect("http://localhost/tb_web/page/Produk.php");
    }
}
if (isset($_POST['update'])) {
    $id_produk = $_POST["id_produk"];
    $nama_foto = '';
    $error = $_FILES['foto']['error'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga'];
    $stok = $_POST['stok'];
    if ($error === 4) {
        $nama_foto = $_POST["foto"];
        if (query("UPDATE produk SET nama_produk = '$nama_produk',harga_produk='$harga_produk',jml_stok='$stok',foto_produk='$nama_foto'
        WHERE id_produk = $id_produk") > 0) {
            redirect("http://localhost/tb_web/page/Produk.php");
        } else {
            echo "gagal update";
        }
    } else {
        $nama_foto = rand() . $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        if (query("UPDATE produk SET nama_produk = '$nama_produk',harga_produk='$harga_produk',jml_stok='$stok',foto_produk='$nama_foto'
        WHERE id_produk = $id_produk") > 0) {
            if (move_uploaded_file($tmp_name, '../asset/img/fp/' . $nama_foto)) {
                redirect("http://localhost/tb_web/page/Produk.php");
            } else {
                echo "gagal Upload";
            }
        } else {
            echo "gagal update";
        }
    }

    if (query($query) > 0) {
        set_flashdata("produk", "data berhasil ditambahkan");
        redirect("http://localhost/tb_web/page/Produk.php");
    }
}
if (isset($_POST['tambah_pesanan'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga'];
    $jumlah_beli = $_POST['stok'];
    if (query("INSERT INTO produk VALUES('','$nama_produk','$nama_foto','$harga_produk','$stok')") > 0) {
        set_flashdata("produk", "data berhasil ditambahkan");
        redirect("http://localhost/tb_web/page/Produk.php");
    }
} else {
    echo "gagal";
}
