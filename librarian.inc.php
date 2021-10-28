<?php
/**
 *
 * Member Area/Information
 * Copyright (C) 2009  Arie Nugraha (dicarve@yahoo.com)
 * Patched by Hendro Wicaksono (hendrowicaksono@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
  die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
  die("can not access this file directly");
}
$gambit = '<div class="container py-5">
<div class="row mb-4">
  <div class="col-lg-5">
    <h2 class="display-4 font-weight-light">Pustakawan</h2>
    <p class="font-italic text-muted">Profil Pustakawan Universitas Muhammadiyah Kalimantan Timur</p>
  </div>
</div>';
// $info = __('Profile of our Librarian');
$page_title = __('Profile of our Librarian') ;

// query librarian data
$librarian_q = $dbs->query('SELECT * FROM user WHERE user_type IN (1,2) ORDER BY user_type DESC LIMIT 20');
echo $gambit;
echo '<div class="row text-center">';
if ($librarian_q->num_rows > 0) {
  
  while ($librarian = $librarian_q->fetch_assoc()) {
    
    echo '<div class="col-xl-3 col-sm-6 mb-5"><div class="bg-white rounded shadow-sm py-5 px-4">';
    if ($librarian['user_image']) {
      echo '<img src=""'.SWB.'images/persons/'.$librarian['user_image'].'"" alt="'.$librarian['realname'].'" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">';
      //echo '<div class="librarian-image"><img src="'.SWB.'images/persons/'.$librarian['user_image'].'" alt="'.$librarian['realname'].'" /></div>';
    } else {
      echo '<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">';
    }
    //echo '</div>';
    //echo '<div class="span8">';
    echo '<h5 class="mb-0">'.$librarian['realname'].'</h5><span class="small text-uppercase text-muted">'.$sysconf['system_user_type'][$librarian['user_type']].'</span>';

    //echo '<div class="row-fluid"><div class="span3 key">'.__('Name').'</div><div class="span7">'.$librarian['realname'].'</div></div>';
    //echo '<div class="row-fluid"><div class="span3 key">'.__('Position').'</div><div class="span7">'.$sysconf['system_user_type'][$librarian['user_type']].'</div></div>';
    //echo '<div class="row-fluid"><div class="span3 key">'.__('E-Mail').'</div><div class="span7">'.$librarian['email'].'</div></div>';
    echo '<ul class="social mb-0 list-inline mt-3 bi bi-envelope"><li class="list-inline-item "><a href="#"></a></li>  '.__('E-Mail').' '.$librarian['email'].'</ul>';
    //echo '<div class="row-fluid"><div class="span3 key">'.__('Social').'</div><div class="span9">';

    $social = array();
    if ($librarian['social_media']){
      $social = @unserialize($librarian['social_media']);
      echo '<ul class="librarian-social">';
      foreach ($sysconf['social'] as $id => $social_media) {
        if (isset($social[$id])) {
          echo '<li class="list-inline-item">'.$sysconf['social'][$id].': &nbsp; '.$social[$id].'</li>';  
        }
      }
      echo '</ul>';
    }
    echo '</div>
      </div>';
  }
  echo '</div></div>';
} else {
  echo '<p>'.__('No librarian data yet').'</p>';
}
