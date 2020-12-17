window.onload = function() {                                                        /* wenn Seite geladen ist Ausführung des Script */

    /* Zufallsbild für Werbebanner erstellen */

    var x = Math.floor((Math.random()*7)+1);                                    // Zufallszahl zwischen 1 und 7 generieren
    
    var img = document.createElement('img');
        img.className = 'banner-margin';
        img.id = 'banner';
        img.alt = 'Werbebanner';
        img.src = '../bilder/produktionen/banner'+ x +'.jpg';
    
    document.querySelector('section > article').insertBefore(img, document.querySelector('noscript'));

    // Wenn img-Element bereits in HTML vorhanden ist, sind auch folgende zwei Varianten möglich.

    /* 1. Variante - Mittels Zufallszahl und  */
    // var banner = document.querySelector('#banner');                             // Werbebanner mit id = "Banner" auswählen
    // banner.setAttribute('src' , '../bilder/produktionen/banner'+ x +'.jpg');    // "src"-Attribut des img-Tags "Werbebanner" mit Dateipfad und Zufallszahl setzten

    /* 2. Variante - Mittels Zufallszahl und Switch-Case Methode */
    /* switch(x) {
        case 1:                                                                   
            banner.src = '../bilder/produktionen/banner1.jpg'                   // für jede Zufallszahl (1-7) wird ein entsprechender Fall/Case definiert
            break;                                                              // wenn dieser Fall eintritt "break" sonst, würden alle anderen Fälle/Cases ebenfalls ausgeführt
        case 2:
            banner.src = '../bilder/produktionen/banner2.jpg'
            break;
        case 3:
            banner.src = '../bilder/produktionen/banner3.jpg'
            break;
        case 4:
            banner.src = '../bilder/produktionen/banner4.jpg'
            break;
        case 5:
            banner.src = '../bilder/produktionen/banner5.jpg'
            break;
        case 6:
            banner.src = '../bilder/produktionen/banner6.jpg'
            break;
        case 7:
            banner.src = '../bilder/produktionen/banner7.jpg'
            break;
        default:                                                                // Standardfall definiert
            banner.src = '../bilder/produktionen/banner3.jpg'
        }; */

        // console.log(x);
};