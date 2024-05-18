<?php
// Memanggil file koneksi database
require_once 'dbkoneksi.php';

// Menangkap data yang dikirimkan melalui form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitasi input
    $_id = htmlspecialchars($_POST['id']);
    $_nama = htmlspecialchars($_POST['nama']);
   
    
    // Menyiapkan query SQL untuk menyimpan data ke dalam tabel kelurahan
    $sql = "INSERT INTO unit_kerja (id, nama) VALUES (:id, :nama )";

    // Mempersiapkan statement PDO untuk eksekusi query
    $stmt = $dbh->prepare($sql);

    // Mengeksekusi statement dengan menyertakan data yang telah ditangkap dari form
    $params = [
        ':id' => $_id,
        ':nama' => $_nama,
        
    ];

    // Eksekusi statement dan cek apakah berhasil
    if ($stmt->execute($params)) {
        // Redirect ke halaman data_kelurahan.php setelah proses penyimpanan selesai
        header("Location: data_unit_kerja.php");
        exit();
    } else {
        $error_message = "Gagal menyimpan data kelurahan.";
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

    <title>Tambah Unit</title>
</head>
<body>
    <div class="container mt-1">
        <h2 class="text-center mb-3">Tambah Data unit Kerja</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group row">
                <label for="id" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Unit</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
            </div>
           
            
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
