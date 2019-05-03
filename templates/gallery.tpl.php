<?php
    // Initialize
    $images = [];

    // Load images
    $fh = opendir('gallery');
    while ($file = readdir($fh)) {
        if ($file != 'Thumbs.db' && substr($file, 0, 1) != '.') {
            $images[] = 'gallery/' . $file;
        }
    }
?>
<h1>Galéria</h1>
<hr class="my-4">
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="upload.php" method="post" enctype="multipart/form-data" class="gallery">
                    <fieldset style="margin-left: -1rem; margin-right: -1rem;">
                        <div class="form-group row">
                            <label for="imagefile" class="col-sm-4 col-form-label">Válasszon egy képet a feltöltéshez</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imagefile" name="imagefile" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Kép feltöltése</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if (!empty($images)) {
            foreach ($images as $image) {
        ?>
        <div class="col-sm pt-3">
            <a href="<?php echo $image; ?>" class="image-to-modal"><img src="<?php echo $image; ?>" alt="" class="border border-secondary rounded" style="width: 200px;"></a>
        </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-sm-12">
                <div class="alert alert-danger mt-3" role="alert">
                    A galéria jelenleg nem tartalmaza egy képet sem.
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Kép megtekintése</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Bezár</span></button>
                </div>
                <div class="modal-body">
                    <img src="" id="imagepreview" class="border border-secondary rounded" style="max-width: 1024px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bezár</button>
                </div>
            </div>
        </div>
    </div>
</div>
