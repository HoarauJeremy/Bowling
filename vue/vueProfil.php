<?php
    require_once('controler/controleurProfil.php');
    $controleurProfil = new controleurProfil();

    // Appeler la fonction getProfil pour récupérer les informations du profil + Définir les valeurs à des variables pour les utiliser ensuite
    $profilInfo = $controleurProfil->getProfil();
    $username = $_SESSION['username'];
    $prenom = $profilInfo['prenom'];
    $nom = $profilInfo['nom'];
    $naissance = $profilInfo['naissance'];
    $ptsfidelite = $profilInfo['ptsfidelite'];

        $titre = "Bowling du Front de Mer - Profil";
        $contenu = "<h1 class='font-Roboto text-4xl text-center mb-5'>Bienvenue <strong>$username</strong> !</h1>";
        $contenu .= "<div class='h-auto flex items-center bg-gray-200'>
                        <div class='h-auto items-center bg-gray-300 rounded-lg ml-10 my-10 text-center'>
                            <button class='font-Roboto font-bold first-letter:text-2xl bg-red-800 text-white mt-6 mb-3 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Voir mes Réservations</button>
                            <br>
                            <button class='font-Roboto font-bold first-letter:text-2xl bg-red-800 text-white mb-6 mt-3 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10' onclick='toggleEdition()'>Changer mes informations</button>
                        </div>
                            <div class='h-auto w-screen bg-gray-300 rounded-lg ml-5 mr-10 my-10 visible' id='informationsClient'>
                                <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5'>Mes informations :</h1>
                                <h1 class='font-NotoSans text-left ml-16 mt-2'>Prénom : $prenom</h1>
                                <h1 class='font-NotoSans text-left ml-16 mt-2'>Nom : $nom</h1>
                                <h1 class='font-NotoSans text-left ml-16 mt-2'>Naissance : $naissance</h1>
                                <h1 class='font-NotoSans text-left ml-16 mt-2'>Adresse Mail : $username</h1>
                                <h1 class='font-NotoSans text-left ml-16 mt-2 mb-2'>Mes points fidélités : $ptsfidelite</h1>
                            </div>
                            
                            <div class='h-auto w-screen bg-gray-300 rounded-lg ml-5 mr-10 my-10 visible' id='edition' style='display: none;'>
                                <form action='' method='POST'>
                                    <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5'>Mes informations :</h1>
                                    <input type='text' name='prenom' placeholder='$prenom' class='font-NotoSans text-left ml-16 mt-2' required><br>
                                    <input type='text' name='nom' placeholder='$nom' class='font-NotoSans text-left ml-16 mt-2' required><br>
                                    <input type='text' name='naissance' placeholder='$naissance' class='font-NotoSans text-left ml-16 mt-2' required><br>
                                    <input type='text' name='email' placeholder='$username' class='font-NotoSans text-left ml-16 mt-2' required readonly><br>
                                    <input type='password' name='password' placeholder='Nouveau mot de passe' class='font-NotoSans text-left ml-16 mt-2' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$' required oninput='passwordStrengh(this)'><br>
                                    <div class='password-securite-bar h-2 mt-2 rounded'></div>
                                    <button type='submit' class='font-Roboto font-bold first-letter:text-2xl bg-red-800 text-white mb-2 mt-2 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Sauvegarder</button>
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
</script>

<script>
    function passwordStrengh(input) {
        var password = input.value;

        var minuscule = /[a-z]/.test(password);
        var majuscule = /[A-Z]/.test(password);
        var nombre = /\d/.test(password);
        var caracspecial = /[!@#$%^&*]/.test(password);

        var securite = 0;
        if (minuscule) securite++;
        if (majuscule) securite++;
        if (nombre) securite++;
        if (caracspecial) securite++;

        updatepasswordBar(securite);
    }

    function updatepasswordBar(securite) {
        var passwordBar = document.querySelector('.password-securite-bar');
        passwordBar.classList.remove('bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500');

        if (securite === 1) {
            passwordBar.classList.add('bg-red-500');
        } else if (securite === 2) {
            passwordBar.classList.add('bg-orange-500');
        } else if (securite === 3) {
            passwordBar.classList.add('bg-yellow-500');
        } else if (securite === 4) {
            passwordBar.classList.add('bg-green-500');
        }
    }
</script>