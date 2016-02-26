'use strict';

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
  throw new Error("PCMS requires jQuery");
}


$.PCMS = {};

/* --------------------
 * - PCMS Options -
 * --------------------
 * Modify these options to suit your implementation
 */



$.PCMS.options = {
  
  colors: {
    lightBlue: "#3c8dbc",
    red: "#f56954",
    green: "#00a65a",
    aqua: "#00c0ef",
    yellow: "#f39c12",
    blue: "#0073b7",
    navy: "#001F3F",
    teal: "#39CCCC",
    olive: "#3D9970",
    lime: "#01FF70",
    orange: "#FF851B",
    fuchsia: "#F012BE",
    purple: "#8E24AA",
    maroon: "#D81B60",
    black: "#222222",
    gray: "#d2d6de"
  },
  //The standard screen sizes that bootstrap uses.

  screenSizes: {
    xs: 480,
    sm: 768,
    md: 992,
    lg: 1200
  }
};


$(function () {
  //Easy access to options
  var o = $.PCMS.options;

  
  $('.btn-group[data-toggle="btn-toggle"]').each(function () {
    var group = $(this);
    $(this).find(".btn").click(function (e) {
      group.find(".btn.active").removeClass("active");
      $(this).addClass("active");
      e.preventDefault();
    });

  });
});


(function ($) {
    $('.timepicker').timepicker({'showMeridian':false});


      $('body').on('click','.edit-button',function(){
          $(this).parent().siblings().children().each(function () { $(this).removeClass("no-border"); });
          $(this).parent().siblings().children().each(function () { $(this).prop( "disabled", false ); });
          $(this).addClass('hidden');
          $(this).siblings().each(function () { 
             if( $(this).hasClass('remove-button')){
                 $(this).addClass('hidden');
             }
            if( $(this).hasClass('save-button')){
                 $(this).removeClass('hidden');
             }
          });
      });


        // Javascript to enable link to tab
        var url = document.location.toString();
        if (url.match('#')) {
            $('a[href=#'+url.split('#')[1]+']').tab('show');
        } 

        // Change hash for page-reload
        $('body').on('shown.bs.tab','a', function (e) {
            window.location.hash = e.target.hash;
        });


}(jQuery));