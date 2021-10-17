<?php
session_start();
require 'koneksi.php';

$nim = $_GET['nim'];

if (hapus($nim) > 0) {
    echo "<script>
                alert('Data siswa berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
} else {
    echo "<script>
            alert('Data siswa gagal dihapus!');
        </script>";
}
