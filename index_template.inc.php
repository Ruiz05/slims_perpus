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
<!-- <link rel="stylesheet" href="template/slims_perpus/fontawesome/css/all.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="template/slims_perpus/style.css">
</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php
// Navigation
include "partials/nav.php";
include "partials/banner.php";
include "partials/card.php";

?>

<?php
// Content
?>
<?php if (isset($_GET['search']) || isset($_GET['p'])): ?>
    <section id="content" class="s-main-page" role="main">

        <!-- Main
        ============================================= -->
        <div class="s-main-content container">
            <div class="row">

                <!-- Show Result
                ============================================= -->
                <div class="col-lg-8 col-sm-9 col-xs-12 animated fadeInUp delay2">

                  <?php
                  // Generate Output
                  // catch empty list
                  if (strlen($main_content) == 7) {
                    echo '<h2>' . __('No Result') . '</h2><hr/><p>' . __('Please try again') . '</p>';
                  } else {
                    echo $main_content;
                  }

                  // Somehow we need to hack the layout
                  if (isset($_GET['search']) || (isset($_GET['p']) && $_GET['p'] != 'member')) {
                    echo '</div>';
                  } else {
                    if (isset($_SESSION['mid'])) {
                      echo '</div></div>';
                    }
                  }

                  ?>

                    <div class="col-lg-4 col-sm-3 col-xs-12 animated fadeInUp delay4">
                        <!-- If Member Logged
                        ============================================= -->
                        <h2><?php echo __('ini index yg ke 2'); ?></h2>
                        <hr/>
                        <p><?php echo (utility::isMemberLogin()) ? $header_info : $info; ?></p>
                        <br/>

                        <!-- Show if clustering search is enabled
                        ============================================= -->
                      <?php
                      if (($sysconf['enable_search_clustering'])) : ?>
                          <h2><?php echo __('Search Cluster'); ?></h2>

                          <hr/>

                      <?php
                      if ($sysconf['index']['engine']['enable']) {
                        echo $biblio_list->getClustering();
                      } else {
                      if (isset($_GET['keywords']) && (!empty($_GET['keywords']))) :
                      ?>

                          <div id="search-cluster">
                              <div class="cluster-loading"><?php echo __('Generating search cluster...'); ?></div>
                          </div>

                          <script type="text/javascript">
                              $('document').ready(function () {
                                  $.ajax({
                                      url: 'index.php?p=clustering&q=<?php echo urlencode($criteria); ?>',
                                      type: 'GET',
                                      success: function (data, status, jqXHR) {
                                          $('#search-cluster').html(data);
                                      }
                                  });
                              });
                          </script>

                      <?php endif; ?>

                      <?php } ?>

                      <?php endif; ?>
                    </div>
                </div>
            </div>

    </section>

<?php else: ?>

    <!-- Homepage
    ============================================= -->
    <main id="content" class="s-main" role="main">
<!-- <div class="container">
<div class="row" style="padding-bottom: 100%;">
  <div class="col">

  </div>
</div>
</div> -->
    </main>
<?php endif; ?>

<?php
// Advance Search
include "partials/feature.php";
include "partials/diatas_footer.php";

// Footer

// Chat Engine
//include LIB . "contents/chat.php";

// Background
//include "partials/bg.php";
?>

<script>
  <?php if(isset($_GET['search']) && (isset($_GET['keywords'])) && ($_GET['keywords'] != ''))   : ?>
  $('.biblioRecord .detail-list, .biblioRecord .title, .biblioRecord .abstract, .biblioRecord .controls').highlight(<?php echo $searched_words_js_array; ?>);
  <?php endif; ?>

  //Replace blank cover
  $('.book img').error(function () {
      var title = $(this).parent().attr('title').split(' ');
      $(this).parent().append('<div class="s-feature-title">' + title[0] + '<br/>' + title[1] + '<br/>... </div>');
      $(this).attr({
          src: './template/default/img/book.png',
          title: title + title[0] + ' ' + title[1]
      });
  });

  //Replace blank photo
  $('.librarian-image img').error(function () {
      $(this).attr('src', './template/default/img/avatar.jpg');
  });

  //Feature list slider
  function mycarousel_initCallback(carousel) {
      // Disable autoscrolling if the user clicks the prev or next button.
      carousel.buttonNext.bind('click', function () {
          carousel.startAuto(0);
      });

      carousel.buttonPrev.bind('click', function () {
          carousel.startAuto(0);
      });

      // Pause autoscrolling if the user moves with the cursor over the clip.
      carousel.clip.hover(function () {
          carousel.stopAuto();
      }, function () {
          carousel.startAuto();
      });
  };

  jQuery('#topbook').jcarousel({
      auto: 5,
      wrap: 'last',
      initCallback: mycarousel_initCallback
  });

  $(window).scroll(function () {
      // console.log($(window).scrollTop());
      if ($(window).scrollTop() > 50) {
          $('.s-main-search').removeClass("animated fadeIn").addClass("animated fadeOut");
      } else {
          $('.s-main-search').removeClass("animated fadeOut").addClass("animated fadeIn");
      }
  });

  $('.s-search-advances').click(function () {
      $('#advance-search').animate({opacity: 1,}, 500, 'linear');
      $('#simply-search, .s-menu, #content').hide();
      $('.s-header').addClass('hide-header');
      $('.s-background').addClass('hide-background');
  });

  $('#hide-advance-search').click(function () {
      $('.s-header').toggleClass('hide-header');
      $('.s-background').toggleClass('hide-background');
      $('#advance-search').animate({opacity: 0,}, 500, 'linear', function () {
          $('#simply-search, .s-menu, #content').show();
      });
  });

</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61385f04d6e7610a49b4309d/1ff236b5i';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
<?php
include "partials/footer.php";
?>
</html>
