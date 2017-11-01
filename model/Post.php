<?php
class Post extends Connection
{
    public function getPost($orderBy = "LAST", $count = 3, $startFrom = 0)
    {
        if ($orderBy == "LAST") {
            $orderByAtQuery = "DESC";
        } elseif ($orderBy == "FIRST") {
            $orderByAtQuery = "ASC";
        } else {
            $orderByAtQuery = "DESC";
        }
        $count = (int)$count;
        $startFrom = (int)$startFrom;
        $posts = $this->con->query("SELECT * FROM posts ORDER BY created_at " . $orderByAtQuery . " LIMIT " . $startFrom . "," . $count)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function findById($id)
    {
        $kats = $this->con->prepare("SELECT * FROM kategoriler WHERE id=:id");
        $kats->execute(array(":id"=>$id));
        $returnKats = $kats->fetchObject();
        return $returnKats;
    }


    public function postFindById($id)
    {
        $pst = $this->con->prepare("SELECT * FROM posts WHERE id=:id");
        $pst->execute(array(':id'=>$id));
        $returnPst = $pst->fetchObject();
        return $returnPst;
    }

    public function getAllKats(){
        $kats = $this->con->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_OBJ);
        return $kats;
    }

    public function getSomeKats($startFrom = 0, $count = 6){
        $kats = $this->con->query("SELECT * FROM kategoriler LIMIT ".$startFrom ."," .$count)->fetchAll(PDO::FETCH_OBJ);
        return $kats;
    }

    public function getAllPosts($orderBy = "FIRST"){
        if($orderBy==="FIRST") $orderByAtQuery = "ASC";
        elseif($orderBy==="LAST") $orderByAtQuery = "DESC";
        else $orderByAtQuery = "DESC";
        $posts = $this->con->query("SELECT * FROM posts ORDER BY id ".$orderByAtQuery)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function orderByRead($orderBy = "FIRST" , $count = 4, $startFrom = 0){
        if($orderBy === "FIRST") $orderByAtRead = "ASC";
        elseif($orderBy === "LAST") $orderByAtRead = "DESC";
        else $orderByAtRead = "DESC";
        $count = (int)$count;
        $startFrom = (int)$startFrom;
        $posts = $this->con->query("SELECT * FROM posts ORDER BY created_at ".$orderByAtRead." LIMIT ".$startFrom.",".$count)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function addYorum($post_id, $yorum,$name,$onay=0){
        $add = $this->con->prepare("INSERT INTO yorumlar (konu_id,yorum,onay,isim) VALUES (?,?,?,?)");
        $isadded = $add->execute(array($post_id,$yorum,$onay,$name));
        if($isadded)
            return $isadded;
        return false;
    }

    public function getYorum($post_id){
        $get = $this->con->prepare("SELECT * FROM yorumlar WHERE onay = '1' AND konu_id=:postid");
        $get->execute(array(':postid'=>$post_id));
        $returnYrm = $get->fetchAll(PDO::FETCH_OBJ);
        return $returnYrm;
    }

    public function orderByKat($katId){
        $posts = $this->con->prepare("SELECT * FROM posts WHERE category_id=:kat_id");
        $posts->execute(array(':kat_id'=>$katId));
        $returnPst = $posts->fetchAll(PDO::FETCH_OBJ);
        return $returnPst;
    }

    public function initById($id){
        $postById = $this->con->prepare("SELECT * FROM posts WHERE id=:id");
        $postById->execute(array(':id'=>$id));
        $returnPst = $postById->fetchObject();
        return $returnPst;
    }

    public static function find($id){
        $returnObj = new self;
        return $returnObj->initById($id);
    }

    public static function all($orderBy = "FIRST"){
        $selfObj = new self;
        return $selfObj->getAllPosts($orderBy);
    }

    public static function allKategories(){
        $selfObj = new self;
        return $selfObj->getAllKats();
    }

    public static function get($orderBy = "LAST", $count = 3, $startFrom = 0){
        $selfObj = new self;
        return $selfObj->getPost($orderBy,$count,$startFrom);
    }

    public static function orderKategori($katId){
        $selfObj = new self;
        return $selfObj->orderByKat($katId);
    }
}