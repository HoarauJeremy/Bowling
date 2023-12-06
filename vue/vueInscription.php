<?php
    $titre = "Inscription - Bowling du Front de Mer";
    $contenu = "<div class='h-auto w-screen ml-20 mr-10 visible' id='edition'>
                    <form action='?url=Inscription/Inscription' method='POST'>
                        <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5 text-xl'>Mes informations :</h1>
                        <input type='text' name='prenom' placeholder='Prénom' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                        <input type='text' name='nom' placeholder='Nom' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                        <input type='date' name='naissance' placeholder='Naissance' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                        <input type='email' name='email' placeholder='Email' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                        <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5 text-xl'>Prérequis : 8 caractères minimum, un chiffre, une minuscule, une majuscule et un caractère spécial</h1>
                        <input type='password' name='password' placeholder='Nouveau mot de passe' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^-_/&*])[A-Za-z\d!@#$%^-_/&*]{8,}$' required oninput='passwordStrengh(this)'>
                        <div class='passwordBar h-5 w-52 rounded ml-16 mt-2'></div>
                        <input type='password' name='confirmPassword' placeholder='Confirmer le mot de passe' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required oninput='checkPasswordMatch(this)'><br>
                        <p class='font-NotoSans text-left ml-16 mt-2' id='passwordMatchMessage'></p>
                        <button type='submit' id='submit' class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-5 mt-2 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Sauvegarder</button>
                    </form>
                </div>";
                
    include "template.php";
?>


<script>
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
</script>