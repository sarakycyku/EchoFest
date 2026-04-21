function validateForm() {

    let valid = true;

    document.querySelectorAll("small").forEach(el => el.innerText = "");

    let first_name = document.getElementById("first_name").value.trim();
    let last_name  = document.getElementById("last_name").value.trim();
    let city       = document.getElementById("city").value.trim();
    let username   = document.getElementById("username").value.trim();
    let email      = document.getElementById("email").value.trim();
    let phone      = document.getElementById("phone").value.trim();
    let age        = document.getElementById("age").value.trim();
    let password   = document.getElementById("password").value;
    let confirm    = document.getElementById("confirm_password").value;

    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    let namePattern = /^[a-zA-ZëËçÇ]+$/u;
    let cityPattern = /^[a-zA-Z\s\-']+$/;
    let usernamePattern = /^[a-zA-Z][a-zA-Z0-9]{2,19}$/;
    let blocked = ["admin"];

    // PASSWORD
    if(!passwordPattern.test(password)){
        document.getElementById("passwordFrontErr").innerText =
        "Min 8 chars, uppercase, lowercase, number, special char";
        valid = false;
    }

    // CONFIRM PASSWORD
    if(password !== confirm){
        document.getElementById("confirmFrontErr").innerText =
        "Passwords do not match";
        valid = false;
    }

    // PHONE
    if(!/^[0-9]{8,15}$/.test(phone)){
        document.getElementById("phoneFrontErr").innerText =
        "Phone number is not valid";
        valid = false;
    }

    // AGE
    if(isNaN(age) || age < 18 || age > 120){
        document.getElementById("ageFrontErr").innerText =
        "Age must be between 18 and 120";
        valid = false;
    }

    // FIRST NAME
    if(!namePattern.test(first_name)){
        document.getElementById("firstNameFrontErr").innerText =
        "Only letters allowed";
        valid = false;
    }

    // LAST NAME
    if(!namePattern.test(last_name)){
        document.getElementById("lastNameFrontErr").innerText =
        "Only letters allowed";
        valid = false;
    }

    // CITY
    if(!cityPattern.test(city)){
        document.getElementById("cityFrontErr").innerText =
        "City can contain only letters";
        valid = false;
    }

    // USERNAME
    if(blocked.includes(username.toLowerCase())){
        document.getElementById("usernameFrontErr").innerText =
        "This username is not allowed";
        valid = false;
    }
    else if(!usernamePattern.test(username)){
        document.getElementById("usernameFrontErr").innerText =
        "3-20 chars, start with letter, only letters/numbers";
        valid = false;
    }

    // EMAIL
    if(!email.includes("@")){
        document.getElementById("emailFrontErr").innerText =
        "Email must contain @";
        valid = false;
    } else {

        let parts = email.split("@");
        let beforeAt = parts[0];
        let afterAt = parts[1];

        if(beforeAt.startsWith(".") || beforeAt.endsWith(".")){
            document.getElementById("emailFrontErr").innerText =
            "Invalid format before @";
            valid = false;
        }
        else if(!afterAt.includes(".")){
            document.getElementById("emailFrontErr").innerText =
            "Domain must contain dot";
            valid = false;
        }
        else if(afterAt.split(".").length < 2){
            document.getElementById("emailFrontErr").innerText =
            "Invalid domain format";
            valid = false;
        }
    }

    return valid;
}

// real-time validation helpers
const patterns = {
    password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/,
    name: /^[a-zA-ZëËçÇ]+$/u,
    city: /^[a-zA-Z\s\-']+$/,
    username: /^[a-zA-Z][a-zA-Z0-9]{2,19}$/,
    phone: /^[0-9]{8,15}$/
};

const blocked = ["admin"];

// first name
function validateFirstName() {
    const val = document.getElementById("first_name").value.trim();
    const err = document.getElementById("firstNameFrontErr");

    if(val && !patterns.name.test(val)){
        err.innerText = "Only letters allowed";
        return false;
    }

    err.innerText = "";
    return true;
}

// last name
function validateLastName() {
    const val = document.getElementById("last_name").value.trim();
    const err = document.getElementById("lastNameFrontErr");

    if(val && !patterns.name.test(val)){
        err.innerText = "Only letters allowed";
        return false;
    }

    err.innerText = "";
    return true;
}

// city
function validateCity() {
    const val = document.getElementById("city").value.trim();
    const err = document.getElementById("cityFrontErr");

    if(val && !patterns.city.test(val)){
        err.innerText = "City can contain only letters";
        return false;
    }

    err.innerText = "";
    return true;
}

// username
function validateUsername() {
    const val = document.getElementById("username").value.trim();
    const err = document.getElementById("usernameFrontErr");

    if(val){
        if(blocked.includes(val.toLowerCase())){
            err.innerText = "This username is not allowed";
            return false;
        }

        if(!patterns.username.test(val)){
            err.innerText = "3-20 chars, start with letter";
            return false;
        }
    }

    err.innerText = "";
    return true;
}

// email
function validateEmail() {
    const val = document.getElementById("email").value.trim();
    const err = document.getElementById("emailFrontErr");

    if(!val){
        err.innerText = "";
        return true;
    }

    if(!val.includes("@")){
        err.innerText = "Email must contain @";
        return false;
    }

    let parts = val.split("@");
    let beforeAt = parts[0];
    let afterAt = parts[1];

    if(beforeAt.startsWith(".") || beforeAt.endsWith(".")){
        err.innerText = "Invalid format before @";
        return false;
    }

    if(!afterAt.includes(".")){
        err.innerText = "Domain must contain dot";
        return false;
    }

    err.innerText = "";
    return true;
}

// phone
function validatePhone() {
    const val = document.getElementById("phone").value.trim();
    const err = document.getElementById("phoneFrontErr");

    if(val && !patterns.phone.test(val)){
        err.innerText = "Phone number invalid";
        return false;
    }

    err.innerText = "";
    return true;
}

// age
function validateAge() {
    const val = document.getElementById("age").value.trim();
    const err = document.getElementById("ageFrontErr");

    if(val){
        let num = parseInt(val);

        if(isNaN(num) || num < 18 || num > 120){
            err.innerText = "Age must be between 18 and 120";
            return false;
        }
    }

    err.innerText = "";
    return true;
}

// password
function validatePassword() {
    const val = document.getElementById("password").value;
    const err = document.getElementById("passwordFrontErr");

    if(val && !patterns.password.test(val)){
        err.innerText = "Min 8 chars required";
        return false;
    }

    err.innerText = "";
    return true;
}

// confirm password
function validateConfirmPassword() {
    const pass = document.getElementById("password").value;
    const conf = document.getElementById("confirm_password").value;
    const err = document.getElementById("confirmFrontErr");

    if(conf && pass !== conf){
        err.innerText = "Passwords do not match";
        return false;
    }

    err.innerText = "";
    return true;
}

// listeners
document.addEventListener("DOMContentLoaded", function(){

    document.getElementById("first_name").addEventListener("input", validateFirstName);
    document.getElementById("last_name").addEventListener("input", validateLastName);
    document.getElementById("city").addEventListener("input", validateCity);
    document.getElementById("username").addEventListener("input", validateUsername);
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("phone").addEventListener("input", validatePhone);
    document.getElementById("age").addEventListener("input", validateAge);
    document.getElementById("password").addEventListener("input", validatePassword);
    document.getElementById("confirm_password").addEventListener("input", validateConfirmPassword);

    document.getElementById("password").addEventListener("input", validateConfirmPassword);

    const form = document.querySelector(".future-form");

    form.addEventListener("submit", function(e){
        if(!validateForm()){
            e.preventDefault();
        }
    });

});