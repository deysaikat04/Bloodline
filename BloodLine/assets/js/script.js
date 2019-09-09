	function verify(){
		/*name is blank*/
		if(document.getElementById("name").value === ""){
			document.getElementById("name").style.border = "1px solid #ed143d";
			document.getElementById("nameErr").innerHTML="Please provide your name";
		}
		/*mob is blank*/
		if(document.getElementById("mob").value === ""){
			document.getElementById("mob").style.border = "1px solid #ed143d";
			document.getElementById("mobErr").innerHTML="Please provide your 10 digit mobile number.";
		}
		/*mail is blank*/
		if(document.getElementById("mail").value === ""){
				document.getElementById("mail").style.border = "1px solid #ed143d";
				document.getElementById("mailErr").innerHTML="Please provide your email.";
		}		
		/*password is blank*/
		if(document.getElementById("pass").value === ""){
				document.getElementById("pass").style.border = "1px solid #ed143d";
		}
		else {
				document.getElementById("pass").style.border = "1px solid #4caf50";
		}
		return false;
		}
function nameCheck(){
	var d = /^\w+{5,30}$/;	
	if (!document.getElementById("name").value.match(d)) {
		document.getElementById("name").style.border = "1px solid #ed143d";
		document.getElementById("nameErr").innerHTML = "Please give a valid name";
		return false;
	}
	else{document.getElementById("nameErr").innerHTML = "";
			 document.getElementById("name").style.border = "1px solid #4caf50";
		return true;
	}
}
function mailCheck(){
	var mailval = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;	
	if (!document.getElementById("mail").value.match(mailval)) {
		document.getElementById("mail").style.border = "1px solid #ed143d";
		document.getElementById("mailErr").innerHTML = "Please give a valid Email.";
		return false;
	}
	else{document.getElementById("mailErr").innerHTML = "";
			 document.getElementById("mail").style.border = "1px solid #4caf50";
		return true;
	}
}
function mobCheck(){
	var d = /^\d{10}$/;	
			if (!document.getElementById("mob").value.match(d)) {
					document.getElementById("mob").style.border = "1px solid #ed143d";
          document.getElementById("mobErr").innerHTML = "Please give a valid Mobile No.";
					//alert("err");
           return false;
       }
			else{
				document.getElementById("mobErr").innerHTML = "";
				document.getElementById("mob").style.border = "1px solid #4caf50";
				return true;
			}
}
/*function dobCheck(){
var today = date("Y-m-d");
    var dob = document.getElementById("dob1");
    var diff = date_diff(date_create(dob), date_create(today));
    document.getElementById("dobErr").innerHTML="****";
    if(diff<18 )
{
        document.getElementById("dobErr").innerHTML="your age should be >18to register";
    return false;
}
    else if( diff =>100)
    {
       document.getElementById("dobErr").innerHTML="Please insert a valid age";
        
    return false;
       }
			else{
				document.getElementById("dobErr").innerHTML = "";
				document.getElementById("dob1").style.border = "1px solid #4caf50";
				return true;
			}

}*/
function userCheck(){
	/*username is blank*/
		if(document.getElementById("name").value === ""){
				document.getElementById("unameErr").innerHTML="Please choose an username";
				document.getElementById("name").style.border = "1px solid #ed143d";
		}
		else {
				document.getElementById("unameErr").innerHTML=" ";
				document.getElementById("name").style.border = "1px solid #4caf50";
		}
}
function passCheck(){
	var length = document.getElementById("pass").value.length;
	switch(length){
		case 3:	{
			document.getElementById("password-strength-meter").style.background = "crimson";
			document.getElementById("password-strength-meter").style.width = "20%";
			document.getElementById("password-strength-meter").style.transition="all .6s ease";
			break;
		}
		case 5:	{
			document.getElementById("password-strength-meter").style.background = "yellow";
			document.getElementById("password-strength-meter").style.width = "25%";
			document.getElementById("password-strength-meter").style.transition="all .6s ease";
			break;
		}
		case 7:	{
			document.getElementById("password-strength-meter").style.background = "orange";
			document.getElementById("password-strength-meter").style.width = "35%";
			document.getElementById("password-strength-meter").style.transition="all .6s ease";
			break;
		}
		case 9:	{
			document.getElementById("password-strength-meter").style.background = "yellowgreen";
			document.getElementById("password-strength-meter").style.width = "45%";
			document.getElementById("password-strength-meter").style.transition="all .6s ease";
			break;
		}
	}
	if (document.getElementById("pass").value.length == 6){
				
			}
}
function passCheckConfirm(){
	var d = /^\d{10}$/;	
			if (document.getElementById("pass").value === " "){
				document.getElementById("pass").style.border = "1px solid #ed143d";
				document.getElementById("passEmpty").innerHTML = "Please give atleast 5 charecters.";
			}
			if (document.getElementById("pass").value != document.getElementById("cpass").value) {
					document.getElementById("cpass").style.border = "1px solid #ed143d";
          document.getElementById("passErr").innerHTML = "Password didn't match.";
					//alert("err");
           return false;
       }
			else{
				document.getElementById("passErr").innerHTML = "";
				document.getElementById("pass").style.border = "1px solid #4caf50";
				document.getElementById("cpass").style.border = "1px solid #4caf50";
				return true;
			}
}