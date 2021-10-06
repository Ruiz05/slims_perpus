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
// Navigation
include 'nav.php';
include 'banner.php';
include 'card.php';
?>
<main id="content" class="s-main" role="main">
</main>
<?php
// Advance Search
include "feature.php";
?>


</body>
<?php
// include "diatas_footer.php";
include 'diatas_footer.php';
include "footer.php";
?>
</html>