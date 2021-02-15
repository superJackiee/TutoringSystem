<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">

            <!--Check breadcrumb active-->
            <?php if ($page->breadcrumb_active == 1): ?>
                <div class="col-sm-12 page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                        </li>

                        <li class="breadcrumb-item active"><?php echo html_escape($page->title); ?></li>
                    </ol>
                </div>
            <?php else: ?>
                <div class="col-sm-12 page-breadcrumb"></div>
            <?php endif; ?>

            <div id="content" class="col-sm-12">

                <div class="row">
                    <!--Check page title active-->
                    <?php if ($page->title_active == 1): ?>
                        <div class="col-sm-12">
                            <h1 class="page-title"><?php echo html_escape($page->title); ?></h1>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <div class="page-contact">

                            <!--<div class="row row-contact-text">-->
                            <!--    <div class="col-sm-12 font-text">-->
                            <!--        <?php echo $settings->contact_text; ?>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="row">
                                <div class="col-sm-12 font-text">
                                    <h2 class="contact-leave-message"><?php echo trans("leave_message"); ?></h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <!-- include message block -->
                                    <?php $this->load->view('partials/_messages'); ?>

                                    <!-- form start -->
                                    <?php echo form_open('home/contact_post', ['onsubmit' => "if (!check_captcha_contact($('#captcha-input').val())) { $('#captcha-input').addClass('has-error'); return false };"]); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-input" name="name"
                                               placeholder="<?php echo trans("placeholder_name"); ?>" maxlength="199" minlength="1"
                                               pattern=".*\S+.*" value="<?php echo old('name'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-input" name="email" maxlength="199"
                                               placeholder="<?php echo trans("placeholder_email"); ?>"
                                               value="<?php echo old('email'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <textarea class="form-control form-input form-textarea" name="message"
                                              placeholder="<?php echo trans("placeholder_message"); ?>" maxlength="4970"
                                              minlength="5"
                                              required><?php echo old('message'); ?></textarea>
                                    </div>
                                    <!-- <div class="form-group has-feedback form-group-capt text-center">
                                        <div class="row">
                                            <div class="col-sm-6 captcha-cnt">
                                                <a class="captcha-refresh" onclick="refresh_captcha_contact();"><i class="fa fa-refresh"></i></a>
                                                <img class="img-captcha" id='imageCaptchaContact' alt="">
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="text" id="captcha-input" class="form-control pull-right form-input captcha-input"
                                                       placeholder="<?php echo trans("placeholder_captcha"); ?>" required>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-custom pull-right">
                                            <?php echo trans("btn_submit"); ?>
                                        </button>
                                    </div>

                                    </form><!-- form end -->


                                </div>

                                <div class="col-sm-6 col-xs-12 contact-right">

                                    <?php if ($settings->contact_email): ?>
                                        <div class="contact-item">
                                            <div class="col-sm-2 col-xs-2 contact-icon">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-sm-10 col-xs-10 contact-info">
                                                <?php echo html_escape($settings->contact_email); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($settings->contact_address): ?>
                                        <div class="contact-item">
                                            <div class="col-sm-2 col-xs-2 contact-icon">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-sm-10 col-xs-10 contact-info">
                                                <?php echo html_escape($settings->contact_address); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <div class="col-sm-12 contact-social">
                                        <ul>
                                            <!--Include social media links-->
                                            <?php // $this->load->view('partials/_social_media_links', ['rss_hide' => true]); ?>
                                        </ul>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php if (!empty($settings->map_api_key)): ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Google Map -->
                <div id="map" class="full-with-map"></div>
            </div>
        </div>
    <?php else: ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Google Map -->
                <div id="map" class="no-map"></div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- /.Section: wrapper -->

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $settings->map_api_key; ?>"></script>

<script>
    var myMap = new google.maps.LatLng(<?php echo $settings->latitude; ?>, <?php echo $settings->longitude; ?>);

    function initialize() {
        var mapProp = {
            center: myMap,
            zoom: 14,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "landscape.man_made",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                }
            ]
        };

        var map = new google.maps.Map(document.getElementById("map"), mapProp);

        var marker = new google.maps.Marker({
            position: myMap,
            icon: 'assets/img/map-pin.png'
        });

        var infowindow = new google.maps.InfoWindow({
            content: "united-states"
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
    #footer {
        margin-top: 0;
    }

</style>