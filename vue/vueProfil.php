<?php
    require_once('controler/controleurProfil.php');
    $controleurProfil = new controleurProfil();
    $profilInfo = $controleurProfil->getProfil();

    $username = $_SESSION['username'];
    $iduser = $profilInfo['iduser'];
    $prenom = $profilInfo['prenom'];
    $nom = $profilInfo['nom'];
    $naissance = $profilInfo['naissance'];
    $ptsfidelite = $profilInfo['ptsfidelite'];

    $ErreurEmail = (isset($ErreurEmail)) ? '<p class="font-Roboto font-bold text-xl text-red-500 text-center mt-2">' . $ErreurEmail . '</p>' : NULL ;

        $titre = "Profil - Bowling du Front de Mer";
        $contenu = "<h1 class='font-Roboto text-4xl text-center mb-5'>Bienvenue <strong>$username</strong> !</h1>";
        $contenu .= "$ErreurEmail <br>";
        $contenu .= "<div class='h-auto flex items-center bg-gray-200'>
                        <div class='h-auto items-center bg-white rounded-lg ml-10 my-10 text-center'>
                            <button class='font-Roboto font-bold text-2xl bg-red-800 text-white mt-6 mb-3 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Voir mes Réservations</button>
                            <br>
                            <button class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-6 mt-3 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10' onclick='toggleEdition();'>Changer mes informations</button>
                        </div>
                            <div class='h-auto w-screen bg-white rounded-lg ml-5 mr-10 my-10 visible' id='informationsClient'>
                                <h1 class='font-NotoSans font-extrabold text-xl text-left ml-5 mt-5'>Mes informations :</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Prénom</strong> : $prenom</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Nom</strong> : $nom</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Naissance</strong> : $naissance</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 text-lg'><strong>Adresse Mail</strong> : $username</h1>
                                <h1 class='font-Roboto text-left ml-16 mt-2 mb-2 text-lg'><strong>Mes points fidélités</strong> : $ptsfidelite</h1>
                            </div>
                            
                            <div class='h-auto w-screen bg-white rounded-lg ml-5 mr-10 my-10 visible' id='edition' style='display: none;'>
                                <form action='?url=Profil/updateInfos' method='POST'>
                                    <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5 text-xl'>Mes informations :</h1>
                                    <input name='iduser' value='$iduser' type='hidden' class='font-Roboto text-left ml-16 text-lg border border-black rounded-sm p-1' readonly>
                                    <input type='text' name='prenom' placeholder='$prenom' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='text' name='nom' placeholder='$nom' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='date' name='naissance' placeholder='$naissance' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='email' name='email' placeholder='$username' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required><br>
                                    <input type='text' name='ptsfidelite' value='$ptsfidelite' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' style='display:none;' disabled><br>
                                    <button type='submit' id='submit' class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-2 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Modifier</button> 
                                </form>

                                <form action='?url=Profil/updateMDP' method='POST'>
                                    <h1 class='font-NotoSans font-extrabold text-left ml-5 mt-5 text-xl'>Prérequis : 8 caractères minimum, un chiffre, une minuscule, une majuscule et un caractère spécial</h1>
                                    <input type='password' name='password' placeholder='Nouveau mot de passe' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^-_/&*])[A-Za-z\d!@#$%^-_/&*]{8,}$' required oninput='passwordStrengh(this)'>
                                    <div class='passwordBar h-5 w-52 rounded ml-16 mt-2'></div>
                                    <input type='password' name='confirmPassword' placeholder='Confirmer le mot de passe' class='font-Roboto text-left ml-16 mt-2 text-lg border border-black rounded-sm p-1' required oninput='checkPasswordMatch(this)'><br>
                                    <p class='font-NotoSans text-left ml-16 mt-2' id='passwordMatchMessage'></p>
                                    <button type='submit' id='submit' class='font-Roboto font-bold text-2xl bg-red-800 text-white mb-5 mt-2 px-10 h-auto w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Modifier</button> 
                                </form>
                            </div>
                    </div>";
    include "template.php";
?>