<?php
 //set default index page
    $p = 'home';
	if (isset($_GET['p']))
    {
     if ($_GET['p'] == 'libinfo') {
      $p = 'libinfo';
    } elseif ($_GET['p'] == 'help') {
      $p = 'help';
    } elseif ($_GET['p'] == 'member') {
      $p = 'member';
    } elseif ($_GET['p'] == 'login') {
      $p = 'login';
	} elseif ($_GET['p'] == 'news') {
      $p = 'news';
	} elseif ($_GET['p'] == 'slimsinfo') {
      $p = 'slimsinfo';
    } else {
      $p = strtolower(trim($_GET['p']));
    }
    }
/*----------------------------------------------------
      menu list
      you may modified as you need
      ----------------------------------------------------*/
      $menus = array (
        'home'   => array('url'  => 'index.php',
          'text' => __('Home')
          ),
        'news'   => array('url'  => 'index.php?p=news',
          'text' => __('Library News')
          ),
		'member'   => array('url'  => 'index.php?p=member',
          'text' => __('Member Area')
          ),
		  'help'   => array('url'  => 'index.php?p=help',
          'text' => __('Help on Search')
          ),
        'librarian'   => array('url'  => 'index.php?p=librarian',
          'text' => __('Librarian')
          ),
		'libinfo'  => array('url'  => 'index.php?p=libinfo',
          'text' => __('Library Information')
          ),
        
		'slimsinfo'   => array('url'  => 'index.php?p=slimsinfo',
          'text' => __('About SLiMS')
          ),
		'login'   => array('url'  => 'index.php?p=login',
          'text' => __('Librarian LOGIN')
          )
        );

?>
<h2 class="sidebar-heading"><?php echo __('Main Menu'); ?></h2>
<div class="w3-bar-block mb-5">
	<?php foreach ($menus as $path => $menu) { ?>
    <div <?php if ($p == $path) {echo 'class="w3-bar-item py-1 pl-0 menuActive"';} else {echo 'class="w3-bar-item py-1 pl-0"';}; ?>><a href="<?php echo $menu['url']; ?>" title="<?php echo $menu['text']; ?>"><?php echo ucwords($menu['text']); ?></a></div>
    <?php } ?>
</div>
	
	
	
