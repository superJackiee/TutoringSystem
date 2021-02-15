<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.bundle.min.js"></script>
<section class="user_section dashboard_sec">
      	<div class="container">
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Slider</h3>
                <br>
                <small>You can add a new slider from this form</small>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('gallery/add_slider_image'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages_form'); ?>

                <div class="form-group">
                    <label class="control-label">Title*</label>
                    <input type="text" class="form-control"
                           name="title" id="title" placeholder="Slider title"
                           value="<?php echo old('title'); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Description*</label>
                    <input type="text" class="form-control"
                           name="slider_description" id="slider_description" placeholder="Slider Description"
                           value="<?php echo old('slider_description'); ?>">
                </div>
                
                <div class="form-group">
                    <label class="control-label">Color*</label>
                    <input type="color" class="form-control" id="favcolor" name="favcolor"> 
                </div>
                
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-12">
                                <a class='btn btn-success btn-sm'>
                                    Select image
                                    <input type="file" id="Multifileupload" name="file" size="40" class="uploadFile"
                                           accept=".png, .jpg, .jpeg, .gif" required>
                                </a>
                            </div>
                        </div>
                    
                        <div class="col-sm-12">
                            <div class="row">
                                <div id="MultidvPreview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Add Image</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-8 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Sliders</h3>
                    <br>
                    <small class="pull-left">You can see Slider here</small>

                </div>
            </div><!-- /.box-header -->

            <!-- include message block -->
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th width="20">Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th class="max-width-120">Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($images as $item): ?>
                                    <tr>
                                        <td><?php echo html_escape($item->id); ?></td>
                                        <td>
                                            <img src="<?php echo base_url() . html_escape($item->path_small); ?>" alt="" width="100" class="img-responsive">
                                        </td>
                                        <td style='color:<? echo $item->favcolor ?>'><?php echo html_escape($item->title); ?></td>
                                        <td>
                                            <!--Form-->
                                            <?php echo form_open('gallery/delete_slider_image_post'); ?>

                                            <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                            <div class="dropdown">
                                                <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                        type="button"
                                                        data-toggle="dropdown">Select an option
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>gallery/update_slider_image/<?php echo html_escape($item->id); ?>"><i
                                                                    class="fa fa-edit i-edit"></i>Edit</a></li>
                                                    <li>
                                                        <a class="p0">
                                                            <button type="submit" class="btn-list-button"
                                                                    onclick="return confirm('Are you sure you want to delete this image?');">
                                                                <i class="fa fa-trash i-delete"></i>Delete
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php echo form_close(); ?><!--Form end-->

                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
</div>
</section>
<style>
    .form-inline {
    display: -ms-flexbox;
    display: contents !important;
    }
    </style>

