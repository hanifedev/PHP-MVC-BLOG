<?php
$pstObj = new Post();
$admnObj = new Admin();
$catEdt = (array)($pstObj->findById($_GET["duzenle"]));
if($_POST){
    $admnObj->editCategory($_POST["id"], $_POST["baslik"]);
}