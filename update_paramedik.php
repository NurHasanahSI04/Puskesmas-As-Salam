<?php
// Sertakan file koneksi database
require_once 'dbkoneksi.php';

// Periksa apakah parameter id telah disertakan dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data paramedik berdasarkan ID
    $query = $dbh->prepare('SELECT * FROM paramedik WHERE id = ?');
    $query->execute([$id]);
    $paramedik = $query->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah paramedik dengan ID yang diberikan ditemukan
    if (!$paramedik) {
        echo "Paramedik tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Paramedik tidak disediakan.";
    exit;
}

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui formulir
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $unit_kerja_id = $_POST['unit_kerja_id'];

    // Query untuk mengupdate data paramedik
    $query = $dbh->prepare('UPDATE paramedik SET nama = ?, gender = ?, tmp_lahir = ?, tgl_lahir = ?, kategori = ?, telpon = ?, alamat = ?, unit_kerja_id = ? WHERE id = ?');
    $query->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id, $id]);

    // Redirect ke halaman data paramedik setelah update
    header("Location: data_paramedik.php");
    exit;
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

    <title>Update Paramedik</title>
</head>

<body>
    <div class="container mt-1">
        <h2 class="text-center mb-3">Update Data Paramedik</h2>
        <form method="POST">
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $paramedik['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-4 col-form-label">Jenis Kelamin:</label>
                <div class="col-8">
                    <select class="form-control" id="gender" name="gender">
                        <option value="L" <?php if ($paramedik['gender'] == 'L') echo 'selected'; ?>>Laki-Laki</option>
                        <option value="P" <?php if ($paramedik['gender'] == 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?php echo $paramedik['tmp_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir:</label>
                <div class="col-8">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $paramedik['tgl_lahir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-4 col-form-label">Kategori:</label>
                <div class="col-8">
                    <select class="form-control" id="kategori" name="kategori">
                        <option value="perawat" <?php if ($paramedik['kategori'] == 'perawat') echo 'selected'; ?>>Perawat</option>
                        <option value="paramedis" <?php if ($paramedik['kategori'] == 'paramedis') echo 'selected'; ?>>Paramedis</option>
                        <option value="teknisi medis" <?php if ($paramedik['kategori'] == 'teknisi medis') echo 'selected'; ?>>Teknisi Medis</option>
                        <option value="asisten medis" <?php if ($paramedik['kategori'] == 'asisten medis') echo 'selected'; ?>>Asisten Medis</option>
                        <option value="ahli gizi" <?php if ($paramedik['kategori'] == 'ahli gizi') echo 'selected'; ?>>Ahli Gizi</option>
                        <option value="ahli farmasi" <?php if ($paramedik['kategori'] == 'ahli farmasi') echo 'selected'; ?>>Ahli Farmasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="telpon" class="col-4 col-form-label">Telepon:</label>
                <div class="col-8">
                    <input type="tel" class="form-control" id="telpon" name="telpon" value="<?php echo $paramedik['telpon']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $paramedik['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="unit_kerja_id" class="col-4 col-form-label">ID Unit Kerja:</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="unit_kerja_id" name="unit_kerja_id" value="<?php echo $paramedik['unit_kerja_id']; ?>">
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