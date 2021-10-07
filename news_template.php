<?php
/**
 * ini adalah page news untuk home page
 */

function news_list_tpl($title, $path, $date, $summary) {
  ?>
<Section>
        <div class="container-fluid" style="background-color: rgba(229, 229, 229, 1.00); ">
            <div class="row text-capitalize">
                
                <div class="col-8 col-offset-1" style="padding-left: 100px;">
                
                    <div class="" ><div class=""><h1>halo</h1></div><!--Untuk card atau margin-->
                        <div class="card-body">
                            <div class="content-date text-grey-dark"><i class="far fa-clock mr-2"></i><?php echo $date ?></div>
                            <h4 class="content-title mb-4"><?php echo $title ?></h4>
                            <p class="content-summary mb-2"><?php echo $summary ?>...</p>
                            <div class="botton"><a class="btn" id="text-bottom"href="<?php echo SWB.'index.php?p='.$path ?>">Read more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Section>

    <?php
}