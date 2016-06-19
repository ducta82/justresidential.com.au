$(document).ready(function(){
	pagingEvent();
	function pagingEvent(){
		$('ul.paging li a').click(function(e){
			e.preventDefault();
			pagingLoad($(this));
			return false;
		});
	}
	function pagingLoad(btn){
		var page = btn.attr('data');
      	$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results && results.length>1 ? results[1] : '';
		}
		var search_url = $.urlParam('s');
      	console.log(search_url);
      	$.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'ajax_pagination_data',
                cat: ajax_object.cat,
                s:search_url,
                page: page
            },
            beforeSend: function() {
                $( '.page' ).scrollTop(0);
            },
            success: function( ketqua ) {
                console.log(ketqua);
                $( '#list-post' ).html( ketqua.html );
                window.history.pushState(null, '', ketqua.url);
                $('#box-paging').html(ketqua.paging);
                $( '.page' ).scrollTop(0);
                pagingEvent();
       		}
		});

	}
});