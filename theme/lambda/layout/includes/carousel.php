<?php
$hascarousel = (!empty($PAGE->theme->settings->carousel_image_1));
$numberofslides = $PAGE->theme->settings->carousel_slides;
$hasheading = (!empty($PAGE->theme->settings->carousel_h));
$has_additional_html = (!empty($PAGE->theme->settings->carousel_add_html));
?>

<?php if ($hascarousel) { ?>

<?php if ($has_additional_html) { ?>
<div class="row-fluid frontpage">
  <div class="span4">
  <?php echo $PAGE->theme->settings->carousel_add_html; ?>  
  </div>
<div class="span8">
<?php } ?>

	<div class="carousel">
    <?php if ($hasheading) {
  		echo '<h'.$PAGE->theme->settings->carousel_hi.' class="bx-heading">'.$PAGE->theme->settings->carousel_h.'</h'.$PAGE->theme->settings->carousel_hi.'>';	
		echo '<span id="slider-prev"></span><span id="slider-next"></span>';
	} else {
		echo '<div style="padding-bottom: 20px;"><span id="slider-prev"></span><span id="slider-next"></span></div>';
	} ?>
  	
	</div>
	<div class="slider1">    	
        <?php for ($i = 1; $i <= $numberofslides; $i++) { ?>
        	<?php
            $current_image = 'carousel_image_'.$i;
			if (!empty($PAGE->theme->settings->$current_image)) { ?>
            	<?php 
				$current_heading = 'carousel_heading_'.$i;
				if ($PAGE->theme->settings->$current_heading!='') echo '<div class="caption-hover">'; 
				?>
        		<div class="slide">                
                <?php $image = $PAGE->theme->setting_file_url($current_image, $current_image);?>
                <img src="<?php echo $image; ?>" alt="<?php echo $current_image; ?>"/>

        		</div>
                <?php
				if ($PAGE->theme->settings->$current_heading!='') {			
					$current_color = 'carousel_color_'.$i;
					$color_number = $PAGE->theme->settings->$current_color;
					if ($color_number=='0') {$color = 'green';}
					else if ($color_number=='1') {$color = 'purple';}
					else if ($color_number=='2') {$color = 'orange';}
					else if ($color_number=='3') {$color = 'lightblue';}
					else if ($color_number=='4') {$color = 'yellow';}
					else if ($color_number=='5') {$color = 'turquoise';}
					echo '<div class="mask '.$color.'">';
					$heading = $PAGE->theme->settings->$current_heading;
					echo '<h2>'.$heading.'</h2>';
					$current_caption = 'carousel_caption_'.$i;
					$caption = $PAGE->theme->settings->$current_caption;
					echo '<p>'.$caption.'</p>';
					$current_url = 'carousel_url_'.$i;
					$url = $PAGE->theme->settings->$current_url;
					$current_btntext = 'carousel_btntext_'.$i;
					$btntext = $PAGE->theme->settings->$current_btntext;
					if ($url!='') echo '<a class="info" href="'.$url.'">'.$btntext.'</a>';
					echo '</div></div>';
				}
				?>					
    
			<?php } ?>
		<?php } ?>
        
	</div>

<?php if ($has_additional_html) { ?>    
  </div>
</div>
<?php } ?>

<?php } ?>