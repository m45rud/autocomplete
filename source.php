<?php

    // Cegak akses langsung ke source Ajax.
    if ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ) {

        // Set header type konten.
        header("Content-Type: application/json; charset=UTF-8");

        // Deklarasi variable untuk koneksi ke database.
        $host     = "localhost";        // Server database
        $username = "root";             // Username database
        $password = "root";             // Password database
        $database = "autocomplete";     // Nama database

        // Koneksi ke database.
        $conn = new mysqli($host, $username, $password, $database);

        // Deklarasi variable keyword buah.
        $buah = $_GET["query"];

        // Query ke database.
        $query = $conn->query("SELECT * FROM table_buah WHERE buah LIKE '%$buah%' ORDER BY buah DESC");
        $result = $query->fetch_all(MYSQLI_ASSOC);

        // Format bentuk data untuk autocomplete.
        foreach($result as $data)
        {
            $output['suggestions'][] = [
                'value' => $data['buah'],
                'buah'  => $data['buah']
            ];
        }

        if (!empty($output)) {
            // Encode ke format JSON.
            echo json_encode($output);
        }

    } else {

        // Tampilkan peringatan.
        echo 'No direct access source!';
    }
?>
