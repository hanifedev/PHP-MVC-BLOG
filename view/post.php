<!DOCTYPE html>
<html lang="tr">
<head>
    <base href="http://localhost/BLOG/"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Clean Blog - Start Bootstrap Theme</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
</head>
<body>
<?php
    require_once "_navbar.php";
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.png')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?=$post->title?></h1>
              <span class="meta">Posted by
                <b>Admin</b>
                on <?=$post->created_at?></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p><?=$post->content?></p>
          </div>
        </div>
      </div>
    </article>
    <hr>

    <!-- Comments Form -->
    <div class="well col-lg-7 mx-auto">
        <form role="form" method="post">
            <h4>Yorum Yapın:</h4>
            <div class="form-group">
                <input type="text" class="form-control" rows="3" name="name" placeholder="İsim"><br>
                <textarea class="form-control" rows="3" name="yorum" placeholder="Mesaj"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <hr>
    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <div class="media-body col-lg-7 mx-auto">
            <?php foreach($yorumlar as $yrm): ?>
                    <h5><?=$yrm->isim?></h5>
                    <img src="img/icon.png" style="width: 64px;height:64px; "/>
                    <?=$yrm->yorum?><hr>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</body>
<?php
    require_once "_footer.php";
?>
