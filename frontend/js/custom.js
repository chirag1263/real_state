
$(document).on("click",".pop_details",function(){
	$("#detailsModal").modal("show");
	var title = $(this).attr("data-title");
	var action = $(this).attr("action");

	$("#detailsModal .modal-title").html(title);
	$("#detailsModal .modal-body").html("Loading....");

	var formAction = base_url+"/"+action;
	console.log(action);

	$.ajax({
	    type: "GET",
	    url : formAction,
	    success : function(data){
	    	
	    	if(!data.success) alert(data.message);
	    	else {
	    		$("#detailsModal .modal-body").html(data.message);
	    	}
	    }
	},"json");
});

$(document).on("click",".pop-login",function(){
	$("#loginModal").modal("show");
	var action = $(this).attr("action");
	$("input[name=call_url]").val(action);

});


$(document).on('click','form.ajax_update button[type=submit]', function(e){
    e.preventDefault();
	var btn = $(this);
	var initial_html = btn.html();
	btn.html(initial_html+' <i class="fa fa-spin fa-spinner"></i>');
	var form = jQuery(this).parents("form:first");
	var dataString = form.serialize();
	var formAction = form.attr('action');

	var reload = btn.attr('reload');
	console.log(dataString);
	$.ajax({
	    type: "POST",
	    url : formAction,
	    data : dataString,
	    success : function(data){
	    	console.log(data);
	    	data = JSON.parse(data);
	    	if(data.success){
	    		
	    		if(data.call_url){
	    			window.location = data.call_url;
	    		}

	    	} else {
	    		alert(data.message);
	    	}
	    	btn.html(initial_html);
	    }
	},"json");
    
});
