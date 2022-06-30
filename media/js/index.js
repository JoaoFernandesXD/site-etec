// BY: Joao Fernandes
// jhfernandes.com
$(document).ready(function(){
   		$(".carousel-item").each(function() {
      		var src = $(this).find("img").attr("src");
      		$(this).css("background-image","url("+src+")").find("img").remove();
   		});
  
    		$('.smoothscroll').on('click',function (e) {
	    		e.preventDefault();
					var target = this.hash,
						$target = $(target);
							$('html, body').stop().animate({
								scrollTop: $target.offset().top
			}, 800, 'swing', function () {
	        	window.location.hash = target;
	    });
	});
  
});