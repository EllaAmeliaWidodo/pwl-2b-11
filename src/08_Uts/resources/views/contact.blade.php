@extends('layouts.app2')

@section('content')

<div class="row">
			<div class="tm-contact-lr">
				<div class="tm-map-container">
					<div id="google-map"></div>	
				</div>				
				<div class="tm-2-columns">	
					<div class="col-lg-push-6 col-md-push-6 col-sm-push-6 col-xs-push-6 tm-contact-small-box tm-about-container tm-position-relative tm-white-box">
						<h2 class="tm-h2 tm-about-title">Follow Us On <span class="tm-red-text margin-top-15">Social Networks</span></h2>						
					</div>				
					<div class="col-lg-pull-6 col-md-pull-6 col-sm-pull-6 col-xs-pull-6 tm-contact-small-box tm-red-box">
						<i class="fa fa-4x fa-caret-left tm-triangle-left"></i>
						<div class="tm-contact-social-icons">
							<a href="#" class="tm-contact-social-icon"><i class="fa fa-twitter"></i></a>
							<a href="#" class="tm-contact-social-icon"><i class="fa fa-rss"></i></a>
							<a href="#" class="tm-contact-social-icon"><i class="fa fa-facebook"></i></a>
							<a href="#" class="tm-contact-social-icon"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
					
				</div>
			</div>
			<div class="tm-contact-lr">				
				<div class="tm-2-columns">
					<div class="tm-contact-small-box tm-about-container tm-position-relative tm-white-box">
						<h2 class="tm-h2 margin-bottom-0"><i class="fa fa-map-marker"></i> Our <span class="tm-blue-text">Address</span></h2>							
					</div>
					<div class="tm-contact-small-box">
						<i class="fa fa-4x fa-caret-right tm-triangle-right"></i>
						<p class="tm-address">123, Rama IX Road,<br>Bangkok 12345,<br>Thailand.</p>
						<img src="img/contact.jpg" alt="image" class="tm-contact-address-img">
					</div>
				</div>
				<div class="tm-contact-form-container">
					<form action="#" method="post" class="tm-contact-form">
						<h2 class="tm-h2 tm-white-text">Contact <span class="tm-blue-text">Form</span></h2>
						<div class="form-group margin-top-30">
		                	<input type="text" id="contact_name" class="form-control" placeholder="NAME" />
		              	</div>
		              	<div class="form-group">
		                	<input type="email" id="contact_email" class="form-control" placeholder="EMAIL" />
			            </div>
			            <div class="form-group">
			            	<input type="text" id="contact_subject" class="form-control" placeholder="SUBJECT" />
			            </div>
			            <div class="form-group">
			                <textarea id="contact_message" class="form-control" rows="6" placeholder="MESSAGE"></textarea>
			            </div>
			            <div class="form-group">
			            	<button class="tm-blue-button tm-form-submit-button" type="submit" name="submit">Send</button> 
			            </div>  
					</form>
				</div>
			</div>
		</div>
					  			  	
	</div>
	
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
	<script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
	<script>
      /* Google map
      ------------------------------------------------*/
      var map = '';
      var center;

      function initialize() {
        var mapOptions = {
          zoom: 16,
          center: new google.maps.LatLng(13.758468,100.567481),
          scrollwheel: false,
          draggable:false
        };
        
        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
          calculateCenter();
        });
        
        google.maps.event.addDomListener(window, 'resize', function() {
          map.setCenter(center);
        });
      }

      function calculateCenter() {
        center = map.getCenter();
      }

      function loadGoogleMap(){
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
      }
      $(document).ready(function(){                
        loadGoogleMap();                
      });
	</script>
	
	@endsection