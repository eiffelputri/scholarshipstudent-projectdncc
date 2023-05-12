<?php

require_once("config/connection.php");
$id = $_GET['id'];

$query = mysqli_query($connection, "DELETE FROM student WHERE id = $id");

if($query){
    header('Location: buku.php?status=berhasil&from=hapus');
}else{
    header('Location: buku.php?status=gagal&from=hapus');
}