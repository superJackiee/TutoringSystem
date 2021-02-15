<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
    if( $this->session->flashdata('error') !== null ){ 
        $msg = $this->session->flashdata('error');
        echo $msg;
?>

<script>
// if(window.location.href == <?= base_url(); ?> ){
    swal('<?= $msg ?>');
// }
</script>
<?php  
    } 
?>

<div class="modal fade auth-modal" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div id="menu-login" class="tab-pane fade in active">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="ion-close-round" aria-hidden="true"></i></button>
                    <h4 class="modal-title font-1"><?php echo trans("title_login"); ?></h4>
                </div>

                <div class="modal-body">
                    <div class="auth-box">


                        <p class="p-auth-modal-or">
                            <!-- <span><?php echo trans("or"); ?></span> -->
                        </p>

                        <!-- include message block -->
                        <div id="result-login" style='color:red;text-align:center'><?php // $this->session->flashdata('error');?></div>

                        <!-- form start     id="form-login"-->
                        <form  action="<?php echo base_url('auth/login_ajax_post') ?>"  method="POST">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control form-input"
                                       placeholder="<?php echo trans("placeholder_email"); ?>"
                                       value="<?php echo old('email'); ?>" required>
									   <i class="fa fa-envelope glyphicon form-control-feedback "></i>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control form-input"
                                       placeholder="<?php echo trans("placeholder_password"); ?>"
                                       value="<?php echo old('password'); ?>" required>
									    <i class="fa fa-lock glyphicon form-control-feedback "></i>
                            </div>

                            <div class="row">
                                <div class="col-sm-7 col-xs-7">
                                    <a href="<?php echo base_url(); ?>reset-password" class="link-forget">
                                        <?php echo trans("title_forgot_password"); ?>
                                    </a>
                                </div>
                                <div class="col-sm-5 col-xs-5">
                                    <button type="submit" class="btn btn-primary btn-custom pull-right">
                                        <?php echo trans("btn_login"); ?>
                                    </button>
                                </div>
                            </div>
                            <?php // echo $this->session->flashdata('error'); ?>
                        </form><!-- form end -->

                    </div>
                </div>

                <div class="modal-footer">
                    <?php echo trans("create_account"); ?>
                                <a href="<?php echo base_url(); ?>Auth/student_register" class="link-forget">
                                  Student
                                </a> or
                                
                                <a href="<?php echo base_url(); ?>Auth/teacher_acknowlegment" class="link-forget">
                                  Teacher
                                </a>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
   .auth-modal .modal-footer a {
    color: #007bff;
}
</style>
