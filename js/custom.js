jQuery(document).ready(function() {
	
	runFancyBox();	
		
});


function runFancyBox() {

	 jQuery("a.fancybox-thumb, a.cboxElement, a.preview_link").fancybox({
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
	
	
	
		jQuery('a.fancybox-media').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});
		
		
		jQuery('a.thickbox, a.fancybox, a.lightbox, a.litebox').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
		});
	
}
