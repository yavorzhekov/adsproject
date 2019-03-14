function checkData(){
	 var username=document.forms["registration"]["username"].value;
     var name=document.forms["registration"]["myname"].value;
     var pass=document.forms["registration"]["pass"].value;
     var confirmPass=document.forms["registration"]["conf-pass"].value;
     if (username.length<4 ){
     	alert("The username must be over 3 characters");
     	return false;
     }
     if (name.length<2 ){
     	alert("The name must be over characters");
     	return false;
     }

     if (pass.length<6 || pass.length>12){
     	alert("The password must be between 6 and 12 characters");
     	return false;
     }
     if (pass!=confirmPass){
     	alert("The passwords dont match");
     	return false;
     }

}



