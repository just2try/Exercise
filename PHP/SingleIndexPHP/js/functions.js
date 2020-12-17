function show_login(){                                          
    $('#signup').hide();
    $('#login').show();
};

function show_signup(){                                       
    $('#login').hide(); 
    $('#signup').show();
};

/* erst wenn das DOM vollständig geladen ist, JS ausführen */
$(document).ready(function(){

//*#### Mobiles Menü Toggle / öffnen u. schließen */
    
    $('.toggle').on('click',function(){
        if($('.item').hasClass('active')){
            $('.item').removeClass('active');
        }
        else{
            $('.item').addClass('active');
        };
    });

    // Alternativ und kürzer mit jQuery "toggle" Funktion
    // $('.toggle').click(function(){
    //     $('.flip').slideToggle('slow')
    // });



//##### Login und Sign-up Button im Header anzeigen #########

$('#jsLoginButton').show();
$('#jsSignupButton').show();


//##### Login und Sign-up Fenster öffnen/schließen #########
    
    // Schließen des Signup-Moduls mit jQuery --> über X
    $('span.close').click(function(){                               
        $('#signup').hide();
    });

    
    // Schließen des Login Moduls mit jQuery                        
    // "arrow function"
    $('span.close').click(() => {
            $('#login').hide();
        });


    // Wenn man außerhalb des Fensters klickt, schließe Login-Fenster
    window.onclick = function(event) {                          
        if (event.target == login) {
            login.style.display = "none";
        } else if (event.target == signup) {                    
            signup.style.display = "none";
        }
    };


});




