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
	
	$(".modal").draggable({
		handle: ".modal-header"
	});
	
	$(".calculate").click(function(event) {
		var x1 =parseInt( $( ".tranps" ).val());
		x1 += parseInt($( ".transp_intern" ).val());
		x1 += parseInt($( ".diaurina" ).val());
		x1 += parseInt($( ".cazare" ).val());
		x1 += parseInt($( ".taxa_participare" ).val());
		x1 += parseInt($( ".cheltuieli" ).val());
		var x2 = parseInt($( ".total" ).val());
		if(x1 != x2)
		{
			$( '#error' ).text( 'Please make sure that if the total is correct!' );
			$( '#error' ).addClass('show');
			event.preventDefault();
		}
	});
	
});