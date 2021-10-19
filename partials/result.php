<?php
include 'nav.php';
include 'search.php';

//    echo '<h2>' . __('No Result') . '</h2><hr/><p>' . __('Please try again') . '</p>';
// if (strlen($main_content) == 7 || ($_GET['keywords'] == '')){
//     echo '<h2>' . __('No Result') . '</h2><hr/><p>' . __('Please try again') . '</p>';
// }else{
echo $main_content;
echo '<br>';
echo $search_result_info;//}
include 'footer.php';
?>