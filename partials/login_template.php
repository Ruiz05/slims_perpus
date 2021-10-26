<?php
if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
}
?>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php
include 'nav.php';
?>

<div id="content" class="">
<script>
function getfocus() {
  document.getElementById("userName").focus();
}
</script>


<main class="s-main" role="main">
<div class="login">
    <div class="container">
        <div class="row position-sticky" style="padding-top:15%;padding-bottom:15%;margin-left: auto; margin-right: auto;width: 40%;">
          <div class="col-auto offset-1 bi-person-circle" style="font-size:50px"></div>
          <div class="title col">LOGIN ADMIN
          <!-- <div class="col-auto offset-1"><img class="loginpage" src="template/slims_perpus/gambar/logo.png" style="width: 100px; height: auto; padding-top: 50%; padding-bottom: 50%;"></div> -->
          <div class="col">
          <?php echo $main_content;?>
        </div>
        </div>
    </div>
</div></div>
</main>


</body>



</div>

<?php
//include 'diatas_footer.php';
include "footer.php";
?>
</html>