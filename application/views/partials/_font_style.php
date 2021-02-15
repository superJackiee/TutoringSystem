<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    body {<?php echo $primary_font_family; ?>  }.font-1 {<?php echo $secondary_font_family; ?>}.font-text {<?php echo $tertiary_font_family; ?>}.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {<?php echo $secondary_font_family; ?>}.section-mid-title .title {<?php echo $secondary_font_family; ?>}.section .section-content .title {<?php echo $secondary_font_family; ?>}.section .section-head .title {<?php echo $primary_font_family; ?>}.sidebar-widget .widget-head .title {<?php echo $primary_font_family; ?>}.post-content .post-text {<?php echo $tertiary_font_family; ?>}
    .top-bar,.news-ticker-title,.section .section-head .title,.sidebar-widget .widget-head,.section-mid-title .title {
        background-color: <?php echo $vsettings->site_block_color; ?>
    }
    .section .section-head,.section-mid-title {
        border-bottom: 2px solid <?php echo $vsettings->site_block_color; ?>;
    }
</style>