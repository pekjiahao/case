function checkname(event) {
	var namefield = event.currentTarget;
	var regex1 = RegExp('([^A-Za-z\\s])+','g');
	
	if (regex1.test(namefield.value) == true) {
		alert("Only alphabetical letters and spaces are allowed.");
		namefield.focus();
		
		return false;
	}
}

function checkemail(event) {
	var emailfield = event.currentTarget;
	var regex1 = RegExp('^([A-Z0-9\\-\\.])+[@]([A-Z]+[.]){1,3}[A-Z]{2,3}$','i');
	console.log(regex1.test(emailfield.value))
	if (regex1.test(emailfield.value) != true) {
		alert("Your email is in the wrong format.");
		emailfield.focus();
		emailfield.select();
		return false;
	}
}

function checkdate(event){
	var datefield = event.currentTarget;
var userdate = new Date(datefield.value);

var todaydate = new Date();
console.log(userdate);
console.log(userdate-todaydate);
if(userdate < todaydate){

  alert("Date must be bigger than today.");
  
}
}

 