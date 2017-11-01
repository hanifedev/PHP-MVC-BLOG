<?php
$categories =Post::allKategories();
$postObj = new Post();
$admnObj = new Admin();
$cntEdt = (array)($postObj->postFindById($_GET["duzenle"]));
if($_POST){
    $id = $_GET["duzenle"];
    $title = $_POST["baslik"];
    $content = $_POST["metin"];
    $aciklama = $_POST["aciklama"];
    $kategori = $_POST["kategori"];
    $admnObj->editContent($id, $title,$aciklama, $content,$kategori);
}
