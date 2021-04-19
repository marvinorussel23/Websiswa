<?php
include 'koneksi.php';

$id               = $_POST['id'];
$nama            = $_POST['nama'];
$nis              = $_POST['nis'];
$jenis_kelamin    = $_POST['jenis_kelamin'];
$jurusan          = $_POST['jurusan'];
$foto             = $_FILES['foto']['name'];

if ($foto != "") {
    $ekstensi_gambar = array('png', 'jpg');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $gambar_baru = $angka_acak . '-' . $foto;
    if (in_array($ekstensi, $ekstensi_gambar) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $gambar_baru);

        $query  = "UPDATE tbperpustakaan SET nama = '$nama', nis = '$nis', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', foto = '$gambar_baru'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi foto yang boleh hanya jpg atau png.');window.location='tambahbuku.php';</script>";
    }
} else {
    $query  = "UPDATE tbperpustakaan SET nama = '$nama', nis = '$nis', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
