<?php
    $titre = "Changer mon mot de passe - Bowling du Front de Mer";
    $contenu = "<div class='w-5/6 md:w-3/5 mx-auto text-center'>";
        $contenu .= "<form class='p-p7_5 border border-solid border-slate-50 bg-gray-200 shadow-xl h-auto flex flex-col items-center rounded-md mb-10' action='?url=Connexion/NouvMDP' method='POST'>";
            $contenu .= "<p class='font-NotoSans font-bold text-xl text-left mt-2 mb-2''>Veuillez entrer un nouveau mot de passe.</p>";
            $contenu .= "<h1 class='font-NotoSans font-extrabold text-left ml-5 mb-5 mt-5'>Prérequis : 8 caractères minimum, un chiffre, une minuscule, une majuscule et un caractère spécial</h1>";
            $contenu .= "<input type='password' name='password' placeholder='Nouveau mot de passe' class='font-Roboto text-left mt-2 text-lg border border-black rounded-sm p-1' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^-_/&*])[A-Za-z\d!@#$%^-_/&*]{8,}$' required oninput='passwordStrengh(this)'>";
            $contenu .= "<div class='passwordBar h-5 w-52 rounded mt-2'></div>";
            $contenu .= "<input type='password' name='confirmPassword' placeholder='Confirmer le mot de passe' class='font-Roboto text-left mt-2 text-lg border border-black rounded-sm p-1' required oninput='checkPasswordMatch(this)'><br>";
            $contenu .= "<p class='font-NotoSans text-left mt-2' id='passwordMatchMessage'></p>";
            $contenu .= "<p class='font-NotoSans text-left mt-2' id='ageErrorMessage'></p>";
            $contenu .= "<button type='submit' id='submit' class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-5 mt-2 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Sauvegarder</button>";
            $contenu .= "<p class='text-left'>*Il est recommandé d'utiliser un mot passe sécurisé mais simple à retenir !</p>";
        $contenu .= "</form>";
    $contenu .= "</div>";
    include "template.php";
?>

<script>
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