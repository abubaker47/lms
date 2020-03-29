<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Parent theme: Bootstrapbase by Bas Brands
 * Built on: Essential by Julian Ridden
 *
 * @package   theme_lambda
 * @copyright 2014 redPIthemes
 *
 */
 
$hasfrontpageblocks = ($PAGE->blocks->region_has_content('side-pre', $OUTPUT) || $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$carousel_pos = $PAGE->theme->settings->carousel_position;
$haslogo = (!empty($PAGE->theme->settings->logo));
$standardlayout = (empty($PAGE->theme->settings->layout)) ? false : $PAGE->theme->settings->layout;

if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <noscript>
			<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/style/nojs.css" />
	</noscript>
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="wrapper">
<?php require_once(dirname(__FILE__).'/includes/header.php'); ?>

<div class="text-center" style="line-height:1em;">
	<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/pix/bg/shadow.png" class="slidershadow frontpage-shadow" alt="">
</div>

<div id="page" class="container-fluid">

<?php require_once(dirname(__FILE__).'/includes/slideshow.php');?>

    <div id="page-content" class="row-fluid">
    	<?php if ($hasfrontpageblocks==1) { ?>
            <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
            	<?php if ($standardlayout) { ?>
                <section id="region-main" class="span8 pull-right">
                <?php } else { ?>
                <section id="region-main" class="span8">
                <?php } ?>
        <?php } else { ?>
        	<div id="<?php echo $regionbsid ?>">
            <div class="row-fluid">
            	<section id="region-main" class="span12">
        <?php } ?>
            	<?php
            		echo $OUTPUT->course_content_header();
					if ($carousel_pos=='0') require_once(dirname(__FILE__).'/includes/carousel.php');
            		echo $OUTPUT->main_content();
            		echo $OUTPUT->course_content_footer();
					if ($carousel_pos=='1') require_once(dirname(__FILE__).'/includes/carousel.php');
            	?>
        		</section>
        	<?php
        	if ($hasfrontpageblocks==1) { 
				if ($standardlayout) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-left');}
				else {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-right');}
			} ?>
            </div>
        	</div>
        <?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
    </div>

    <?php if (is_siteadmin()) { ?>
	<div class="hidden-blocks">
    	<div class="row-fluid">
        	<h4><?php echo get_string('visibleadminonly', 'theme_lambda') ?></h4>
            <?php
                echo $OUTPUT->blocks('hidden-dock');
            ?>
    	</div>
	</div>
	<?php } ?>

	<a href="#top" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i><p><?php print_string('backtotop', 'theme_lambda'); ?></p></a>

</div>

	<footer id="page-footer" class="container-fluid">
		<?php require_once(dirname(__FILE__).'/includes/footer.php'); ?>
	</footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>


<!--[if lte IE 9]>
<script src="<?php echo $CFG->wwwroot;?>/theme/lambda/javascript/ie/iefix.js"></script>
<![endif]-->


<script>
jQuery(document).ready(function ($) {
$('.navbar .dropdown').hover(function() {
	$(this).addClass('extra-nav-class').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
	var na = $(this)
	na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('extra-nav-class') })
});

});

jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

<?php if ($hasslideshow) { ?>
	jQuery(function(){
		jQuery('#camera_wrap').camera({
			fx: '<?php echo $imgfx; ?>',
			height: 'auto',
			loader: '<?php echo $loader; ?>',
			thumbnails: false,
			pagination: false,
			autoAdvance: <?php echo $advance; ?>,
			hover: false,
			navigationHover: <?php echo $navhover; ?>,
			opacityOnGrid: false
		});
	});
<?php } ?>

<?php if ($hascarousel) { ?>
	jQuery(document).ready(function(){
  		jQuery('.slider1').bxSlider({
			pager: false,
			nextSelector: '#slider-next',
			prevSelector: '#slider-prev',
			nextText: '>',
			prevText: '<',
			slideWidth: 240,
    		minSlides: 1,
    		maxSlides: 6,
			moveSlides: 1,
    		slideMargin: 10			
  		});
	});
<?php } ?>

</script>

</body>
</html>