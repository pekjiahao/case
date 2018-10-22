function computeGrandTotal() {
	var justJavaCount = document.getElementById("justJavaCount").value;
	var justJavaSubTotal = justJavaCount*2;
	
	var cafeAuLaitCount = document.getElementById("cafeAuLaitCount").value;
	var cafeAuLaitSubTotal = 0.0;
	if (document.getElementById("cal_single").checked == true) {
		cafeAuLaitSubTotal = cafeAuLaitCount*2;
	} else {
		cafeAuLaitSubTotal = cafeAuLaitCount*3;
	}
	
	var icedCappuccinoCount = document.getElementById("icedCappuccinoCount").value;
	var icedCappuccinoSubTotal = 0.0;
	if (document.getElementById("ic_single").checked == true) {
		icedCappuccinoSubTotal = icedCappuccinoCount*4.75;
	} else {
		icedCappuccinoSubTotal = icedCappuccinoCount*5.75;
	}
	
	document.getElementById("grandTotal").value = "$"+(justJavaSubTotal+cafeAuLaitSubTotal+icedCappuccinoSubTotal);
}

function computeJustJavaCost() {
	var justJavaCount = document.getElementById("justJavaCount").value;
	document.getElementById("justJavaSubTotal").value = justJavaCount*2;
	computeGrandTotal();
}

function computeCafeAuLaitCost() {
	var cafeAuLaitCount = document.getElementById("cafeAuLaitCount").value;
	if (document.getElementById("cal_single").checked == true) {
		document.getElementById("cafeAuLaitSubTotal").value = "$"+cafeAuLaitCount*2;

	} else {
		document.getElementById("cafeAuLaitSubTotal").value = "$"+cafeAuLaitCount*3;
	}
	computeGrandTotal();

}

function computeIceCappuccinoCost() {
	var icedCappuccinoCount = document.getElementById("icedCappuccinoCount").value;
	if (document.getElementById("ic_single").checked == true) {
		document.getElementById("icedCappuccinoSubTotal").value = "$"+icedCappuccinoCount*4.75;
	} else {
		document.getElementById("icedCappuccinoSubTotal").value = "$"+icedCappuccinoCount*5.75;
	}
	computeGrandTotal();
}