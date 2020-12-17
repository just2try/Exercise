$(document).ready(function(){

    $(window).scroll(function(){
        if($(this).scrollTop() < 250){
            $('#top-btn').fadeOut();
        } else {
            $('#top-btn').fadeIn();
        }
    });

    // $('.toggle').click(function(){
    //     $('.item').toggle();
    // });

    $('.toggle').on('click',function(){
        if($('.item').hasClass('active')){
            $('.item').removeClass('active');
        } else{
            $('.item').addClass('active');
        };
    });
    
    $('.item').on('click',function(){
        $('.item').removeClass('active');
        
    })


});

