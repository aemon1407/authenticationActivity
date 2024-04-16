function validateForm() {
    var name = document.getElementById("name").value;
    var phoneNum = document.getElementById("phoneNum").value;
    var pax = document.getElementById("pax").value;
    var email = document.getElementById("email").value;

    var nameRegex = /^[a-zA-Z\s]+$/;
    var phoneRegex = /^\d{10}$/;
    var paxRegex = /^[1-9][0-9]*$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    var errorMessages = "";

    if (!name.match(nameRegex)) {
        errorMessages += "Name must contain only letters and spaces.<br>";
    }

    if (!phoneNum.match(phoneRegex)) {
        errorMessages += "Phone number must be 10 digits.<br>";
    }

    if (!pax.match(paxRegex)) {
        errorMessages += "Total Pax must be a positive integer.<br>";
    }

    if (!email.match(emailRegex)) {
        errorMessages += "Invalid email format.<br>";
    }

    var errorDiv = document.getElementById("errorMessages");
    errorDiv.innerHTML = errorMessages;

    if (errorMessages !== "") {
        return false;
    }

    return true;
}
