<?php
if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
}
?>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php
// clean request uri from xss
$request_uri = urlencode(strip_tags(urldecode($_SERVER['REQUEST_URI'])));
?>

  </body>
          <!-- Edit Menu Navigation Bar-->
<?php
include 'nav.php';
include 'banner.php';
include 'card.php';
//include 'search-from.php'
?>
<main id="content" class="s-main" role="main">
</main>
<?php
// Advance Search
//include "kalender.php";
include "feature.php";
?>


</body>
<?php
// include "diatas_footer.php";
include 'diatas_footer.php';
include "footer.php";
?>

</html>