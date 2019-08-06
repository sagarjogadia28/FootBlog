function check()
{
	var password = document.getElementById("inputPassword");
	var repassword  = document.getElementById("inputRePassword");
	var error = document.getElementById("Error");
	var result = true;
	if(password.value != repassword.value)
	{
		error.innerHTML = "Password does not match!!";
		password.value = "";
		repassword.value = "";
		password.focus();
		result =  false;
	}
	return result;

}