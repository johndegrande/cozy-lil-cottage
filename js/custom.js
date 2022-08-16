$(document).ready(function($) {

	//Facebook Gallery
	var relatedPortfolio = $("#related-portfolio");

	relatedPortfolio.owlCarousel({
		margin: 0,
		nav: true,
		navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
		autoplay: 2500,
		autoplayHoverPause: true,
		dots: false,
		responsive:{
			0:{ items:1 },
			600:{ items:2 },
			1000:{ items:3 },
			1200:{ items:4 },
			1400:{ items:5 }
		}
	});
	
	//Contact Form
	$("#template-contactform").validate({
		submitHandler: function(form) {
			$('.form-process').fadeIn();
			$(form).ajaxSubmit({
				target: '#contact-form-result',
				success: function() {
					$('.form-process').fadeOut();
					$('#template-contactform').find('.sm-form-control').val('');
					$('#contact-form-result').attr('data-notify-msg', $('#contact-form-result').html()).html('');
					SEMICOLON.widget.notifications($('#contact-form-result'));
				}
			});
		}
	});
	
	//Google Map
	jQuery('#google-map').gMap({

		address: '41.152238, -96.042679',
		maptype: 'ROADMAP',
		zoom: 15,
		markers: [
			{
				address: "41.152238, -96.042679",
				html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;"><span>Cozy Lil\' Cottage</span></h4><p class="nobottommargin">517 S Washington St<br />Papillion, NE 68046<br /><a href="tel:4028843888">(402) 884-3888</a></p></div>'
			}
		],
		doubleclickzoom: false,
		controls: {
			panControl: true,
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false
		}
	
	});

});