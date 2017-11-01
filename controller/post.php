<?php
    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $post = Post::find($id);
        if($post == false){
            header("Location: http://localhost/BLOG/error");
        }
        $obj = new Post();
        $getKat = $obj->getSomeKats();
        $haber_id = $_GET['id'];
        $yorumlar = $obj->getYorum($haber_id);
        if($_POST) {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $yorum = htmlspecialchars(strip_tags($_POST['yorum']));
            $obj->addYorum($haber_id,$yorum,$name);
        }
    }
