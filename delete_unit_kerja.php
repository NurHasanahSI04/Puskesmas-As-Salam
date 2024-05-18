<?php
// Sertakan file dbkoneksi.php
require 'dbkoneksi.php';

// Cek apakah ID kelurahan ada dalam request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID adalah angka untuk mencegah SQL injection
    if (is_numeric($id)) {
        try {
            // Mulai transaksi
            $dbh->beginTransaction();

            // Hapus baris terkait di tabel `pasien`
            $sql_pasien = "DELETE FROM paramedik WHERE unit_kerja_id = :id";
            $stmt_pasien = $dbh->prepare($sql_pasien);
            $stmt_pasien->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt_pasien->execute();

            // Buat query untuk menghapus kelurahan berdasarkan ID
            $sql_kelurahan = "DELETE FROM unit_kerja WHERE id = :id";
            $stmt_kelurahan = $dbh->prepare($sql_kelurahan);
            $stmt_kelurahan->bindParam(':id', $id, PDO::PARAM_INT);

            // Eksekusi query dan periksa hasilnya
            if ($stmt_kelurahan->execute()) {
                // Commit transaksi
                $dbh->commit();
                // Redirect kembali ke halaman data_kelurahan.php jika berhasil
                header("Location: data_unit_kerja.php");
                exit();
            } else {
                // Rollback transaksi jika eksekusi gagal
                $dbh->rollBack();
                echo "Gagal menghapus data kelurahan.";
            }
        } catch (PDOException $e) {
            // Rollback transaksi jika terjadi kesalahan
            $dbh->rollBack();
            // Tangani kesalahan
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Jika ID tidak valid, redirect ke halaman data_kelurahan.php
        header("Location: data_unit_kerja.php");
        exit();
    }
} else {
    // Jika tidak ada ID dalam request, redirect ke halaman data_kelurahan.php
    header("Location: data_unit_kerja.php");
    exit();
}
?>
