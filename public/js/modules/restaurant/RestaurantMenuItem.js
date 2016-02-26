var RestaurantMenuItem = {

    settings:{
    	addNewRestaurantMenuButton : ('#add-menu-item-popup-button')
    },
    init: function(){
      this.bindUIActions();
    },
	addRestaurantMenuItem : function(categoryId,itemName,itemPrice){

        $.ajax({
            cache: false,
            url: BASE_PATH + '/addMenuItem',
            method:'POST',
            dataType:'json',
            data:{'item_name':itemName,'category_id':categoryId,"item_price" : itemPrice,"_token":window.X_ACCESS_TOKEN},
            beforeSend: function() { 
                    $('#add-item-popup .loading-text').removeClass('hidden');
            },
            success:function(data){
              $('#add-item-popup .loading-text').addClass('hidden');
              if(data && data.status === true){
                    window.location.reload();
                 }
                else{
                  alert('Something went wrong while adding category.');
                }
            },
            error:function(){
              $('#add-item-popup .loading-text').addClass('hidden');
            }
         });

	},
	removeRestaurantMenuItem : function(id){

        $.ajax({
            cache: false,
            url: BASE_PATH + '/removeMenuItem',
            method:'GET',
            dataType:'json',
            data:{"item_id":id},
            beforeSend: function() { 
              $('.pcms-loader').removeClass('hidden');
            },
            success:function(data){
              $('.pcms-loader').addClass('hidden');
              if(data && data.status === true){
                  window.location.reload();
              }
              else{
                  alert("Error while deleting menu item");
              }

            },
            error:function(){
                 $('.pcms-loader').addClass('hidden');
                 alert('Something went wrong.Please Try again later...');
            }
         });
	},

	bindUIActions:function(){
      
      $('body').on('click',RestaurantMenuCategory.settings.addNewRestaurantMenuButton,function(event){
          event.preventDefault();
          var categoryId  = $("#restaurant-category").val();
          var itemName    = $("#new-item-name").val();
          var itemPrice   = $("#new-item-price").val();
          if(categoryId == "-1"){
               alert("Select any menu category");
              return;
          }
          RestaurantMenuItem.addRestaurantMenuItem(categoryId,itemName,itemPrice);
       });


	}
};


$(document).ready(function() {

  RestaurantMenuItem.init();

})();