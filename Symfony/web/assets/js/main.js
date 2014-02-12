$(document).ready(function(){ 
	//alert('height:' + $(window).height() +  ' width:' + $(window).width());
	 $(function() {
		$( ".datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd'
		});
	  });
	  
	  $(".check_image").change(function() {

   		var val = $(this).val();
	
	    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
	        case 'gif': case 'jpg': case 'png': case 'bmp': case 'pdf':
	            break;
	        default:
	            $(this).val('');
	            alert("Only images and pdf's are allowed!");
	            break;
	    }
	});
	$( "#enable_edit" ).click(function() {
	  	$( "#enable_submit" ).addClass('show');
	  	$( "#enable_edit" ).addClass('hide');
	  	$( "#firstname" ).attr("readonly", false);
	  	$( "#lastname" ).attr("readonly", false);
	  	$( "#email" ).attr("readonly", false);
	  	$( "#tel" ).attr("readonly", false);
	  	$( "#university" ).attr("readonly", false);
	});
	
});