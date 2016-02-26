var Popup = {

    settings:{
    	addNewCategoryButton : ('#add-new-category'),
      addNewItemButton: ('#add-new-item'),
      closePopupButton: ('.close-popup')
    },
    init: function(){
      this.bindUIActions();
    },
	showPopup : function(){
        $('#'+elem).removeClass("hidden");
        $('.overlay-container').removeClass("hidden");

	},
	hidePopup : function(elem){
       $('#'+elem).addClass("hidden");
       $(".overlay-container").addClass("hidden");
	},

	bindUIActions:function(){
     $('body').on('click',Popup.settings.addNewCategoryButton,function(event){
           Popup.showPopup("add-categ-popup");
        });

       $('body').on('click',Popup.settings.addNewItemButton,function(event){
           Popup.showPopup("add-item-popup");
        });

      $('body').on('click',Popup.settings.closePopupButton,function(event){
            event.preventDefault();
            var elem = $(this).data('popup-id');
            console.log(elem);
            $('#'+elem+'-form')[0].reset();
            Popup.hidePopup(elem); 
        });
	}
};


$(document).ready(function() {

  Popup.init();

})();