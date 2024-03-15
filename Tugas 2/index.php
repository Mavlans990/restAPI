<?php
// header('Content-Type: application/vnd.api+json');

include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = mysqli_query($conn, "SELECT * FROM tb_buku");
    $count = $query->num_rows;
    $arr_data = array();
    while ($row = $query->fetch_assoc()) {
        $result = array(
            'id_buku' => $row['id_buku'],
            'judul' => $row['judul'],
            'nama' => $row['nama'],
            'tgl_terbit' => $row['tgl_terbit']
        );
    }

    if ($count == 0) {
        echo 'Tidak ada data';
    }else {
        echo json_encode(
            array($result)
        );
    }
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $nama = $_POST['nama'];
    $tgl_terbit = $_POST['tgl_terbit'];
    $query = mysqli_query($conn, "INSERT INTO tb_buku (judul, nama, tgl_terbit) VALUES ('$judul', '$nama', '$tgl_terbit')");

    if ($query) {
        $data = [
            'status' => 'data berhasil disimpan'
        ];

        echo json_encode([$data]);
    }else {
        $data = [
            'status' => 'data gagal disimpan'
        ];

        echo json_encode([$data]);
    }
}elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id_buku = $_GET['id_buku'];
    $query = mysqli_query($conn, "DELETE FROM tb_buku WHERE id_buku = '$id_buku' ");

    if ($query) {
        $data = [
            'status' => 'data berhasil dihapus'
        ];

        echo json_encode([$data]);
    }else {
        $data = [
            'status' => 'data gagal dihapus'
        ];

        echo json_encode([$data]);
    }

}elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id_buku = $_GET['id_buku'];
    $judul = $_GET['judul'];
    $nama = $_GET['nama'];
    $tgl_terbit = $_GET['tgl_terbit'];

    $query = mysqli_query($conn, "UPDATE tb_buku SET 
                            id_buku = '$id_buku',
                            judul = '$judul',
                            nama = '$nama',
                            tgl_terbit = '$tgl_terbit'
                            WHERE id_buku = '$id_buku'
                        ");
    
    if ($query) {
        $data = [
            'status' => 'data berhasil diedit'
        ];

        echo json_encode([$data]);
    }else {
        $data = [
            'status' => 'data gagal diedit'
        ];

        echo json_encode([$data]);
    }
}

?>