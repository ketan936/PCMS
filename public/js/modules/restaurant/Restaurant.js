var Restaurant = {

    settings:{
    	addRestaurantButton : ("#add-restaurant-button"),
    	addRestaurantForm : $('#form-add-restaurant'),
    	restaurantBasicDetailsForm : $('#form-update-restaurant-basic-detail'),
    	saveRestaurantBasicDetailButton : ("save-restaurant-basic-detail-button")
    },
    init: function(){
      this.bindUIActions();
    },
	addRestaurant : function(target){

			 $.ajax({
	            cache: false,
	            url: BASE_PATH + '/addRestaurant',
	            method:'POST',
	            data:Restaurant.settings.addRestaurantForm.serialize(),
	            beforeSend: function() { 
	               $("#add-restaurant-panel .panel-body .alert-success").remove();
	               $("#add-restaurant-panel .panel-body .alert-danger").remove();
	               $(target).find(".fa-refresh").removeClass("hidden");
	            },
	            success:function(data){
	                   $(target).find(".fa-refresh").addClass("hidden");

	                    if(data.status === "success")
	                    {
	                       var html = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><p>Restaurant added ! .Now you can add menus for this restaurant.</p>\
	                                  <p> Restaurant URL is : <b>'+data.url+'</b></p>\
	                                  </div>';
	                       $("#add-restaurant-panel .panel-body").prepend(html); 

	                    }
	                    else if(data.status === "failed"){
	                                                 
	                        var html =  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Whoops!</strong> There were some problems .<br><br>';                  
	                        html += '<ul>';
	                        var arr = data.errors;
	                        $.each(arr, function(index, value)
	                        {
	                            if (value.length != 0)
	                            {
	                                html += ('<li>'+ value +'</li>');
	                            }
	                        });
	                        html += '</ul>';
	                        $("#add-restaurant-panel .panel-body").prepend(html); 
	                    } 
	            },
	            error:function(){
	                 $(target).find(".fa-refresh").addClass("hidden");
	                 alert('Something went wrong.Please Try again later...');
	            }
	         });

	},
	saveRestaurantBasicDetail : function(target){
	       $.ajax({
	            cache: false,
	            url: BASE_PATH + '/updateRestaurantBasicDetail',
	            method:'POST',
	            data:Restaurant.settings.restaurantBasicDetailsForm.serialize(),
	            beforeSend: function() { 
	               $("#res-search-result-panel #restaurant-basic-details .alert-success").remove();
	               $("#res-search-result-panel #restaurant-basic-details .alert-danger").remove();
	               $(target).find(".fa-refresh").removeClass("hidden");
	            },
	            success:function(data){
	                   $(target).find(".fa-refresh").addClass("hidden");

	                    if(data.status === "success")
	                    {
	                       var html = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><p>Restaurant added ! .Now you can add menus for this restaurant.</p></div>';
	                       $("#res-search-result-panel #restaurant-basic-details").prepend(html); 

	                    }
	                    else if(data.status === "failed"){
	                                                 
	                        var html =  '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Whoops!</strong> There were some problems with your input.<br><br>';                  
	                        html += '<ul>';
	                        var arr = data.errors;
	                        $.each(arr, function(index, value)
	                        {
	                            if (value.length != 0)
	                            {
	                                html += ('<li>'+ value +'</li>');
	                            }
	                        });
	                        html += '</ul>';
	                        $("#res-search-result-panel #restaurant-basic-details ").prepend(html); 
	                    } 
	            },
	            error:function(){
	                 $(target).find(".fa-refresh").addClass("hidden");
	                 alert('Something went wrong.Please Try again later...');
	            }
	         });
	},
	bindUIActions:function(){
      
      $('body').on('click',Restaurant.settings.addRestaurantButton,function(event){
			      event.preventDefault();
			      Restaurant.addRestaurant($(this));
       });

       $('body').on('click',Restaurant.settings.saveRestaurantBasicDetailButton,function(event){
		          event.preventDefault();
		          Restaurant.saveRestaurantBasicDetail($(this));
      });
	}
};


$(document).ready(function() {

  Restaurant.init();

})();