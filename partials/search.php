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
<section>
<form action="index.php" method="get">
<div class="container" style="padding: 35px 70px 50px;" >
      <div class="row">
        <div class="col">
        <label for="adv-titles">Title</label>
          <div class="formi">
            <input type="text" name="title" class="form-control" id="adv-titles" placeholder="Enter title">
          </div>
        </div>
        <div class="col">
        <label for="adv-titles">Author</label>
          <div class="formi">
          <input type="text" name="author" class="form-control" id="adv-author" placeholder="Enter author(s) name">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <label for="adv-titles">Subject(s)</label>
          <div class="formi">
            <input type="text" name="subject" class="form-control" id="adv-subject" placeholder="Enter Subject(s)">
          </div>
        </div>
        <div class="col">
        <label for="adv-titles">ISBN/ISSN</label>
          <div class="formi">
          <input type="text" name="isbn" class="form-control" id="adv-isbn" placeholder="Enter ISBN/ISSN">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="formi">
          <label for="adv-titles">Tipe Koleksi</label>
          <select id="adv-location" name="location" class="form-control">
          <option value="" disabled selected hidden>Tipe Koleksi</option>
          <option><?=$colltype_list; ?></option>
          </select>
          </div>
        </div>

        <div class="col">
          <div class="formi">
          <label for="adv-titles">location</label>
          <select id="adv-location" name="location" class="form-control">
          <option value="" disabled selected hidden>location</option>
          <option><?=$location_list; ?></option>
          </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="formi">
          <label for="adv-titles">GMD</label>
          <select id="adv-location" name="location" class="form-control">
          <option value="" disabled selected hidden>GMD</option>
          <option id="adv-gmd" name="gmd" class="form-control"><?=$gmd_list; ?></option>
          </select>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
          <div class="modal-footer">
        <button type="submit" name="search" value="search" class="btn btn-primary">Find Collection</button>
        </div>  
      </div>
</div>
</form>
</section>
        </div>
</form>
</div>
