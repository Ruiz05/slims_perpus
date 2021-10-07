<?php
if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
}
?>
<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml"
      prefix="og: http://ogp.me/ns#">
<head>
<!-- meta -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<style>
  .heading1{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size:1.2rem;
    
  }
  .pig{
    padding:25px 50px 50px;
    
  }
  #content{
    background-color: rgb(229, 229, 229);
  }
</style>
</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php
include 'nav.php';
?>
<main id="content" class="s-main" role="main">
<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-center pig">
<<<<<<< HEAD
          <div class="col-auto offset-1"></div>
          <div class="col-6" style="padding-top: 10px;">LOGIN ADMIN
=======
          <!-- <div class="col-auto offset-1"><img class="loginpage" src="template/slims_perpus/gambar/logo.png" style="width: 100px; height: auto; padding-top: 50%; padding-bottom: 50%;"></div>
           --><div ><i class="bi-person-circle"></i></div> 
          <div class="col-5 offset-1" style="padding-top: 10px;">LOGIN ADMIN
>>>>>>> e54cf18b77c37531d9943dbc0d9b9f32ca3b7ff5
          <?php echo $main_content;?></div>
        </div>
    </div>
</div>
</main>


</body>
<?php
//include 'diatas_footer.php';
include "footer.php";
?>
</html>