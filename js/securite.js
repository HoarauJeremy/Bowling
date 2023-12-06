function toggleEdition() {
    var informationsClient = document.getElementById('informationsClient');
    var edition = document.getElementById('edition');
    if (informationsClient.style.display === 'block') {
        informationsClient.style.display = 'none';
        edition.style.display = 'block';
    } else {
        informationsClient.style.display = 'block';
        edition.style.display = 'none';
    }
}

function passwordStrengh(input) {
    var password = input.value;
    var longueur = /.{8,}/.test(password);
    var minuscule = /[a-z]/.test(password);
    var majuscule = /[A-Z]/.test(password);
    var nombre = /\d/.test(password);
    var caracspecial = /[!@#$%^-_/&*]/.test(password);
    var securite = 0;
    if (longueur) securite++;
    if (minuscule) securite++;
    if (majuscule) securite++;
    if (nombre) securite++;
    if (caracspecial) securite++;
    updatepasswordBar(securite);
}

function checkPasswordMatch(confirmPasswordInput) {
    var passwordInput = document.querySelector('input[name="password"]');
    var confirmPassword = confirmPasswordInput.value;
    var password = passwordInput.value;
    var passwordMatchMessage = document.getElementById('passwordMatchMessage');
    if (confirmPassword != password) {
        passwordMatchMessage.innerHTML = 'Les mots de passe ne correspondent pas.';
        passwordMatchMessage.style.color = 'red';
    } else {
        passwordMatchMessage.innerHTML = '';
    }
}

function updatepasswordBar(securite) {
    var passwordBar = document.querySelector('.passwordBar');
    passwordBar.classList.remove('bg-red-800', 'bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500');
    if (securite === 1) {
        passwordBar.classList.add('bg-red-800');
    } else if (securite === 2) {
        passwordBar.classList.add('bg-red-500');
    } else if (securite === 3) {
        passwordBar.classList.add('bg-orange-500');
    } else if (securite === 4) {
        passwordBar.classList.add('bg-yellow-500');
    } else if (securite === 5) {
        passwordBar.classList.add('bg-green-500');
    }
}