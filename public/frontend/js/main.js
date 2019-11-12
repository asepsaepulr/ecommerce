$(document).ready(function(){
	///////////Size of Product
	$("#idSize").change(function () {
		var SizeAttr=$(this).val();
		if(SizeAttr!=""){
            $.ajax({
                type:'get',
                url:'/get-product-attr',
                data:{size:SizeAttr},
                success:function(resp){
                	var arr=resp.split("#");
                    $("#dynamic_price").html('Rp. :'+arr[0]);
                    $("#dynamicPriceInput").val(arr[0]);
                    if(arr[1]==0){
						$("#buttonAddToCart").hide();
						$("#availableStock").text("Out Of Stock");
                        $("#inputStock").val(0);
					}else{
                        $("#buttonAddToCart").show();
                        $("#availableStock").text("In Stock");
                        $("#inputStock").val(arr[1]);
					}
                },error:function () {
                    alert("Error Select Size");
                }
            });
		}
    });
	///////////// Thumnail Image
	$(".changeImage").click(function () {
		newImage=$(this).attr('src');
		$("#dynamicImage").attr('src',newImage);
    });
	///// Copy Billing address to Shipping Address
	$("#checkme").click(function () {
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_country").val($("#billing_country").val());
            $("#shipping_pincode").val($("#billing_pincode").val());
            $("#shipping_mobile").val($("#billing_mobile").val());
		}else{
            $("#shipping_name").val("");
            $("#shipping_address").val("");
            $("#shipping_city").val("");
            $("#shipping_state").val("");
            $("#shipping_country").val("Albania");
            $("#shipping_pincode").val("");
            $("#shipping_mobile").val("");
		}
    });
});


(function ($) {
 "use strict";

 

 /*----------------------------
 TOP Menu Stick
------------------------------ */
$(window).on('scroll',function() {
if ($(this).scrollTop() > 30){  
    $('#sticky-header').addClass("sticky");
  }
  else{
    $('#sticky-header').removeClass("sticky");
  }
}); 
	
 
 /*----------------------------
 TOP Menu Stick-2
------------------------------ */
$(window).on('scroll',function() {
if ($(this).scrollTop() > 40){  
    $('#sticky-header-2').addClass("sticky");
  }
  else{
    $('#sticky-header-2').removeClass("sticky");
  }
}); 
	
/*----------------------------
 tooltip
------------------------------ */

 
/*----------------------------
 jQuery MeanMenu
------------------------------ */
	
	
/*----------------------------
 wow js active
------------------------------ */
 new WOW().init();
 
 /*----------------------------
 nivoSlider
------------------------------ */	
	$("#slider").nivoSlider({ 
    effect: 'fold',                 // Specify sets like: 'fold,fade,sliceDown' 
    slices: 15,                       // For slice animations 
    boxCols: 8,                       // For box animations 
    boxRows: 4,                       // For box animations 
    animSpeed: 500,                   // Slide transition speed 
    pauseTime: 3000,                  // How long each slide will show 
    startSlide: 0,                    // Set starting Slide (0 index) 
    directionNav: true,               // Next & Prev navigation 
    controlNav: true,                 // 1,2,3... navigation 
    controlNavThumbs: false,          // Use thumbnails for Control Nav 
    pauseOnHover: true,               // Stop animation while hovering 
    manualAdvance: true,             // Force manual transitions 
    prevText: '<i class="fa fa-angle-left"></i>',   // Prev directionNav text 
    nextText: '<i class="fa fa-angle-right"></i>',  // Next directionNav text 
    randomStart: true,               // Start on a random slide 
    beforeChange: function(){},       // Triggers before a slide transition 
    afterChange: function(){},        // Triggers after a slide transition 
    slideshowEnd: function(){},       // Triggers after all slides have been shown 
    lastSlide: function(){},          // Triggers when last slide is shown 
    afterLoad: function(){}           // Triggers when slider has loaded 
});

 
/*----------------------------
 product-active
------------------------------ */  
 $('.product-active').owlCarousel({
		smartSpeed:1000,
		margin:0,
		autoplay:true,
		autoplayHoverPause:true,
		nav:true,
		dots:false,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			1000:{
				items:4
			}
		}
	})
	
	
 
/*----------------------------
testimonial-active
------------------------------ */  
 $('.testimonial-active').owlCarousel({
		smartSpeed:1000,
		margin:0,
		autoplay:true,
		autoplayHoverPause:true,
		nav:true,
		dots:false,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
		
 
/*----------------------------
 blog-active
------------------------------ */  
 $('.blog-active').owlCarousel({
		smartSpeed:1000,
		margin:0,
		autoplay:true,
		autoplayHoverPause:true,
		nav:true,
		dots:false,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:2
			},
			1000:{
				items:3
			}
		}
	})
	 
	 
/*----------------------------
 best-sell-active
------------------------------ */  
 $('.best-sell-active').owlCarousel({
		smartSpeed:1000,
		margin:0,
		autoplay:true,
		autoplayHoverPause:true,
		nav:false,
		dots:false,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
	
	
 /*-------------------------
  showlogin toggle function
--------------------------*/
	 $( '#show-search' ).on('click', function() {
        $( '#hide-search' ).slideToggle(900);
     }); 
  	$( '#close-search' ).on('click', function() {
        $( '#hide-search' ).slideToggle(900);
     }); 
	 
 /*-------------------------
  showlogin toggle function
--------------------------*/
	 $( '#show-cart' ).on('click', function() {
        $( '#hide-cart' ).slideToggle(900);
        return false;
     }); 
	 
 /*-------------------------
  Create an account toggle function
--------------------------*/
	$( '#cbox' ).on('click', function() {
        $( '#cbox_info' ).slideToggle(900);
     });
	 
 	 
/*-------------------------
  Create an account toggle function
--------------------------*/
	 $( '#ship-box' ).on('click', function() {
        $( '#ship-box-info' ).slideToggle(1000);
     });	
	

/*-------------------------
  showlogin toggle function
--------------------------*/
	 $( '#showlogin' ).on('click', function() {
        $( '#checkout-login' ).slideToggle(900);
     }); 
	
/*-------------------------
  showcoupon toggle function
--------------------------*/
	 $( '#showcoupon' ).on('click', function() {
        $( '#checkout_coupon' ).slideToggle(900);
     });
	  
 
  /* parallax */
$('.bg').parallax("50%", 0.1);


/*---------------------
	counter
--------------------- */	  

$('.counter').counterUp({
    delay: 10,
    time: 1000
});

	
/*--------------------------
	 Zoom
	---------------------------- */	
	$("#zoompro").elevateZoom({
		gallery : "gallery",
		galleryActiveClass: "active",
		zoomWindowWidth:300,
		zoomWindowHeight:100,
		scrollZoom : true,
		zoomType: "lens",
		 lensShape : "round",
	});  

  	
/* --------------------------------------------------------
   on click quantity
* -------------------------------------------------------*/ 
	$(".plus").on('click', function() {

        var qty = $(".qty");

        if (qty.val() < $(this).data("max")) {

            qty.val(parseInt(qty.val()) + 1, 10);
        }
    });

    $(".minus").on('click', function() {

        var qty = $(".qty");

        if (qty.val() > $(this).data("min")) {

            qty.val(parseInt(qty.val()) - 1, 10);
        }
    }); 
		
		
/*----------------------------
 price-slider active
------------------------------ */  
	   
/*--------------------------
 scrollUp
---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    }); 	   
 
})(jQuery); 