
function validateForm() {

    let valid = true;

    document.querySelectorAll("small").forEach(el => el.innerText = "");

    let first_name = document.getElementById("first_name").value.trim();
    let last_name  = document.getElementById("last_name").value.trim();
    let username   = document.getElementById("username").value.trim();
    let email      = document.getElementById("email").value.trim();
    let phone      = document.getElementById("phone").value.trim();
    let age        = document.getElementById("age").value.trim();
    let password   = document.getElementById("password").value;
    let confirm    = document.getElementById("confirm_password").value;

    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    let namePattern = /^[a-zA-ZëËçÇ]+$/u;
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
    username: /^[a-zA-Z][a-zA-Z0-9]{2,19}$/,
    phone: /^[0-9]{8,15}$/
};

const blocked = ["admin"];

// first name validation
function validateFirstName() {
    const field = document.getElementById("first_name");
    const err = document.getElementById("firstNameFrontErr");
    const val = field.value.trim();
    
    if(val && !patterns.name.test(val)) {
        err.innerText = "Only letters allowed";
        return false;
    } else {
        err.innerText = "";
        return true;
    }
}

// last name validation
function validateLastName() {
    const field = document.getElementById("last_name");
    const err = document.getElementById("lastNameFrontErr");
    const val = field.value.trim();
    
    if(val && !patterns.name.test(val)) {
        err.innerText = "Only letters allowed";
        return false;
    } else {
        err.innerText = "";
        return true;
    }
}

// username validation
function validateUsername() {
    const field = document.getElementById("username");
    const err = document.getElementById("usernameFrontErr");
    const val = field.value.trim();
    
    if(val) {
        if(blocked.includes(val.toLowerCase())) {
            err.innerText = "This username is not allowed";
            return false;
        } else if(!patterns.username.test(val)) {
            err.innerText = "3-20 chars, start with letter, only letters/numbers";
            return false;
        }
    }
    err.innerText = "";
    return true;
}

// email validation
function validateEmail() {
    const field = document.getElementById("email");
    const err = document.getElementById("emailFrontErr");
    const val = field.value.trim();
    
    if(!val) {
        err.innerText = "";
        return true;
    }
    
    if(!val.includes("@")) {
        err.innerText = "Email must contain @";
        return false;
    }
    
    let parts = val.split("@");
    let beforeAt = parts[0];
    let afterAt = parts[1];
    
    if(beforeAt.startsWith(".") || beforeAt.endsWith(".")) {
        err.innerText = "Invalid format before @";
        return false;
    } else if(!afterAt || !afterAt.includes(".")) {
        err.innerText = "Domain must contain dot";
        return false;
    } else if(afterAt.split(".").length < 2) {
        err.innerText = "Invalid domain format";
        return false;
    }
    
    err.innerText = "";
    return true;
}

// phone validation
function validatePhone() {
    const field = document.getElementById("phone");
    const err = document.getElementById("phoneFrontErr");
    const val = field.value.trim();
    
    if(val && !patterns.phone.test(val)) {
        err.innerText = "Phone number is not valid";
        return false;
    } else {
        err.innerText = "";
        return true;
    }
}

// age validation
function validateAge() {
    const field = document.getElementById("age");
    const err = document.getElementById("ageFrontErr");
    const val = field.value.trim();
    
    if(val) {
        const ageNum = parseInt(val);
        if(isNaN(ageNum) || ageNum < 18 || ageNum > 120) {
            err.innerText = "Age must be between 18 and 120";
            return false;
        }
    }
    err.innerText = "";
    return true;
}

// password validation
function validatePassword() {
    const field = document.getElementById("password");
    const err = document.getElementById("passwordFrontErr");
    const val = field.value;
    
    if(val && !patterns.password.test(val)) {
        err.innerText = "Min 8 chars, uppercase, lowercase, number, special char";
        return false;
    } else {
        err.innerText = "";
        return true;
    }
}

// confirm password validation
function validateConfirmPassword() {
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirm_password").value;
    const err = document.getElementById("confirmFrontErr");
    
    if(confirm && password !== confirm) {
        err.innerText = "Passwords do not match";
        return false;
    } else {
        err.innerText = "";
        return true;
    }
}

// attach real-time validation
document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("first_name").addEventListener('input', validateFirstName);
    document.getElementById("last_name").addEventListener('input', validateLastName);
    document.getElementById("username").addEventListener('input', validateUsername);
    document.getElementById("email").addEventListener('input', validateEmail);
    document.getElementById("phone").addEventListener('input', validatePhone);
    document.getElementById("age").addEventListener('input', validateAge);
    document.getElementById("password").addEventListener('input', validatePassword);
    document.getElementById("confirm_password").addEventListener('input', validateConfirmPassword);
    
    // also validate confirm password when password changes
    document.getElementById("password").addEventListener('input', validateConfirmPassword);

    const form = document.querySelector('.future-form');
    if(!form) return;

    form.addEventListener('submit', function(e){
        // clear server-side inline error blocks (they will be re-populated after redirect)
        document.querySelectorAll('.error-wrap').forEach(el => el.innerText = '');

        if(!validateForm()){
            e.preventDefault();
        }
    });
});