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
          <div class="col-6" style="padding-top: 10px;">
          <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate eius optio facere architecto dolore, magnam eos unde quae natus, accusantium dolorem. Porro inventore maxime expedita facilis placeat magni repellat itaque?</h5>
          <?php echo $main_content;?></div>
        </div>
    </div>
</div>
</main>

<?php include "footer.php";?>
</body>