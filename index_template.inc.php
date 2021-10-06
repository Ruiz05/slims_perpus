<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-21T11:36:53+07:00
# @Email:  ido.alit@gmail.com
# @Filename: index_template.inc.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T11:37:10+07:00

//$a = get_defined_vars();
//$a['sysconf'] = null;
//$a['main_content'] = null;
//echo '<pre>'; print_r($a); echo '</pre>'; die();
//echo '<pre>'; print_r($_SESSION); echo '</pre>'; die();
include 'partials/meta.php';

// ----------------------------------------------------------------------------
// load content by URI
// ----------------------------------------------------------------------------
if (isset($_GET['p']) || isset($_GET['search'])) {
  // --------------------------------------------------------------------------
  // handle result search
  if (isset($_GET['search'])) {
    // ------------------------------------------------------------------------
    // load partials result search template
    include 'partials/_result-search.php';
  } else {
    // --------------------------------------------------------------------------
    // handle member page
    if ($_GET['p'] == 'member') {
      include 'partials/footer';
    } else {
      include 'login_template.php';
    }
  }
} else {
  // --------------------------------------------------------------------------
  // not found query string: load home page
  include 'partials/home.php';
}
// ----------------------------------------------------------------------------
// load function library for classic template
// ----------------------------------------------------------------------------
// include_once 'classic.php';

// // ----------------------------------------------------------------------------
// // load header
// // ----------------------------------------------------------------------------
// include 'partials/nav.php';
// include 'partials/banner.php';
// include 'partials/card.php';

// // ----------------------------------------------------------------------------
// // load footer
// // ----------------------------------------------------------------------------
// include 'partials/feature.php';
// include 'partials/diatas_footer.php';
// include 'partials/footer.php';
?>
