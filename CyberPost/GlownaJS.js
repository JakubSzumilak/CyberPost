function showRegistrationMenu() {
    let menu = document.getElementById("registration-menu");
    if (menu.style.visibility == 'visible')
    {
        menu.style.visibility = 'hidden';
    } else {
        menu.style.visibility = 'visible';
    }
}

function validateRegistration() {
    let pass1 = document.forms["rejestracja"]["haslo"].value;
    let pass2 = document.forms["rejestracja"]["powtorz-haslo"].value;

    return (pass1 === pass2);
}

