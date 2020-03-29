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

/* Core */
$string['configtitle'] = 'lambda';
$string['pluginname'] = 'lambda';
$string['choosereadme'] = '
<div class="clearfix">
<div style="margin-bottom:20px;">
<p style="text-align:center;"><img class="img-polaroid" src="lambda/pix/screenshot.jpg" /></p>
</div>
<hr />
<div class="prom-box prom-box-default shadow2" style="margin-bottom:20px;">
<h2>Theme Lambda - Responsive Theme for Moodle</h2>
</div>
<h4>Theme Summary</h4>
<div style="color: #888; text-transform: uppercase; margin-bottom:20px;">
<p>Compatibility: Moodle 2.5/2.6/2.7/2.8/2.9/3.0<br />Theme Version: 1.44<br />Parent theme: Bootstrapbase by Bas Brands<br />Built on: Essential by Julian Ridden</p>
</div>
<hr />
<p style="text-align:center;"><img class="img-polaroid" src="lambda/pix/redPIthemes.jpg" /></p>';

/* Settings - General */
$string['settings_general'] = 'General';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here. If you upload a logo it will appear in the header.';
$string['logo_res'] = 'Standard logo dimension';
$string['logo_res_desc'] = 'Sets the dimension of your logo to a maximum height of 100px. Using this setting, your logo will always correspond to the height of the login container and you can also use a @2x version for high-res screens.';
$string['pagewidth'] = 'Set Page Width';
$string['pagewidthdesc'] = 'Choose from the list of availble page layouts.';
$string['boxed_wide'] = 'Boxed - fixed width wide';
$string['boxed_narrow'] = 'Boxed - fixed width narrow';
$string['boxed_variable'] = 'Boxed - variable width';
$string['full_wide'] = 'Wide - variable width';
$string['layout'] = 'Use standard block layout';
$string['layoutdesc'] = 'This theme is designed to put both block columns on the side. If you prefer the standard Moodle course layout you can check to use the standard three column layout.';
$string['mycourses_dropdown'] = 'MyCourses dropdown menu';
$string['mycourses_dropdown_desc'] = 'Shows the enrolled courses for a user as a dropdown entry in the Custom Menu.';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site, e.g. Copyright and the name of your organisation.';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';

/* Settings - Background */
$string['settings_background'] = 'Page Background';
$string['list_bg'] = 'Select from list';
$string['list_bg_desc'] = 'Select the Page Background from a list of included background images.<br /><strong>Note: </strong>If you upload an image below, your choice here on the list will be discarded.';
$string['pagebackground'] = 'Upload custom image';
$string['pagebackgrounddesc'] = 'Upload your own background image. If none is uploaded a default image from the above list is used.';
$string['page_bg_repeat'] = 'Repeat uploaded image?';
$string['page_bg_repeat_desc'] = 'If you have uploaded a tiled background (like a pattern), you should mark the checkbox to repeat the image over the page background.<br />Otherwise, if you leave the box unchecked, the image will be used as a full page background image that covers the entire browser window.';

/* Settings - Colors */
$string['settings_colors'] = 'Colors';
$string['maincolor'] = 'Theme Color';
$string['maincolordesc'] = 'The main color of your theme - this will change mulitple components to produce the colour you wish across the moodle site';
$string['linkcolor'] = 'Link Color';
$string['linkcolordesc'] = 'The color of the links. You can use the main color of your theme here too, but some bright colors may be hard to read with this setting. In this case you can select a darker color here.';
$string['mainhovercolor'] = 'Theme Hover Color';
$string['mainhovercolordesc'] = 'Color for hover effects - this is used for links, menus, etc';
$string['def_buttoncolor'] = 'Default Button';
$string['def_buttoncolordesc'] = 'Color for the default button used in moodle';
$string['def_buttonhovercolor'] = 'Default Button (Hover)';
$string['def_buttonhovercolordesc'] = 'Color for the hover effect on the default button';
$string['menufirstlevelcolor'] = 'Menu 1. Level';
$string['menufirstlevelcolordesc'] = 'Color for the navigation bar';
$string['menufirstlevel_linkcolor'] = 'Menu 1. Level - Links';
$string['menufirstlevel_linkcolordesc'] = 'Color for the links in the navigation bar';
$string['menusecondlevelcolor'] = 'Menu 2. Level';
$string['menusecondlevelcolordesc'] = 'Color for the drop down menu in the navigation bar';
$string['menusecondlevel_linkcolor'] = 'Menu 2. Level - Links';
$string['menusecondlevel_linkcolordesc'] = 'Color for the links in the drop down menu';
$string['footercolor'] = 'Footer Background Color';
$string['footercolordesc'] = 'Set what color the background of the footer box should be';
$string['footerheadingcolor'] = 'Footer Heading Color';
$string['footerheadingcolordesc'] = 'Set the color for block headings in the footer';
$string['footertextcolor'] = 'Footer Text Color';
$string['footertextcolordesc'] = 'Set the color you want your text to be in the footer';
$string['copyrightcolor'] = 'Footer Copyright Color';
$string['copyrightcolordesc'] = 'Set what color the background of the copyright box in the footer should be';
$string['copyright_textcolor'] = 'Copyright Text Colour';
$string['copyright_textcolordesc'] = 'Set the color you want your text to be in the copyright box';

/* Settings - Socials */
$string['settings_socials'] = 'Social Media';
$string['socialsheadingsub'] = 'Engage your users with Social Networking';
$string['socialsdesc'] = 'Provide direct links to the core social networks that promote your brand.';
$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Enter the URL of your Facebook page. (i.e https://www.facebook.com/mycollege)';
$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Enter the URL of your Twitter feed. (i.e https://www.twitter.com/mycollege)';
$string['googleplus'] = 'Google+ URL';
$string['googleplusdesc'] = 'Enter the URL of your Google+ profile. (i.e https://plus.google.com/+mycollege)';
$string['youtube'] = 'YouTube URL';
$string['youtubedesc'] = 'Enter the URL of your YouTube channel. (i.e https://www.youtube.com/user/mycollege)';
$string['flickr'] = 'Flickr URL';
$string['flickrdesc'] = 'Enter the URL of your Flickr page. (i.e http://www.flickr.com/photos/mycollege)';
$string['pinterest'] = 'Pinterest URL';
$string['pinterestdesc'] = 'Enter the URL of your Pinterest page. (i.e http://pinterest.com/mycollege/mypinboard)';
$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Enter the URL of your Instagram page. (i.e http://instagram.com/mycollege)';
$string['website'] = 'Website URL';
$string['websitedesc'] = 'Enter the URL of your own website. (i.e http://www.mycollege.com)';
$string['socials_mail'] = 'Email Address';
$string['socials_mail_desc'] = 'Enter the HTML Email Address Hyperlink Code. (i.e info@mycollege.com)';
$string['socials_color'] = 'Social Icons Color';
$string['socials_color_desc'] = 'Set the color for your social media icons.<br /><strong>Note: </strong>This is ';
$string['socials_position'] = 'Icons Position';
$string['socials_position_desc'] = 'Choose where to place the social media icons: at the bottom of the page (footer) or at the top (header).';


/* Settings - Fonts */
$string['settings_fonts'] = 'Fonts';
$string['fontselect_heading'] = 'Font Selector - Headings';
$string['fontselectdesc_heading'] = 'Choose from the list of availble fonts.';
$string['fontselect_body'] = 'Font Selector - Body';
$string['fontselectdesc_body'] = 'Choose from the list of availble fonts.';


/* Settings - Slider */
$string['settings_slider'] = 'Slideshow';
$string['slideshowheading'] = 'Frontpage Slideshow';
$string['slideshowheadingsub'] = 'Dynamic Slideshow for the frontpage';
$string['slideshowdesc'] = 'This creates a dynamic slideshow of up to 5 slides for you to promote important elements of your site.<br /><b>NOTE: </b>You have to upload at least one image to make the slideshow appear. Heading, caption and URL are optional.';
$string['slideshow_slide1'] = 'Slideshow - Slide 1';
$string['slideshow_slide2'] = 'Slideshow - Slide 2';
$string['slideshow_slide3'] = 'Slideshow - Slide 3';
$string['slideshow_slide4'] = 'Slideshow - Slide 4';
$string['slideshow_slide5'] = 'Slideshow - Slide 5';
$string['slideshow_options'] = 'Slideshow - Options';
$string['slidetitle'] = 'Slide Heading';
$string['slidetitledesc'] = 'Enter a descriptive heading for your slide';
$string['slideimage'] = 'Slide Image';
$string['slideimagedesc'] = 'Upload an image.';
$string['slidecaption'] = 'Slide Caption';
$string['slidecaptiondesc'] = 'Enter the caption text to use for the slide';
$string['slide_url'] = 'Slide URL';
$string['slide_url_desc'] = 'If you enter an URL, a "Read more" button will be displayed in your slide.';
$string['slideshowpattern'] = 'Pattern/Overlay';
$string['slideshowpatterndesc'] = 'Select a pattern as a transparent overlay on your images';
$string['pattern1'] = 'none';
$string['pattern2'] = 'dotted - narrow';
$string['pattern3'] = 'dotted - wide';
$string['pattern4'] = 'lines - horizontal';
$string['pattern5'] = 'lines - vertical';
$string['slideshow_advance'] ='AutoAdvance';
$string['slideshow_advance_desc'] ='Select if you want to make a slide automatically advance after a certain amount of time';
$string['slideshow_nav'] ='Navigation Hover';
$string['slideshow_nav_desc'] ='If true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always';
$string['slideshow_loader'] ='Slideshow Loader';
$string['slideshow_loader_desc'] ='Select pie, bar, none (even if you choose "pie", old browsers like IE8- can not display it... they will display always a loading bar)';
$string['slideshow_imgfx'] ='Image Effects';
$string['slideshow_imgfx_desc'] ='Choose a transition effect for your images:<br /><i>random, simpleFade, curtainTopLeft, curtainTopRight, curtainBottomLeft, curtainBottomRight, curtainSliceLeft, curtainSliceRight, blindCurtainTopLeft, blindCurtainTopRight, blindCurtainBottomLeft, blindCurtainBottomRight, blindCurtainSliceBottom, blindCurtainSliceTop, stampede, mosaic, mosaicReverse, mosaicRandom, mosaicSpiral, mosaicSpiralReverse, topLeftBottomRight, bottomRightTopLeft, bottomLeftTopRight, bottomLeftTopRight, scrollLeft, scrollRight, scrollHorz, scrollBottom, scrollTop</i>';
$string['slideshow_txtfx'] ='Text Effects';
$string['slideshow_txtfx_desc'] ='Choose a transition effect text in your slides:<br /><i>moveFromLeft, moveFromRight, moveFromTop, moveFromBottom, fadeIn, fadeFromLeft, fadeFromRight, fadeFromTop, fadeFromBottom</i>';

/* Settings - Carousel */
$string['settings_carousel'] = 'Carousel';
$string['carouselheadingsub'] = 'Settings for the Frontpage Carousel';
$string['carouseldesc'] = 'Here you can setup a carousel slider for your Frontpage.<br /><strong>Note: </strong>You have to upload at least the images to make the slider appear. The caption settings will appear as a hover effect for the images and are optional.';
$string['carousel_position'] = 'Carousel Position';
$string['carousel_positiondesc'] = 'Select a position for the carousel slider.<br />You can choose to place the slider at the top or bottom of the content area.';
$string['carousel_h'] = 'Heading';
$string['carousel_h_desc'] = 'A heading for the frontpage carousel.';
$string['carousel_hi'] = 'Heading Tag';
$string['carousel_hi_desc'] = 'Define your heading: &lt;h1&gt; defines the most important heading. &lt;h6&gt; defines the least important heading.';
$string['carousel_add_html'] = 'Additional HTML Content';
$string['carousel_add_html_desc'] = 'Any content you enter here will be placed left to the frontpage carousel.<br /><strong>Note: </strong>You have to use HTML formatting elements to format your text.';
$string['carousel_slides'] = 'Number of Slides';
$string['carousel_slides_desc'] = 'Select the number of slides for your carousel';
$string['carousel_image'] = 'Image';
$string['carousel_imagedesc'] = 'Upload the image to appear in the slide.';
$string['carousel_heading'] = 'Caption - Heading';
$string['carousel_heading_desc'] = 'Enter a heading for your image - this will create a caption with a hover effect.<br /><strong>Note: </strong>You must at least enter the heading to make the caption appear.';
$string['carousel_caption'] = 'Caption - Text';
$string['carousel_caption_desc'] = 'Enter the caption text to use for the hover effect.';
$string['carousel_url'] = 'Caption - URL';
$string['carousel_urldesc'] = 'This will create a button for your caption with a link to the entered URL.';
$string['carousel_btntext'] = 'Caption - Link Text';
$string['carousel_btntextdesc'] = 'Enter a link text for the URL.';
$string['carousel_color'] = 'Caption - Color';
$string['carousel_colordesc'] = 'Select a color for the caption.';

/* Theme */
$string['visibleadminonly'] ='Blocks moved into the area below will only be seen by admins';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['region-footer-left'] = 'Footer (Left)';
$string['region-footer-middle'] = 'Footer (Middle)';
$string['region-footer-right'] = 'Footer (Right)';
$string['region-hidden-dock'] = 'Hidden from users';
$string['nextsection'] = '';
$string['previoussection'] = '';
$string['backtotop'] = '';