<?php global $smof_data; ?>
<?php 
    
	
	if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) == '') {
		$nameError = __('Please enter your name.', 'rocknrolla');
		$hasError = true;
	} else {
		$contactName = trim($_POST['contactName']);
	}

	if(trim($_POST['contactEmail']) == '')  {
		$emailError = __('Please enter your email address.', 'rocknrolla');
		$hasError = true;
	} else if (!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/", trim($_POST['contactEmail']))) {
		$emailError = __('You entered an invalid email address.', 'rocknrolla');
		$hasError = true;
	} else {
		$contactEmail = trim($_POST['contactEmail']);
	}

	$contactSubject = trim($_POST['contactSubject']);

	if(trim($_POST['contactMessage']) == '') {
		$messageError = __('Please enter a message.', 'rocknrolla');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$contactMessage = stripslashes(trim($_POST['contactMessage']));
		} else {
			$contactMessage = trim($_POST['contactMessage']);
		}
	}
	
	if(!isset($hasError)) {
		$emailTo = get_option('admin_email');
		$subject = $contactSubject;
		$body = $contactMessage;
		$headers = 'From: '.$contactName.' <'.$contactEmail.'>' . "\r\n" . 'Reply-To: ' . $contactEmail;

		if( wp_mail($emailTo, $subject, $body, $headers) ) {
			$emailSent = true;
		}
	}
	
	if(isset($_POST['ajax'])) {		
		if(isset($emailSent) && $emailSent == true) {
			die('Mail sent');
		} else if(isset($hasError) && $hasError == true) {
			die('error');
		}
	}
} ?>

             <?php if( $smof_data['rnr_enable_googlemap']) { ?>          
              <div  class="row contact-map">
					  <script type="text/javascript">
                        jQuery(document).ready(function() {
                      function initialize() {
                              var secheltLoc = new google.maps.LatLng(<?php echo $smof_data['rnr_map_lat']; ?>,<?php echo $smof_data['rnr_map_lon']; ?>);
                              var myMapOptions = {
                                   center: secheltLoc
                                  ,mapTypeId: google.maps.MapTypeId.ROADMAP
                                  ,zoom: <?php echo $smof_data['rnr_map_zoom']; ?> , scrollwheel: false,mapTypeControl: false, zoomControl: false, draggable: false
                              };
                              var theMap = new google.maps.Map(document.getElementById("google-map"), myMapOptions);
                              var image = new google.maps.MarkerImage(
                                  '<?php echo get_template_directory_uri().'/images/pinMap.png'; ?>',
                                  new google.maps.Size(17,26),
                                  new google.maps.Point(0,0),
                                  new google.maps.Point(8,26)
                              );
                              var shadow = new google.maps.MarkerImage(
                                  '<?php echo get_template_directory_uri().'/images/pinMap-shadow.png'; ?>',
                                  new google.maps.Size(33,26),
                                  new google.maps.Point(0,0),
                                  new google.maps.Point(9,26)
                              );
                              var marker = new google.maps.Marker({
                                  map: theMap,
                                  icon: image,
                                  shadow: shadow,
                                  draggable: false,
                                  animation: google.maps.Animation.DROP,
                                  position: secheltLoc,
                                  visible: true
                              });
                      
                              var boxText = document.createElement("div");
                              boxText.innerHTML = '<div class="captionMap animated bounceInDown"><img src="<?php echo $smof_data['rnr_map_logo']; ?>" class="alignleft"  alt="Contact Address"> <span><?php echo $smof_data['rnr_contact_address']; ?></span></div>';
                      
                              var myOptions = {
                                   content: boxText
                                  ,disableAutoPan: false,maxWidth: 0
                                  ,pixelOffset: new google.maps.Size(-140, 0)
                                  ,zIndex: null
                                  ,boxStyle: { 
                                      width: "280px"
                                   }
                                  ,closeBoxURL: ""
                                  ,infoBoxClearance: new google.maps.Size(1, 1)
                                  ,isHidden: false
                                  ,pane: "floatPane"
                                  ,enableEventPropagation: false
                              };
                      
                              google.maps.event.addListener(theMap, "click", function (e) {
                                  ib.open(theMap, this);
                              });
                      
                              var ib = new InfoBox(myOptions);
                              ib.open(theMap, marker);
                              }
                              google.maps.event.addDomListener(window, 'load', initialize);
                              
                          });	
                          </script>   
                      <div id="google-map" class="embed clearfix">
                        <div class="mapPreLoading">
                            <span><h4>Loading</h4></span>
                            <span class="l-1"></span>
                            <span class="l-2"></span>
                            <span class="l-3"></span>
                            <span class="l-4"></span>
                            <span class="l-5"></span>
                            <span class="l-6"></span>
                        </div>
                      </div>
             </div>    
             
             <?php } ?> 

       <div class="container">
            <div class="row">
        
              <div class="sixteen columns">                
                      <!-- START CONTACT FORM -->
                       <div id="contact-form">		
                       
                       
                          
				<form action="<?php the_permalink(); ?>" method="post" class="contactForm form" id="contact-form">		
                     
                         
                              <div id="contact-input">
                              <input type="text" name="contactName" class="required" id="contactName" value="<?php _e('Name', 'rocknrolla'); ?>" />
                              <input type="text" name="contactEmail" class="required" id="contactEmail" value="<?php _e('E-mail', 'rocknrolla'); ?>" />
                              <input type="text" name="contactSubject" class="required" id="contactSubject" value="<?php _e('Subject', 'rocknrolla'); ?>" />
                              </div>
                              
                              
                              <div id="contact-textarea">
                              <textarea  class="required" name="contactMessage" id="contactMessage" rows="" cols=""><?php _e('Message', 'rocknrolla'); ?></textarea>
                              </div>
                              
                              <div id="contact-submit">
                              <input type="hidden" name="submitted" id="submitted" value="true" />
                              <input type="submit" value="<?php _e('Send', 'rocknrolla'); ?>" class="comment-submit button submit" id="submitform" />
                              
                              <span id="msg"></span>
                              
                              
                              </div>
                            </form> 
                           <div class="clear"></div>
                        </div>
                      <!-- END CONTACT FORM -->
               </div><!-- END OF SPAN5 -->

             </div>
            </div><!-- END OF CONTAINER -->                  
