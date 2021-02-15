<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!-- Small boxes (Stat box) -->
<?php if (is_admin()): ?>
<section class="user_section dashboard_sec">
    <div class="container">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo html_escape($pending_post_count); ?></h3>
                    <p>Pending Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo html_escape($pending_video_count); ?></h3>
                    <p>Pending Videos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-videos" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo html_escape($user_count); ?></h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/users" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
<?php endif; ?>
<?php if (is_author()): ?>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?php echo html_escape($post_count); ?></h3>
                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/author-posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo html_escape($pending_post_count); ?></h3>
                    <p>Pending Posts</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-posts" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->


        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo html_escape($video_count); ?></h3>
                    <p>Videos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-youtube-play"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/videos" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo html_escape($pending_video_count); ?></h3>
                    <p>Pending Videos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-low-vision"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/pending-videos" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

    </div><!-- /.row -->
<?php endif; ?>

<?php if (is_admin()): ?>
    <!-- /.row -->

    <div class="row">
        <!-- <div class="col-sm-12 no-padding margin-bottom-20"> -->
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Teachers</h3>
                        <br>
                        <small>You can see last registered Teachers here</small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">

                            <?php foreach ($last_teachers as $item) : ?>
                                <li>
                                    <a>
                                        <img src="<?php echo get_user_avatar($item); ?>" alt="user" class="img-responsive">
                                    </a>
                                    <a class="users-list-name"><?php echo html_escape($item->username); ?></a>
                                    <span class="users-list-date"><?php echo nice_date($item->created_at, 'd.m.Y'); ?></span>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="<?php echo base_url(); ?>admin/teacher" class="btn btn-sm btn-default btn-flat pull-right">View All Teachers</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Students</h3>
                        <br>
                        <small>You can see last registered Students here</small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">

                            <?php foreach ($last_students as $item) : ?>
                                <li>
                                    <a>
                                        <img src="<?php echo get_user_avatar($item); ?>" alt="user" class="img-responsive">
                                    </a>
                                    <a class="users-list-name"><?php echo html_escape($item->username); ?></a>
                                    <span class="users-list-date"><?php echo nice_date($item->created_at, 'd.m.Y'); ?></span>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="<?php echo base_url(); ?>admin/student" class="btn btn-sm btn-default btn-flat pull-right">View All Students</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
        <!-- </div> -->
    </div>


    <div class="row">
        <!-- <div class="col-sm-12 no-padding"> -->

            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Latest User added</h3>
                        <br>
                        <small>You can see Waiting Registration to get active </small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body  index-table">
                        <ul class="users-list clearfix">

                            <?php foreach ($latest_user as $item) : ?>
                                <li>
                                    <a>
                                        <img src="<?php echo get_user_avatar($item); ?>" alt="user" class="img-responsive">
                                    </a>
                                    <a class="users-list-name"><?php echo html_escape($item->username); ?></a>
                                    <span class="users-list-date"><?php echo nice_date($item->created_at, 'd.m.Y'); ?></span>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!-- /.users-list -->
                    </div>

                    <div class="box-footer clearfix">
                        <a href="<?php echo base_url(); ?>admin/register_users"
                           class="btn btn-sm btn-default btn-flat pull-right">View All New Resgister-User</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Last Contact Messages</h3>
                        <br>
                        <small>You can see last contact messages here</small>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body index-table">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th style="width: 60%">Message</th>
                                    <th style="min-width: 13%">Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($last_contacts as $item): ?>

                                    <tr>
                                        <td>
                                            <?php echo html_escape($item->id); ?>
                                        </td>
                                        <td>
                                            <?php echo html_escape($item->name); ?>
                                        </td>
                                        <td style="width: 60%" class="break-word">
                                            <?php echo html_escape($item->message); ?>
                                        </td>
                                        <td style="min-width: 13%">
                                            <?php echo nice_date($item->created_at, 'd.m.Y'); ?>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>

                    <div class="box-footer clearfix">
                        <a href="<?php echo base_url(); ?>admin/contact-messages"
                           class="btn btn-sm btn-default btn-flat pull-right">View All Contact Messages</a>
                    </div>
                </div>
            </div>

        <!-- </div> -->


    </div>
    </div>
</section>
    <!-- /.row -->
<?php endif; ?>