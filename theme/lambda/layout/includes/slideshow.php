<?php
$hasslide1image = (!empty($PAGE->theme->settings->slide1image));
$hasslide2image = (!empty($PAGE->theme->settings->slide2image));
$hasslide3image = (!empty($PAGE->theme->settings->slide3image));
$hasslide4image = (!empty($PAGE->theme->settings->slide4image));
$hasslide5image = (!empty($PAGE->theme->settings->slide5image));
$hasslideshow = ($hasslide1image||$hasslide2image||$hasslide3image||$hasslide4image||$hasslide5image);
$pattern='';
if($PAGE->theme->settings->slideshowpattern==1) {$pattern='pattern_1';}
else if($PAGE->theme->settings->slideshowpattern==2) {$pattern='pattern_2';}
else if($PAGE->theme->settings->slideshowpattern==3) {$pattern='pattern_3';}
else if($PAGE->theme->settings->slideshowpattern==4) {$pattern='pattern_4';}
$advance='true';
if($PAGE->theme->settings->slideshow_advance==0) {$advance='false';}
$navhover='true';
if($PAGE->theme->settings->slideshow_nav==0) {$navhover='false';}
$loader='';
if($PAGE->theme->settings->slideshow_loader==0) {$loader='bar';}
else if($PAGE->theme->settings->slideshow_loader==1) {$loader='pie';}
else if($PAGE->theme->settings->slideshow_loader==3) {$loader='none';}
$imgfx='random';
if ($PAGE->theme->settings->slideshow_imgfx!='') {$imgfx=$PAGE->theme->settings->slideshow_imgfx;}
$txtfx='moveFromLeft';
if ($PAGE->theme->settings->slideshow_txtfx!='') {$txtfx=$PAGE->theme->settings->slideshow_txtfx;}
?>

<?php if ($hasslideshow) { ?>
	<div class="camera_wrap camera_emboss <?php echo $pattern; ?>" id="camera_wrap">
    
    <?php if ($hasslide1image) { ?>
		<div data-src="<?php echo $PAGE->theme->setting_file_url('slide1image', 'slide1image'); ?>">
			<div class="camera_caption <?php echo $txtfx; ?>">
            	<?php if (!empty($PAGE->theme->settings->slide1)) { ?>
				<h1><?php echo $PAGE->theme->settings->slide1; ?></h1>
                <?php } ?>
                <?php if (!empty($PAGE->theme->settings->slide1caption)) { 
                	$slide1caption_HTML = $PAGE->theme->settings->slide1caption;
					$slide1caption_HTML = format_text($slide1caption_HTML,FORMAT_HTML);
				?>
				<span><?php echo $slide1caption_HTML ?>
                 <?php if (!empty($PAGE->theme->settings->slide1_url)) { ?>
                 <div style="text-align: right; margin-bottom: 0px;">
                   <a class="btn btn-default" href="<?php echo $PAGE->theme->settings->slide1_url; ?>"><?php echo get_string('more'); ?>&nbsp;...</a>
                 </div>
                <?php } ?>
                </span>
                <?php } ?>
			</div>
		</div>
    <?php } ?>
    
    <?php if ($hasslide2image) { ?>
		<div data-src="<?php echo $PAGE->theme->setting_file_url('slide2image', 'slide2image'); ?>">
			<div class="camera_caption <?php echo $txtfx; ?>">
            	<?php if (!empty($PAGE->theme->settings->slide2)) { ?>
				<h1><?php echo $PAGE->theme->settings->slide2; ?></h1>
                <?php } ?>
                <?php if (!empty($PAGE->theme->settings->slide2caption)) { 
                	$slide2caption_HTML = $PAGE->theme->settings->slide2caption;
					$slide2caption_HTML = format_text($slide2caption_HTML,FORMAT_HTML);
				?>
				<span><?php echo $slide2caption_HTML ?>
                 <?php if (!empty($PAGE->theme->settings->slide2_url)) { ?>
                 <div style="text-align: right; margin-bottom: 0px;">
                   <a class="btn btn-default" href="<?php echo $PAGE->theme->settings->slide2_url; ?>"><?php echo get_string('more'); ?>&nbsp;...</a>
                 </div>
                <?php } ?>
                </span>
                <?php } ?>
			</div>
		</div>
    <?php } ?>
    
    <?php if ($hasslide3image) { ?>
		<div data-src="<?php echo $PAGE->theme->setting_file_url('slide3image', 'slide3image'); ?>">
			<div class="camera_caption <?php echo $txtfx; ?>">
            	<?php if (!empty($PAGE->theme->settings->slide3)) { ?>
				<h1><?php echo $PAGE->theme->settings->slide3; ?></h1>
                <?php } ?>
                <?php if (!empty($PAGE->theme->settings->slide3caption)) { 
                	$slide3caption_HTML = $PAGE->theme->settings->slide3caption;
					$slide3caption_HTML = format_text($slide3caption_HTML,FORMAT_HTML);
				?>
				<span><?php echo $slide3caption_HTML ?>
                 <?php if (!empty($PAGE->theme->settings->slide3_url)) { ?>
                 <div style="text-align: right; margin-bottom: 0px;">
                   <a class="btn btn-default" href="<?php echo $PAGE->theme->settings->slide3_url; ?>"><?php echo get_string('more'); ?>&nbsp;...</a>
                 </div>
                <?php } ?>
                </span>
                <?php } ?>
			</div>
		</div>
    <?php } ?>
    
    <?php if ($hasslide4image) { ?>
		<div data-src="<?php echo $PAGE->theme->setting_file_url('slide4image', 'slide4image'); ?>">
			<div class="camera_caption <?php echo $txtfx; ?>">
            	<?php if (!empty($PAGE->theme->settings->slide4)) { ?>
				<h1><?php echo $PAGE->theme->settings->slide4; ?></h1>
                <?php } ?>
                <?php if (!empty($PAGE->theme->settings->slide4caption)) { 
                	$slide4caption_HTML = $PAGE->theme->settings->slide4caption;
					$slide4caption_HTML = format_text($slide4caption_HTML,FORMAT_HTML);
				?>
				<span><?php echo $slide4caption_HTML ?>
                 <?php if (!empty($PAGE->theme->settings->slide4_url)) { ?>
                 <div style="text-align: right; margin-bottom: 0px;">
                   <a class="btn btn-default" href="<?php echo $PAGE->theme->settings->slide4_url; ?>"><?php echo get_string('more'); ?>&nbsp;...</a>
                 </div>
                <?php } ?>
                </span>
                <?php } ?>
			</div>
		</div>
    <?php } ?>
    
    <?php if ($hasslide5image) { ?>
		<div data-src="<?php echo $PAGE->theme->setting_file_url('slide5image', 'slide5image'); ?>">
			<div class="camera_caption <?php echo $txtfx; ?>">
            	<?php if (!empty($PAGE->theme->settings->slide5)) { ?>
				<h1><?php echo $PAGE->theme->settings->slide5; ?></h1>
                <?php } ?>
                <?php if (!empty($PAGE->theme->settings->slide5caption)) { 
                	$slide5caption_HTML = $PAGE->theme->settings->slide5caption;
					$slide5caption_HTML = format_text($slide5caption_HTML,FORMAT_HTML);
				?>
				<span><?php echo $slide5caption_HTML ?>
                 <?php if (!empty($PAGE->theme->settings->slide5_url)) { ?>
                 <div style="text-align: right; margin-bottom: 0px;">
                   <a class="btn btn-default" href="<?php echo $PAGE->theme->settings->slide5_url; ?>"><?php echo get_string('more'); ?>&nbsp;...</a>
                 </div>
                <?php } ?>
                </span>
                <?php } ?>
			</div>
		</div>
    <?php } ?>
    				
	</div>
	<div class="text-center" style="line-height:1em;">
		<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/pix/bg/shadow.png" class="slidershadow" alt="">
	</div>
<?php } ?>