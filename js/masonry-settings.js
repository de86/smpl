/*
** Masonry Settings
*/

// Masonry settings to organize footer widgets
jQuery(document).ready(function($){
    var $container = $('#footer-widgets');
    var $masonryOn;
    var $columnWidth = 280;
    
    if ($(document).width() > 700) {;
        $masonryOn = true;
        runMasonry();
    };

    $(window).resize( function() {
        if ($(document).width() < 700) {
            if ($masonryOn){
                $container.masonry('destroy');
                $masonryOn = false;
            }

        } else {
            $masonryOn = true;
            runMasonry();
        }
    });
    
    function runMasonry() {
        // initialize
        $container.masonry({
            
            itemSelector: '.widget',
            isFitWidth: true,
            isAnimated: true
        });
    };
    
});