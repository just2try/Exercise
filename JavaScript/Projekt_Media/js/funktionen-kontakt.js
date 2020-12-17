/*
Zusammenstellung der Email-Adresse via JavaScript
Info für Mailgrundlage: pZieladresse@pAnbieter.pKennung
*/
function emailschutz(pZieladresse, pAnbieter, pKennung) {
    return '<a href="' + 'mai' + 'lto' + ':' + pZieladresse + '@'+ pAnbieter + '.' + pKennung + '">' + pZieladresse + '[at]'+ pAnbieter + '.' + pKennung + '</a>';
}

/* Funktion um Elemente inkl. Klasse und TextNode zu erstellen */
function createElem (element, klasse, text){
    let elem = document.createElement(element);
        elem.className = klasse;
        elem.innerHTML = text;
        return elem;    
}

/* Funktion um die erstellten Elemente einem Eltern-Element hinzuzufügen */
function addElem(parent, children){
    children.forEach(function (child){
        parent.appendChild(child);
    })
}

/* Definition des Eltern-Elementes (<Section class="content-left">)*/
var contentLeft = document.querySelector('.content-left');

/* Definition eines Arrays mit den Elementen die durch Funtkion createElem erstellt werden */
var items = [
    createElem('h2', 'kontakt', 'Magic Media - Team'),
    createElem('p', 'kontakt', 'Kontakt: ' + emailschutz("rainer", "Magic", "de")),
    createElem('p', 'kontakt', 'Kontakt: ' + emailschutz("hanna", "Magic", "de")),
    createElem('p', 'kontakt', 'Kontakt: ' + emailschutz("frauke", "Magic", "de")),    
    createElem('p', 'kontakt', 'Kontakt: ' + emailschutz("philip", "Magic", "de")),    
];

/* Ausführen der Funktion addElem wenn die Seite geladen wurde */
window.onload = function (){
    addElem(contentLeft, items);
}
