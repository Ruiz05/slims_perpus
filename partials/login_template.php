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
          <div class="col-auto offset-1 bi-person-circle h1"></div>
<<<<<<< HEAD
          <div class="col-6" style="padding-top: 10px;">LOGIN ADMIN 
=======
          <div class="col-6" style="padding-top: 10px;">LOGIN ADMIN
          <!-- <div class="col-auto offset-1"><img class="loginpage" src="template/slims_perpus/gambar/logo.png" style="width: 100px; height: auto; padding-top: 50%; padding-bottom: 50%;"></div>
          --><div class="col-6" style="padding-top: 10px;">
>>>>>>> 6e7b52ca7a8aa2221e3e728f273dfd5f072f2b74
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