<?php
    // Set header tipe konten.
    header("Content-Type: application/json; charset=UTF-8");

    // Deklarasi variable untuk koneksi ke database.
    $host     = "localhost";        // Server database
    $username = "root";             // Username database
    $password = "root";             // Password database
    $database = "autocomplete";     // Nama database

    // Koneksi ke database.
    $koneksi  = mysqli_connect($host, $username, $password, $database);
    if ( ! $koneksi)
    {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Deklarasi variable keyword buah.
    $buah = $_GET["query"];

    // Query ke database.
    $query = mysqli_query($koneksi, "SELECT * FROM table_buah WHERE buah LIKE '%$buah%' ORDER BY buah DESC");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    // Format bentuk data untuk autocomplete.
    foreach($result as $data)
    {
        $output['suggestions'][] = [
            'value' => $data['buah'],
            'buah'  => $data['buah']
        ];
    }

    // Enkode ke format JSON.
    echo json_encode($output);
?>
