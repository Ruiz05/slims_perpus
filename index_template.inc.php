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

include_once 'classic.php';
// ----------------------------------------------------------------------------
// load content by URI
// ----------------------------------------------------------------------------
if (isset($_GET['p']) || isset($_GET['search']) || isset($_GET['keywords'])) {
  // --------------------------------------------------------------------------
  // if(isset($_GET['search']) != $_GET['keywords']){
  //   include 'partials/search.php';
  // }
  // handle result search
  if (isset($_GET['search']) && isset($_GET['keywords'])) {
    // ------------------------------------------------------------------------
    // load partials result search template
    include 'partials/result.php';
  }
  
  else {
    // --------------------------------------------------------------------------
    // handle member page
    if(!($_GET['p'] == 'member') && !($_GET['p'] == 'login') ){
      include 'partials/news_page_home.php';
    }
    if ($_GET['p'] == 'member') {
      include 'partials/member.php';
    }
    if ($_GET['p'] == 'login') {
      include 'partials/login_template.php';
    }
    // else if (!($_GET['p'] == 'member') && !($_GET['p'] == 'login') && !($_GET['search'])) {
    //   include 'partials/news_page_home.php';
    //   //echo "hello world";
    // }
  }
} elseif (isset($_GET['pencarian'])) {
  # code...
  include 'partials/search.php';
}
else {
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
