
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