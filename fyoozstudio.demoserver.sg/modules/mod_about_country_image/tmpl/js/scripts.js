jQuery(document).ready(function($) {
    $('img').one('error', function() {
        $(this).parent().addClass("noimage");
        $(this).remove();
    });
    if( $(window).width() + 15 >1235 ) swapImageBeforeText();
    $(window).resize(function(){
    	if( $(window).width() +15 <= 1235 ) swapTextBeforeImage();
    	else swapImageBeforeText();
    });
    $(".imagebox .text-position1, .imagebox .text-position3").each(function(){

        if($(this).find(".link-title").outerWidth() < $(this).find(".link a").outerWidth()) {
            $(this).find(".link-title").width($(this).find(".link a").outerWidth());
        }
    });
    function swapTextBeforeImage(){
        $("div.imagebox div.texts.text-position3").each(function(){
            $(this).parent().prepend($(this));
        });
    }

    function swapImageBeforeText(){
        $("div.imagebox div.image.text-position3").each(function(){
            $(this).parent().prepend($(this));
        });
    }
});

