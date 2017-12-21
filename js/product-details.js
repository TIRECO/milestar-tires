/*<-- Highlighted Features Grow -->*/
(function($) {
	var viewportWidth = $(window).width();
	
	if(viewportWidth < 750) {
		
	}

$('.highlighted-features-grow').click(function(e) {
    var highlightedFeaturesIcnSrc = $(this).find('img').attr('src');
    $('#highlightedFeaturesModal img').attr('src', highlightedFeaturesIcnSrc); 
});

/*<-- Review Bars -->*/
$(document).ready(function(){
	$(".ewd-urp-review-div").find(".reviews-right-column").each (function() {
		var comfortScorePercent = '';
		var treadLifeScorePercent = '';
		var tractionScorePercent = '';
		/*<-- Comfort Bars -->*/
		$(this).find(".comfort").each (function() {
			$(this).find(".ewd-urp-category-score-number").each (function () {
				var comfortScore = $(this).text();
				comfortScore = (comfortScore / 5) * 100;
				comfortScorePercent = comfortScore + "%";
			});
		});
		$(this).find(".comfortProgress").each (function() {
			$(this).css("width", comfortScorePercent);
		});
		// $(this).find(".ewd-urp-category-score-label").each (function() {
		// 	$(this).text('Comfort');
		// });
		/*<-- Tread Life Bars -->*/
		$(this).find(".tread-life").each (function() {
			$(this).find(".ewd-urp-category-score-number").each (function () {
				var treadLifeScore = $(this).text();
				treadLifeScore = (treadLifeScore / 5) * 100;
				treadLifeScorePercent = treadLifeScore + "%";
			});
		});
		$(this).find(".treadLifeProgress").each (function() {
			$(this).css("width", treadLifeScorePercent);
		});
		/*<-- Traction Bars -->*/
		$(this).find(".traction").each (function() {
			$(this).find(".ewd-urp-category-score-number").each (function () {
				var tractionScore = $(this).text();
				tractionScore = (tractionScore / 5) * 100;
				tractionScorePercent = tractionScore + "%";
			});
		});
		$(this).find(".tractionProgress").each (function() {
			$(this).css("width", tractionScorePercent);
		});
	});
});

})(jQuery);