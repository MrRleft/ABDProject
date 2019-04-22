var xhttp = new XMLHttpRequest();
var currentBeer = null;
var cervezas = null;



function CheckIfBeerExists(beerId){
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        cervezas = this.responseXML.getElementsByTagName("cerveza");
        for(i = 0; i < cervezas.length; i++){
            if(cervezas[i].getAttributeNode("id").nodeValue == beerId){
                currentBeer = cervezas[beerId-1];
                ShowBeerInformation();
                return 0;
            }
        }
        window.location.href = window.location.pathname.substr(0, window.location.pathname.lastIndexOf('/'));
        }
    };
    xhttp.open("GET", "BBDD/cervezas.xml", true);
    xhttp.send();

}

function ShowBeerInformation(){


    var aux = "";

	aux +=  "<div class= 'mostrarCerveza'>";
	aux +=  "<div class= 'nombreCerveza'>";
	aux +=  "<h1> " + currentBeer.getAttributeNode("id").nodeValue + " - " +  currentBeer.getElementsByTagName("nombre").item(0).innerHTML + " </h1>";
	aux +=  "</div>";// cierro div nombre
	aux +=  "<div class= 'contenidoCerveza'>";
	aux +=  "<div class= 'imagenCerveza'>";
	aux +=  "<img alt='Imagen de cerveza' src="+ currentBeer.getElementsByTagName("Imagen").item(0).innerHTML+" width='300' height='300' />";
	aux += "</div>";// cierro div imagen
	aux += "<div class= 'datosCerveza'>";
	aux += "<p><span>Capacidad: </span>"+  currentBeer.getElementsByTagName("capacidad").item(0).innerHTML +" Cl </p>";
	aux += "<p><span>Color: </span>"+  currentBeer.getElementsByTagName("color").item(0).innerHTML + "</p>";
	aux += "<p><span>Tipo: </span>"+ currentBeer.getElementsByTagName("tipo").item(0).innerHTML +"</p>";
	aux += "<p><span>Graduación: </span>"+  currentBeer.getElementsByTagName("grado").item(0).innerHTML + " %  </p>";
	aux += "<p><span>Ingredientes: </span>"+  currentBeer.getElementsByTagName("grano").item(0).innerHTML +"</p>";
	aux += "<p><span>País: </span>" +  currentBeer.getElementsByTagName("pais").item(0).innerHTML+"</p>";
	aux += "<p><span>Precio: </span>"+  currentBeer.getElementsByTagName("precio").item(0).innerHTML +" € </p>";
	aux += "</div>";//cierro div datosCerveza
	aux += "</div>";//cierro div contenidoCerveza
	aux += "</div>";//cierro div mostrarCerveza
    document.getElementById("infoBeer").innerHTML = aux;

}
/*
function httpGetAsync(callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", window.location.href, true); // true for asynchronous 
    xmlHttp.send(null);
}

function PrepareForShow(xml){
    var xmlDoc = xml.responseXML;
    var x = xmlDoc.getElementsByTagName("cerveza");
    var text = "";
    for(i = 0; i < x.length; i++){
        text += ShowBeer(x[i]);
    }
    document.getElementById("filtro").innerHTML = text;
}

function ShowBeer(beer){
    var aux = "";
    aux += "<div class='item'>";
    aux += "<div class ='seccionItem'>";
    aux += "<div class = 'imagenes'>";
    aux += "<a href = mostrarCerveza.php?id="+ beer.getAttributeNode("id").nodeValue + "> <img alt='Imagen de cerveza' src=" + beer.getElementsByTagName("Imagen").item(0).innerHTML + "> </a>";
    aux +="</div>";
    aux +="</div>";
    aux +="<div class ='seccionItem'>";
    aux += "<div class = 'descripcion'>";
    aux += "<h1> <a href = mostrarCerveza.php?id=" + beer.getAttributeNode("id").nodeValue + ">" + beer.getElementsByTagName("nombre").item(0).innerHTML + "</a></h1>";
    aux +="<div  class = 'ficha'>";
    aux += "<p>" + beer.getElementsByTagName("pais").item(0).innerHTML + "</p>";
    aux += "<p>" + beer.getElementsByTagName("tipo").item(0).innerHTML + "</p>";
    aux += "<p>"+ beer.getElementsByTagName("color").item(0).innerHTML + "  " + beer.getElementsByTagName("grado").item(0).innerHTML + " º "+ beer.getElementsByTagName("capacidad").item(0).innerHTML + " cL" + "</p>";
    aux += "</div>";
    aux += "<p>"+ beer.getElementsByTagName("precio").item(0).innerHTML + " € </p>";
    aux += "</div>";
    aux += "</div>";
    aux +="</div>";
    return aux;
}
*/