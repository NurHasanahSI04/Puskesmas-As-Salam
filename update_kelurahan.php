<?php
// Sertakan file dbkoneksi.php
require 'dbkoneksi.php';

// Periksa apakah parameter id telah disertakan dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data kelurahan berdasarkan ID
    $query = $dbh->prepare('SELECT * FROM kelurahan WHERE id = ?');
    $query->execute([$id]);
    $kelurahan = $query->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah kelurahan dengan ID yang diberikan ditemukan
    if (!$kelurahan) {
        echo "Kelurahan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Kelurahan tidak disediakan.";
    exit;
}

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kec_id = $_POST['kec_id'];
    
    // Query untuk mengupdate data kelurahan
    $query = $dbh->prepare('UPDATE kelurahan SET nama = ?, kec_id = ? WHERE id = ?');
    $result = $query->execute([$nama, $kec_id, $id]);

    // Periksa apakah pembaruan berhasil
    if ($result) {
        // Redirect ke halaman data kelurahan setelah update
        header("Location: data_kelurahan.php");
        exit;
    } else {
        echo "Gagal memperbarui data kelurahan.";
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

    <title>Update Kelurahan</title>
</head>

<body>
    <div class="container mt-1">
        <h2 class="text-center mb-3">Update Data Kelurahan</h2>
        <form method="POST">
            <div class="form-group row">
                <label for="id" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($kelurahan['id']); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Kelurahan</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($kelurahan['nama']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kec_id" class="col-4 col-form-label">Kecamatan ID</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="kec_id" name="kec_id" value="<?php echo htmlspecialchars($kelurahan['kec_id']); ?>">
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
