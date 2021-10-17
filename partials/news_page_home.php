<?php
include 'nav.php';
$path = $_GET['p'];
$sql = 'SELECT content_title FROM content WHERE content_path="'.$path.'";';
$row = $dbs->query($sql)->fetch_assoc();
?>
<div class="container">
<div class="row">
    <div class="col-12">
    <h3><?php echo $row['content_title']?></h3>
<?php echo $main_content;?>
</div>
</div>
</div>
<?php
include 'footer.php'
?>