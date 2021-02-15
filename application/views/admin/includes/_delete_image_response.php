<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php foreach ($post_images as $image): ?>
    <div class="col-sm-3">
        <div class="img-preview-box">
            <button class="btn btn-danger btn-delete-image" onclick="deletePostImage('<?php echo $image->id ?>');"><i class="fa fa-trash"></i></button>
            <img src="<?php echo base_url() . $image->image_default ?>" class="img-thumbnail" alt="">
        </div>
    </div>
<?php endforeach; ?>