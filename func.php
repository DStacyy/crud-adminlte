<?php
function getBarang($keyword='', $kategori=''){
    global $conn; 

    $query = "SELECT * FROM barang WHERE 1=1";
    $params = array();

    //cek jika keyword ada nilainya, maka..
    if(!empty ($keyword)){
        $query .=" AND (nama_barang LIKE ? OR deskripsi LIKE ?)";
        $params = "%$keyword%";
        $params = "%$keyword%";

    }
}
?>