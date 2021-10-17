<?php
$koneksi = mysqli_connect("localhost", "root", "", "crud");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function tambah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = $data['jurusan'];
    $email = htmlspecialchars($data['email']);

    $sql = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$jurusan','$email')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}


function hapus($nim)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = $nim");
    return mysqli_affected_rows($koneksi);
}


function ubah($data)
{
    global $koneksi;

    $nim = $data['nim'];
    $nama = htmlspecialchars($data['nama']);
    $jurusan = $data['jurusan'];
    $email = htmlspecialchars($data['email']);

    $sql = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan', email = '$email' WHERE nim = $nim";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}