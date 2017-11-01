<?php 
class Admin extends Connection{
	public function onayBekleyenYorumlar(){
        $get = $this->con->query("SELECT * FROM yorumlar WHERE onay = '0'")->fetchAll(PDO::FETCH_OBJ);
        return $get;
    }

    public function yorumOnayla($yorum_id)
    {
        $onayla = $this->con->prepare("UPDATE yorumlar SET onay=? WHERE id=?");
        $control = $onayla->execute(array('1', $yorum_id));
        if ($control)
            return true;
        return false;
    }


	public function addContent($baslik,$kategori,$aciklama,$metin){
	    $add = $this->con->prepare("INSERT INTO posts (title ,aciklama,content,category_id) VALUES (?,?,?,?)");
	    $isadded = $add->execute(array($baslik,$aciklama,$metin,$kategori));
	    if($isadded)
	        return $isadded;
        return false;
    }

	public function editCategory($catId, $catName){
		$edit = $this->con->prepare("UPDATE kategoriler SET title=? WHERE id=?");
		$control = $edit->execute(array($catName,$catId));
		if($control)
		    return true;
        return false;
	}

	public function editContent($id, $title, $aciklama, $content, $catId){
	    $edit = $this->con->prepare("UPDATE posts SET title=?, aciklama=?, content=?, category_id=? WHERE id=?");
	    $contrl = $edit->execute(array($title,$aciklama,$content,$catId,$id));
	    if($contrl)
	        return true;
        return false;
    }

	public function addCategory($catName){
		$add = $this->con->prepare("INSERT INTO kategoriler (title) VALUES (?)");
		$control = $add->execute(array($catName));
		if($control)
			return $control;
        return false;
	}

	public function deleteCategory($catId){
		$delete = $this->con->prepare("DELETE FROM kategoriler WHERE id=:catid");
		$delete->bindParam(':catid',$catId, PDO::PARAM_INT);
		$delete->execute();
	}

	public function deleteContent($cntId){
        $delete = $this->con->prepare("DELETE FROM posts WHERE id=:cntid");
        $delete->bindParam(':cntid',$cntId, PDO::PARAM_INT);
        $delete->execute();
    }

    public function deleteComment($cmtId){
        $delete = $this->con->prepare("DELETE FROM yorumlar WHERE id=:cmtid");
        $delete->bindParam(':cmtid',$cmtId, PDO::PARAM_INT);
        $delete->execute();
    }
}