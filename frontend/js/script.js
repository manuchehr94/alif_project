$(function() {
	
	$('.menuToggle').on('click', function(){
		
		$('.menu').slideToggle(300, function(){
			if($(this).css('display') === "none") {
				$(this).removeAttr('style');
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

	$("#polzunok").slider({
		animate: "slow",
		range: true,
		values: [ 100, 1000 ],
		min: 0,
		max: 1100,
		slide : function(event, ui) {
			$("#result-polzunok1").text(ui.values[ 0 ]);
			$("#result-polzunok2").text(ui.values[ 1 ]);
			$("#send-result-polzunok1").val(ui.values[ 0 ]);
			$("#send-result-polzunok2").val(ui.values[ 1 ]);
		}
	});
	$( "#result-polzunok1" ).text($("#polzunok").slider("values", 0));
	$( "#result-polzunok2" ).text($("#polzunok").slider("values", 1));
	$( "#send-result-polzunok1" ).val($("#polzunok").slider("values", 0));
	$( "#send-result-polzunok2" ).val($("#polzunok").slider("values", 1));
});