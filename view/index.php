<?php
    require_once "_header.php";
    require_once "_navbar.php";
    function url_baslik_yarat ($baslik)
	{
         //değiştirelecek türkçe karakterler
         $TR=array('ç','Ç','ı','İ','ş','Ş','ğ','Ğ','ö','Ö','ü','Ü');
         $EN=array('c','c','i','i','s','s','g','g','o','o','u','u');
         //türkçe karakterleri değiştirir
         $baslik= str_replace($TR,$EN,$baslik);
         //tüm karakterleri küçüklür
         $baslik=mb_strtolower($baslik,'UTF-8');
         // a'dan z'ye olan harfler, 0'dan 9 a kadar sayılar, tire (-),
         // boşluk ve altçizgi (_) dışındaki tüm karakteri siler
         $baslik=preg_replace('#[^-a-zA-Z0-9_ ]#','',$baslik);
         //cümle aralarındaki fazla boşluğü kaldırır
         $baslik=trim($baslik); //cümle aralarındaki
         //boşluğun yerine tire (-) koyar
         $baslik= preg_replace('#[-_ ]+#','-',$baslik);
         return $baslik;
	 }
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Hanife Kurnaz</h1>
              <span class="subheading">Bilgisayar Mühendisliği Öğrencisi</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
              <?php foreach ($posts as $pst):?>
              <a href="post/<?=$pst->id?>/<?=url_baslik_yarat($pst->title)?>">
                  <h2 class="post-title">
                    <?=$pst->title?>
                  </h2>
                  <h3 class="post-subtitle"><?=$pst->aciklama?></h3>
              </a>
              <p class="post-meta">Posted by <b>Admin</b>
              on <?=$pst->created_at?></p>
              <?php endforeach; ?>
          </div>
          <hr>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-secondary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>
    <hr>
<?php
    require_once "_footer.php";
?>

