<?php
//1. sertakan koneksi database
require 'dbkoneksi.php';
include_once 'header.php';
include_once 'sidebar.php';


//2 Query untuk mendapatkan data pasien
$query = $dbh->query('SELECT * FROM unit_kerja');
//$query = $dbh->query('SELECT pasien.*, kelurahan.nama AS kategori FROM pasien INNER JOIN kelurahan ON kelurahan.id = pasien.kelurahan_id');
$nomor = 1;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Unit Kerja</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



</head>

<body>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Unit Kerja</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <a href="form_unit_kerja.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID </th>
                                            <th>Nama Unit Kerja</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Loop menggunakan foreach untuk menampilkan data pasien
                                        foreach ($query as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $nomor++ . "</td>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                          
                                            
                                            echo "<td>";
                                            echo "<a href='#' onclick='return confirmDelete(" . $row['id'] . ")' class='btn btn-danger btn-sm mr-2'>Delete</a>";
                                            echo "<a href='update_unit_kerja.php?id=" . $row['id'] . "' class='btn btn-success btn-sm'>Update</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>

    <script>
        function confirmDelete(id) {
            var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (result) {
                window.location = 'delete_unit_kerja.php?id=' + id;
            }
            return false;
        }
    </script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <?php
    include_once 'footer.php';