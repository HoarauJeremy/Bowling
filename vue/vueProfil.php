<?php
    require_once('controler/controleurProfil.php');
    $controleurProfil = new controleurProfil();
    $profilInfo = $controleurProfil->getProfil();
    $username = $_SESSION['username'];
    $prenom = $profilInfo['prenom'];
    $nom = $profilInfo['nom'];
    $naissance = $profilInfo['naissance'];
    $ptsfidelite = $profilInfo['ptsfidelite'];
        $titre = "Bowling du Front de Mer - Profil";
        $contenu = "<h1 class='font-Roboto text-4xl text-center mb-5'>Bienvenue <strong>$username</strong> !</h1>";
        $contenu .= "<div class='h-auto flex items-center bg-gray-200'>
                        <div class='h-auto items-center bg-white rounded-lg ml-10 my-10 text-center'>
                            <button class='font-Roboto font-bold text-2xl bg-red-800 text-white mt-6 mb-3 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Voir mes Réservations</button>
                            <br>
                            <button class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-6 mt-3 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10' onclick='toggleEdition();'>Changer mes informations</button>
                        </div>
                            <div class='h-auto w-screen bg-white rounded-lg ml-5 mr-10 my-10 visible' id='informationsClient'>
                                <h1 class='font-Roboto font-extrabold text-xl text-left ml-5 mt-5'>Mes informations :</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Prénom</strong> : $prenom</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Nom</strong> : $nom</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Naissance</strong> : $naissance</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Adresse Mail</strong> : $username</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 mb-2 text-lg'><strong>Mes points fidélités</strong> : $ptsfidelite</h1>
                            </div>
                            
                            <div class='h-auto w-screen bg-white rounded-lg ml-5 mr-10 my-10 visible' id='edition' style='display: none;'>
                                <form action='?url=Profil/modificationUtilisateur' method='POST'>
                                <form action='?url=Profil/updateUtilisateur' method='POST'>
                                    <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5 text-xl'>Mes informations :</h1>
                                    <input type='text' name='prenom' placeholder='$prenom' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='text' name='nom' placeholder='$nom' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='date' name='naissance' placeholder='$naissance' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='email' name='email' placeholder='$username' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='text' name='ptsfidelite' value='$ptsfidelite' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' readonly><br>
                                    <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5 text-xl'>Prérequis : 8 caractères minimum, un chiffre, une minuscule, une majuscule et un caractère spécial</h1>
                                    <input type='password' name='password' placeholder='Nouveau mot de passe' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^-_/&*])[A-Za-z\d!@#$%^-_/&*]{8,}$' required oninput='passwordStrengh(this)'>
                                    <div class='passwordBar h-5 w-52 rounded ml-16 mt-2'></div>
                                    <input type='password' name='confirmPassword' placeholder='Confirmer le mot de passe' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required oninput='checkPasswordMatch(this)'><br>
                                    <p class='font-NotoSans text-left ml-16 mt-2' id='passwordMatchMessage'></p>
                                    <button type='submit' class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-2 mt-2 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Sauvegarder</button>
                                </form>
                            </div>
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