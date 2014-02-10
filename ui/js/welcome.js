jQuery( function($) {
	
	$(".hapus").live('click', function(e) {
			var ids = $( this ).attr('ids');
			var judul = $( this ).attr('judul');
			jConfirm(' This will delete selected Jurnal with title "<b>' + judul + '</b>". Continue?', 'Delete Selected Jurnal', function(r) {
				if(r) {
					$('<form action="/welcome/delete" method="post"><input name="id" type="hidden" value="'+ids+'"/></form>').appendTo('body').submit();
		            return false;
				}
			});
	});
	
	
});