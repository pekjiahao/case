function changePrice(divId, drinkOptions) {
    console.log(drinkOptions)
	console.log(divId+"Button")
    var outputString ="";
    outputString += "<form method=\"post\" action=\"show_post.php\">\n";

    for (var i = 0; i<drinkOptions.length; i++) {
        outputString += "<label id=\'updatePrice\' for=\"amount\">"
        outputString += drinkOptions[i].name;
        outputString += "</label>";
        outputString += "<input type=\"text\" name=\"amount\" id=\"amount\" value = \"$"
        outputString += drinkOptions[i].price;
        outputString += "\" required>";

    }
    outputString += "</form>";
    document.getElementById(divId).innerHTML = outputString;
	
	document.getElementById(divId+"Button").innerHTML = "<input type=\"submit\" value=\"Submit\">";

}