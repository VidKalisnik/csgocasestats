// image slider

$(document).ready(function() {
    $(".next").on('click', function(){
        var currnetImg = $('.active');
        var nextImg = currnetImg.next(); 

        if(nextImg.length){
            currnetImg.removeClass('active').css('z-index','-10')
            nextImg.addClass('active').css('z-index','10')
        }      
    });

    $(".prev").on('click', function(){
        var currnetImg = $('.active');
        var prevImg = currnetImg.prev();
 
        if(prevImg.length){
            currnetImg.removeClass('active').css('z-index','-10')
            prevImg.addClass('active').css('z-index','10')
        }       
     });
});

