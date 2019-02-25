var $jq = jQuery.noConflict();
	function domainajax(){
		$jq.ajax({
		    type: "post",
		    dataType: "json",
		    url: ajax_object.ajax_url,
		    data: formData,
		    success: function(msg){
		        console.log(msg);
		    }
		});
	}
