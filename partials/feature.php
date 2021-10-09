<?php
if(  !( isset($_GET['search']) || isset($_GET['title']) || isset($_GET['keywords']) || isset($_GET['p']) ) ) :
    $result = $dbs->query("SELECT content_title,content_desc,content_path,last_update FROM content WHERE is_news = 1 ORDER BY last_update DESC LIMIT 5;");
?>
<?php if ($result->num_rows > 0):?>
<Section>
  <div class="headline" id="news">NEWS UPDATE</div>
        <div class="container-fluid" style="background-color: rgba(229, 229, 229, 1.00); opacity: 0.7;">
            <div class="row text-capitalize">
                <div class="col-8 col-offset-1" style="padding-left: 100px;">
                    <div class=""><!--Untuk card atau margin-->
                        <div class="card-body">
                          <?php while($row = $result->fetch_assoc()): ?>
                            <div class="content-date text-grey-dark"><i class="far fa-clock mr-2"></i><?php echo $row['last_update']; ?></div>
                            <h4 class="content-title mb-4"><?php echo $row['content_title']; ?></h4>
                            <p class="content-summary mb-2"><?php echo substr($row['content_desc'],0,500); ?></p>
                            <div class="botton"><a class="btn" id="text-bottom"href="index.php?p=<?php echo $row['content_path'] ?>">Read more</a></div>
                            <?php endwhile;?>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </Section>

    
  <?php endif;?>
<?php endif;?>