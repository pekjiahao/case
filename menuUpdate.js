function changePrice(divtag, drinksizeid) {
    console.log(drinksizeid)
	console.log(divtag+"Button")
    var outputString ="";
    outputString += "<form method=\"post\" action=\"menuUpdate.php\">\n";

    for (var i = 0; i<drinksizeid.length; i++) {
        outputString += "<label id=\'updatePrice\' for=\"price\">"
        outputString += drinksizeid[i].name;
        outputString += "</label>";
        outputString += "<input type=\"text\" name=\"";
		outputString += drinksizeid[i].drinksizeid;
		outputString += "\" id=\"price\" value = \"$"
        outputString += drinksizeid[i].price ;
        outputString += "\" required>";

    }
    outputString += "</form>";
    document.getElementById(divtag).innerHTML = outputString;
	
	document.getElementById(divtag+"Button").innerHTML = "<input type=\"submit\" value=\"Submit\">";

}