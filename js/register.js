//validate name
function validateName() {
    let name = document.getElementById("name").value;
    
    if (name === "" || name === null) {
        alert("Please enter a valid name!");
        return false;
    }
    if (!isNaN(name)) {
        alert("Name can only contain letters and spaces!");
        return false;
    }
    return true;
}
//validate email address
function validateEmailAddress() {
    let email = document.getElementById("email").value;
    
    if((email == "") || (email == null))
    {
        alert("Please enter a valid email address!")
        return false;
    }
    return true;
}
//validate password
function validatePassword() {
    let password = document.getElementById("pw").value;
    
    if((password.length < 5 ))
    {
        alert("Please enter a valid password!")
        return false;
    }
    return true;
}
//Accept terms and conditions
function acceptTerms() {
    let accept = document.getElementById("accept");

    if (accept.checked === false) {
        alert("Please accept Terms and Conditions!");
        return false;
    }

    return true;
}
function validationAll(event) {
    if (validateName() && validateEmailAddress() && validatePassword() && acceptTerms()) 
    {
        window.location.href("HomePage.php");
    } 
    else {
        event.preventDefault();
    }
}