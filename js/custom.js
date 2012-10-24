$(document).ready(function() {
	
	runFancyBox();	
		
});


function runFancyBox() {

	 $("a.fancybox-thumb, a.cboxElement, a.preview_link").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});	
	
	
	
		$('a.fancybox-media').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});
		
		
		$('a.thickbox').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
		});
	
}
