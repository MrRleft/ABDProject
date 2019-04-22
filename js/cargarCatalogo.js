var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    PrepareForShow(this);
                    }
                };
                xhttp.open("GET", "BBDD/cervezas.xml", true);
                xhttp.send();
                
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
