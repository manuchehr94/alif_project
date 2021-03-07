$(function() {
	
	$('.menuToggle').on('click', function(){
		
		$('.menu').slideToggle(300, function(){
			if($(this).css('display') === "none") {
				$(this).removeAttr('style');
				//$(this).addAttr('z-index: 999');
			}
		});
		
	});

	$('.increaseQunatity').click(function() {
		$('.quantity').html(function(i, val) { return val*1+1 });
		$(".productQuantity").attr("value", $(".quantity").text());
	});

	$('.decreaseQunatity').click(function() {
		$('.quantity').html(function(i, val) {
			if(val <= 1) {
				return 1;
			}
			return val*1-1;
		});
		$(".productQuantity").attr("value", $(".quantity").text());
	});

	$(".searchIcon").click(function(){
		$(".productSearch, .productSearch .productSearchInput").toggleClass("active");
		$(".productSearchInput").focus();
	});

});