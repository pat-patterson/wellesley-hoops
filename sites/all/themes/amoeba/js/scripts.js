(function ($) {

    $(document).ready(function(){				 
    }); 

  Drupal.behaviors.reefSuperfish = {

    attach: function(context, settings) {
      $('#main-menu ul.menu', context).superfish({
		    delay: 300,											    
        animation: {opacity:'show' },
        speed: 100,
        autoArrows: false,
        dropShadows: false /* Needed for IE */
      });
    }
  }
  

})(jQuery);  