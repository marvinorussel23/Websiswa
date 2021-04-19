<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM tbperpustakaan WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: green;
        }


        button {
            background-color: green;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: green;
        }

        div {
            width: 100%;
            height: auto;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background: #ededed;
        }
    </style>
</head>

<body>
    <center>
        <h1>Edit Siswa</h1>
        <center>
            <form method="POST" action="prosesedit.php" enctype="multipart/form-data">
                <section class="base">
                    <input name="id" value="<?php echo $data['id']; ?>" hidden />
                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                        <label>NIS</label>
                        <input type="text" name="nis" value="<?php echo $data['nis']; ?>" />
                    </div>
                    <div>
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" required="" value="<?php echo $data['jenis_kelamin']; ?>" />
                    </div>
                    <div>
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" required="" value="<?php echo $data['jurusan']; ?>" />
                    </div>
                    <div>
                        <label>Foto Siswa</label>
                        <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                        <input type="file" name="foto" />
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah foto</i>
                    </div>
                    <div>
                        <button type="submit">Simpan</button>
                    </div>
                </section>
            </form>
</body>

</html>