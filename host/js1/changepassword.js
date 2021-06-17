var newPassword = document.getElementById("new_password");
var confirmPassword = document.getElementById("confirm_password");

		    function validatePassword() 
			{
		        if (newPassword.value != confirmPassword.value)
			    {
		            document.getElementById("confirm_password").setCustomValidity("Passwords do not match!");
		             } 
			else 
			     {
		            //empty string means no validation error
		            document.getElementById("confirm_password").setCustomValidity('');
		              }
		       }
newPassword.addEventListener("change", validatePassword);
confirmPassword.addEventListener("change", validatePassword);
