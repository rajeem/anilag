
<!-- 
//Browser Support Code
function ajaxFunction(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	//...........................................................sample ko lang to
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			//sample ko lang to
			var ajaxDisplay1 = document.getElementById('error');
			ajaxDisplay1.innerHTML = ajaxRequest.responseText;
		}
	}
	//...........................................................til here
	var call_num = document.getElementById('call_num').value;
	var wpm = document.getElementById('wpm').value;
	var sex = document.getElementById('sex').value;
	var queryString = "?call_num=" + call_num + "&wpm=" + wpm + "&sex=" + sex;
	ajaxRequest.open("GET", "ajax.php" + queryString, true);
	ajaxRequest.send(null); 
}

//-->
