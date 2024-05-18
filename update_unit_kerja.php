<?php
// Sertakan koneksi database
require 'dbkoneksi.php';

// Periksa apakah parameter id telah disertakan dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data unit kerja berdasarkan ID
    $query = $dbh->prepare('SELECT * FROM unit_kerja WHERE id = ?');
    $query->execute([$id]);
    $unit_kerja = $query->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah unit kerja dengan ID yang diberikan ditemukan
    if (!$unit_kerja) {
        echo "Unit kerja tidak ditemukan.";
        exit;
    }
} else {
    echo "ID unit kerja tidak disediakan.";
    exit;
}

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui formulir
    $id = $_POST['kode']; // Menggunakan "kode" karena input ID disebut "kode" di HTML
    $nama = $_POST['nama'];
    

    // Query untuk mengupdate data unit kerja
    $query = $dbh->prepare('UPDATE unit_kerja SET id = ?, nama = ? WHERE id = ?');
    $result = $query->execute([$id, $nama, $unit_kerja['id']]); // Menggunakan $unit_kerja['id'] untuk menentukan unit kerja mana yang akan diubah

    // Periksa apakah pembaruan berhasil
    if ($result) {
        // Redirect ke halaman data unit kerja setelah update
        header("Location: data_unit_kerja.php");
        exit;
    } else {
        echo "Gagal memperbarui data unit kerja.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Update Unit Kerja</title>
</head>

<body>
    <div class="container mt-1">
        <h2 class="text-center mb-3">Update Unit Kerja</h2>
        <form method="POST">
            <div class="form-group row">
                <label for="kode" class="col-4 col-form-label">ID:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $unit_kerja['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $unit_kerja['nama']; ?>">
                </div>
            </div>
           
           
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
