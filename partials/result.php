<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-23T11:32:46+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _result-search.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T16:53:58+07:00

?>

<div class="result-search">
    <section id="section1 container-fluid">
        <header class="c-header">
            <div class="mask"></div>
          <?php
          // ----------------------------------------------------------------------
          // include navbar part
          // ----------------------------------------------------------------------
          include 'nav.php'; ?>
        </header>
    </section>
    <div style="text-align:center"><br>
<h1>OPAC</h1>
<h4>Online Public Access Catalog</h4>
</div>
<div class="container-fluid">
<form>
        <div class="search container">
                    <div class="input-group mb-3">
                        <input name="keywords" type="text" class="form-control"
                               placeholder="<?= __('Enter Keywords'); ?>"
                               aria-label="Enter Keywords"
                               aria-describedby="button-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" value="search" name="search"
                                    id="button-addon2"><?= __('Find Collection'); ?>
                            </button>
                        </div>
                    </div>
</form>

    <section class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="wraper">
                  <?php
                  // catch empty list
                  if (trim(strip_tags($main_content)) === '') {
                    echo '<h2 class="text-danger">' . __('No Result') . '</h2><hr/><p class="text-danger">' . __('Please try again') . '</p>';
                  } else {
                    echo $main_content;
                  }
                  ?>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="mb-2"><?= __('Search Result')?></h4>
              <?php
              echo '<div class=" mb-4 text-sm">' . $search_result_info . '</div><hr>';
              if ($sysconf['template']['classic_suggestion']) {
              $randome = getRandomBiblio($dbs);
              if (count($randome) > 0) {
              ?>
                <h6 class="mb-2"><?= __('Suggestion')?></h6>
                <div class="card-list d-flex flex-column mb-4">
                  <?php
                  foreach ($randome as $biblio) {
                    $images_loc = 'images/docs/' . $biblio['image'];
                    $thumb_url = './lib/minigalnano/createthumb.php?filename=' . urlencode($images_loc) . '&width=120';
                    ?>
                      <div class="card sugestion border-0 elevation-1 mb-2">
                          <div class="card-body">
                              <div class="container-img elevation-2">
                                  <img src="<?= $thumb_url; ?>" alt="image" class="img-fluid">
                              </div>
                              <div class="card-text title">
                                  <a class="text-decoration-none text-grey-darker"
                                     href="<?= SWB . 'index.php?p=show_detail&id=' . $biblio['biblio_id']; ?>"><?= $biblio['title']; ?></a>
                              </div>
                              <div class="card-text author">
                                  <i><?= $biblio['author']; ?></i>
                              </div>
                          </div>
                      </div>
                    <?php
                  }
                  }
                  } elseif ($sysconf['enable_search_clustering']) {
                      if ($sysconf['index']['engine']['enable']) {
                          echo '<div class="cluster">'.$biblio_list->getClustering().'</div>';
                      }
                  }
                  ?>
                </div>
            </div>
        </div>
    </section>
    <footer class="c-footer">
            <div class="mask"></div>
          <?php
          // ----------------------------------------------------------------------
          // include navbar part
          // ----------------------------------------------------------------------
          include 'footer.php'; ?>
        </footer>
</div>
