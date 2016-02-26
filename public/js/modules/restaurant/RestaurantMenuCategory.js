var RestaurantMenuCategory = {

    settings:{
    	removeButton :$('.remove-button'),
    	addNewRestaurantCategoryButton : ('#add-new-category-popup-button'),
    	saveButton : $('save-button')
    },
    init: function(){
      this.bindUIActions();
    },
	addRestaurantMenuCategory : function(restaurantId,categoryName){

          $.ajax({
            cache: false,
            url: BASE_PATH + '/addMenuCategory',
            method:'POST',
            dataType:'json',
            data:{'restaurant_id':restaurantId,'category_name':categoryName,"_token":window.X_ACCESS_TOKEN},
            beforeSend: function() { 
                    $('#add-categ-popup .loading-text').removeClass('hidden');
            },
            success:function(data){
              $('#add-categ-popup .loading-text').addClass('hidden');
              if(data && data.status === true){
                    window.location.reload();
                 }
                else{
                  alert('Something went wrong while adding category.');
                }
            },
            error:function(){
              $('#add-categ-popup .loading-text').addClass('hidden');
            }
         });

	},
	editRestaurantMenuCategory : function(categoryId,categoryName){

         $.ajax({
            cache: false,
            url: BASE_PATH + '/editMenuCategory',
            method:'POST',
            dataType:'json',
            data:{'category_id':categoryId,'category_name':categoryName,"_token":window.X_ACCESS_TOKEN},
            beforeSend: function() { 
              $('.pcms-loader').removeClass('hidden');
            },
            success:function(data){
              $('.pcms-loader').addClass('hidden');
              $('#add-categ-popup .loading-text').addClass('hidden');
              if(data && data.status === true){
                    window.location.reload();
                 }
                else{
                  alert('Something went wrong while editing category.');
                }
            },
            error:function(){
              $('.pcms-loader').addClass('hidden');
              alert('Something went wrong.');
            }
         });
	},
   removeRestaurantMenuCategory : function(id){
          $.ajax({
            cache: false,
            url: BASE_PATH + '/removeMenuCategory',
            method:'GET',
            dataType:'json',
            data:{"category_id":id},
            beforeSend: function() { 
              $('.pcms-loader').removeClass('hidden');
            },
            success:function(data){
              $('.pcms-loader').addClass('hidden');
              if(data && data.status === true){
                  window.location.reload();
              }
              else{
                  alert("Error while deleting category");
              }

            },
            error:function(){
                 $('.pcms-loader').addClass('hidden');
                 alert('Something went wrong.Please Try again later...');
            }
         });
	},
	bindUIActions:function(){
      
	      $('body').on('click',RestaurantMenuCategory.settings.removeButton,function(event){
				      var type = $(this).data('attribute-type');
				      var id   = $(this).data('attribute-id');

				      if(type === "item"){
				          RestaurantMenuItem.removeRestaurantMenuItem(id);
				      } 
				      else if(type === "category"){
				          RestaurantMenuCategory.removeRestaurantMenuCategory(id);
				      }
	       });

	       $('body').on('click',RestaurantMenuCategory.settings.saveButton,function(event){
			          $(this).addClass('hidden');
			          $(this).siblings().each(function () { 
			          if( $(this).hasClass('edit-button')){
			                 $(this).removeClass('hidden');
			             }
			          if( $(this).hasClass('remove-button')){
			                 $(this).removeClass('hidden');
			             }
			          });
			          var type = $(this).data('attribute-type');
			          var id   = $(this).data('attribute-id');
			          var itemName = "";
			          $(this).parent().siblings().children().each(function () { 
			            if( $(this).hasClass('category-name')){
			                itemName = $(this).val();
			            }
			          });
			          if(type === "category"){
			              RestaurantMenuCategory.editRestaurantMenuCategory(id,itemName);
			          }
	      });


	     $('body').on('click',RestaurantMenuCategory.settings.addNewRestaurantCategoryButton,function(event){
				     	  event.preventDefault();
				          var resId = $("#resInternalId").val();
				          var categoryName = $("#new-category-name").val();
				          RestaurantMenuCategory.addRestaurantMenuCategory(resId,categoryName);
	     };

	}
};


$(document).ready(function() {

  RestaurantMenuCategory.init();

})();