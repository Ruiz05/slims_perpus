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

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php
include 'nav.php';
?>
<main id="content" class="s-main" role="main">
<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-center">
        <img src="template/slims_perpus/gambar/heder.png" alt="" class="logo_login">
        <?php echo $main_content;?>
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