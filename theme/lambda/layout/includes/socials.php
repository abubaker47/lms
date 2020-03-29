<?php
$haswebsite = (!empty($PAGE->theme->settings->website));
$hassocials_mail = (!empty($PAGE->theme->settings->socials_mail));
$hasfacebook = (!empty($PAGE->theme->settings->facebook));
$hasflickr = (!empty($PAGE->theme->settings->flickr));
$hastwitter = (!empty($PAGE->theme->settings->twitter));
$hasgoogleplus = (!empty($PAGE->theme->settings->googleplus));
$haspinterest = (!empty($PAGE->theme->settings->pinterest));
$hasinstagram = (!empty($PAGE->theme->settings->instagram));
$hasyoutube = (!empty($PAGE->theme->settings->youtube));
$hassocials = ($haswebsite||$hassocials_mail||$hasfacebook||$hasflickr||$hastwitter||$hasgoogleplus||$haspinterest||$hasinstagram||$hasyoutube);
?>

<?php if ($hassocials) { ?>
	<div class="socials row-fluid">
    
    <?php if ($hassocials_mail||$haswebsite) { ?>
    	<div class="span6">
        	<div class="social_contact">
            <?php if ($haswebsite) { ?>
            <nobr><i class="fa fa-bookmark-o"></i> &nbsp;<a href='<?php echo $PAGE->theme->settings->website; ?>' target="_blank" class="social_contact_web"><?php echo $PAGE->theme->settings->website; ?></a></nobr>
            <?php 
			} ?>
            <?php if ($hassocials_mail) { ?>
            <nobr><i class="fa fa-envelope-o"></i> &nbsp;E-mail: <a href='mailto:<?php echo $PAGE->theme->settings->socials_mail; ?>'><?php echo $PAGE->theme->settings->socials_mail; ?></a></nobr>
            <?php 
			} ?>
            </div>
        </div>
        <div class="span6">
        <?php
        } else { ?>
		<div class="span12"> 
		<?php 
		} ?>
        	<div class="social_icons pull-right">
                <?php if ($hasfacebook) { ?><a class="social fa fa-facebook" href='<?php echo $PAGE->theme->settings->facebook; ?>' target='_blank'> </a><?php } ?>
                <?php if ($hasflickr) { ?><a class="social fa fa-flickr" href='<?php echo $PAGE->theme->settings->flickr; ?>' target='_blank'> </a><?php } ?>
                <?php if ($hastwitter) { ?><a class="social fa fa-twitter" href='<?php echo $PAGE->theme->settings->twitter; ?>' target='_blank'> </a><?php } ?>
                <?php if ($hasgoogleplus) { ?><a class="social fa fa-google-plus" href='<?php echo $PAGE->theme->settings->googleplus; ?>' target='_blank'> </a><?php } ?>
                <?php if ($haspinterest) { ?><a class="social fa fa-pinterest" href='<?php echo $PAGE->theme->settings->pinterest; ?>' target='_blank'> </a><?php } ?>
                <?php if ($hasinstagram) { ?><a class="social fa fa-instagram" href='<?php echo $PAGE->theme->settings->instagram; ?>' target='_blank'> </a><?php } ?>
                <?php if ($hasyoutube) { ?><a class="social fa fa-youtube" href='<?php echo $PAGE->theme->settings->youtube; ?>' target='_blank'> </a><?php } ?>
            </div>
        </div>
        
    </div>
<?php } ?>