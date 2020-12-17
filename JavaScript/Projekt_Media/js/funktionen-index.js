
window.onload = function () {        // Function ausführen, wenn Seite (HTML+CSS = DOM-Baum) geladen ist

    /*###################### Erstellung der Bilder inkl. Attribute ##################################*/
    var aside = document.querySelector('.content-right');

    var img1 = document.createElement('img');                      // 'img'-Tag/Element erstellen
                                                                    // Attribute setzen
        img1.classList.add('wahlbilder');                            // class = wahlbilder setzten 
        /*img1.setAttribute('class' , 'wahlbilder');*/               // class = wahlbilder setzten
        img1.setAttribute('id' , 'bild1');                           // id = bild1
        img1.setAttribute('src' , './bilder/wahlbilder/eins.jpg');   // src = Bildquelle
        img1.setAttribute('alt' , 'Bild eins');                      // alt = Bild eins
        img1.style.marginRight = '5px';                              // CSS style 'margin' eingefügt      

    var img2 = document.createElement('img');                     /* Wiederholung für die anderen bilder*/
        img2.classList = 'wahlbilder';
        img2.id = 'bild2';
        img2.src = './bilder/wahlbilder/zwei.jpg';
        img2.alt = 'Bild zwei';              
    
    var img3 = document.createElement('img');
        img3.className = 'wahlbilder';
        img3.id = 'bild3';
        img3.src = './bilder/wahlbilder/drei.jpg';
        img3.alt = 'Bild drei';
        img3.style.marginRight = '5px';

    var img4 = document.createElement('img');
        img4.className = 'wahlbilder';
        img4.id = 'bild4';
        img4.src = './bilder/wahlbilder/vier.jpg';
        img4.alt = 'Bild vier';

        aside.appendChild(img1);      // Einfügen des Bildes bei "content-right"
        aside.appendChild(img2);
        aside.appendChild(img3);
        aside.appendChild(img4);

/*###################### Erstellung der Textabschnitte ##################################*/
   
    /* Funktion zum Erstellen der Info Boxen */
    function InfoBoxErstellen (heading, text) {

        var headline = document.createElement('h2');    // <H2> erstellen
            headline.innerHTML = heading;

        var para = document.createElement('p');         // <p> erstellen
            para.innerHTML = text;
            para.style.textAlign = 'justify';          // CSS-Style anpassen
            para.style.width = '200px';        
            para.style.margin = '0 auto';

        var link = document.createElement('a');         // <a> erstellen
            link.id = 'close';
            link.innerHTML = 'Info schliessen';         // Text innerhalb des a-Tags definieren
            link.style.cursor = 'pointer';              // CSS-Style anpassen Mauscursor zu Pionter
            link.onclick = function () {
                infobox.remove();
            };

        /* alle erstellten Elemente in ein Article-Element einfügen */
        var infobox = document.createElement('article');
            infobox.id = 'infobox';
            infobox.appendChild(headline);
            infobox.appendChild(para);
            infobox.appendChild(link);

        aside.appendChild(infobox); 
    }

/*###################### Definierung der H2 und p Texte in Variablen  ##################################*/

    var heading1 = 'HTML';
    var heading2 = 'CSS';
    var heading3 = 'JavaScript';
    var heading4 = 'HTML/CSS/JavaScript';

    var text = 'dieser text hat eigentlich gar keinen wirklichen inhalt. aber er hat auch keine relevanz, und deswegen ist das egal.' +
                'er dient lediglich als platzhalter. um mal zu zeigen, wie diese stelle der seite aussieht, wenn ein paar zeilen vorhanden sind.' +
                'ob sich der text dabei gut fühlt, weiß ich nicht.';       

/*###################### Mouseover & -out & Click Effekt erzeugen  ##################################*/

    var img_activ = document.getElementById('bild1');         // Bild per ID auswählen
        img_activ.onmousemove = function () {img1.src = './bilder/wahlbilder/eins_aktiv.jpg';} // mouseover Effekt erzeugen --> src wird geändert
        img_activ.onmouseout = function () {img1.src = './bilder/wahlbilder/eins.jpg';}         // mouseout Effekt erzeugen --> src wird geändert
        //img_activ.onclick = function () {document.querySelector('#info1').style.visibility = 'visible';}
        img_activ.onclick = function () {                   // onclick Funktion für Bild 1 erstellen
            if(document.querySelector('#infobox') == null){     // if Abfrage: wenn Infobox nicht vorhanden => erstellen
                InfoBoxErstellen(heading1, text);
            } else {                                            // wenn Infobox bereits vorhanden => löschen (remove()) und neu erstellen
                document.querySelector('#infobox').remove();
                InfoBoxErstellen(heading1, text);
            };
        }

        /* Wiederholung der vorherigen Schritte für alle weiteren Bilder */

    var img2_activ = document.querySelector('#bild2');          // Bild per Selektor auswählen
        img2_activ.onmousemove = function () {img2.src = './bilder/wahlbilder/zwei_aktiv.jpg';}
        img2_activ.onmouseout = function () {img2.src = './bilder/wahlbilder/zwei.jpg';}
        img2_activ.onclick = function () {
            if(document.querySelector('#infobox') == null){
                InfoBoxErstellen(heading2, text);
            } else {
                document.querySelector('#infobox').remove();
                InfoBoxErstellen(heading2, text);
            };
        }

    var img3_activ = document.querySelector('#bild3');
        img3_activ.onmousemove = function () {img3.src = './bilder/wahlbilder/drei_aktiv.jpg';}
        img3_activ.onmouseout = function () {img3.src = './bilder/wahlbilder/drei.jpg';}
        img3_activ.onclick = function () {
            if(document.querySelector('#infobox') == null){
                InfoBoxErstellen(heading3, text);
            } else {
                document.querySelector('#infobox').remove();
                InfoBoxErstellen(heading3, text);
            };
        }

    var img4_activ = document.querySelector('#bild4');
        img4_activ.onmousemove = function () {img4.src = './bilder/wahlbilder/vier_aktiv.jpg';}
        img4_activ.onmouseout = function () {img4.src = './bilder/wahlbilder/vier.jpg';}
        img4_activ.onclick = function () {
            if(document.querySelector('#infobox') == null){
                InfoBoxErstellen(heading4, text);
            } else {
                document.querySelector('#infobox').remove();
                InfoBoxErstellen(heading4, text);
            };
        }

/*###################### Rahmen um erstellte Bilder entfernen ##################################*/   

    var x = document.querySelectorAll('aside > img');       
        for (var i = 0; i < x.length; i++) {
          x[i].style.border = 'none';
        }
            
}


