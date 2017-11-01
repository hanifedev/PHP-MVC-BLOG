<?php
$adminObj = new Admin();
$icerik =Post::all();
$categories =Post::allKategories();
if($_POST){
    $baslik = trim($_POST["baslik"]);
    $kategori = $_POST["kategori"];
    $aciklama = trim($_POST["aciklama"]);
    $metin = $_POST["metin"];
    $adminObj->addContent($baslik,$kategori,$aciklama,$metin);
}

if(isset($_GET['sil']))
{
    $adminObj->deleteContent($_GET['sil']);
}