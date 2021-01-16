$(document).on("click",".datepicker",function(){
	$(this).datepicker({
    	format:"dd-mm-yyyy",
    	todayHighlight:true,
    });
	$(this).datepicker("show");
});

$(document).ready(function(e){
	$(".inside-modal > div").css("height",($(window).height())+"px");
})


$(".check_form").validate();

$(document).on("click", ".delete-div", function() {
	var btn = $(this);

	bootbox.confirm("Are you sure?", function(result) {
      if(result) {
      	
			var initial_html = btn.html();
			btn.html(initial_html+' <i class="fa fa-spin fa-spinner"></i>');
			var deleteDiv = btn.attr('div-id');
			
			var formAction = base_url+'/'+btn.attr('action');

			$.ajax({
			    type: "DELETE",
			    data: {
			    	_token : CSRF_TOKEN
			    },
			    url : formAction,
			    success : function(data){
			    	data = JSON.parse(data);
			    	if(!data.success) bootbox.alert(data.message);
			    	else {
			    		
			    		$("#"+deleteDiv).hide('500', function(){
			    			$("#"+deleteDiv).remove();
				    	});
				    	
			    	}
			    	btn.html(initial_html);

			    }
			},"json");
      	}
    });
});