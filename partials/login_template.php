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

</head>

<style>
   .heading1{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 25px;
    
  }
  .pig{
    padding:25px 50px 50px;
    
  }
  #content{
    background-color: rgb(229, 229, 229);
  }

  .title{
    padding-top: 10px; 
    font-size: 20px; 
  }
</style>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php
include 'nav.php';
?>
<script>
document.getElementById('newspage').onclick = function() {
    document.getElementById("newspage").href = "index.php?p=news";
}
</script>
<div id="content" class="">
<br><br><br>


<main class="s-main" role="main">
<div class="login">
    <div class="container">
        <div class="row position-sticky" style="justify-content: center">
          <div class="col-auto offset-1 bi-person-circle" style="font-size:50px"></div>
          <div class="title col-6">LOGIN ADMIN
          <!-- <div class="col-auto offset-1"><img class="loginpage" src="template/slims_perpus/gambar/logo.png" style="width: 100px; height: auto; padding-top: 50%; padding-bottom: 50%;"></div>
          --><div class="col-6" style="padding-top: 10px;">
          <?php echo $main_content;?></div>
        </div>
    </div>
</div></div>
</main>


</body>

<br><br><br>

</div>

<?php
//include 'diatas_footer.php';
include "footer.php";
?>
</html>