<?php
    $titre = "Bowling du Front de Mer - Connexion";
    $contenu = "<div class='w-5/6 md:w-3/5 my-36 mx-auto text-center'>";
        $contenu .= "<form class='p-p7_5 border border-solid border-slate-50 bg-gray-200 shadow-xl h-auto flex flex-col items-center' action='' method='POST'>";
            $contenu .= "<img src='media/images/LogoConnexion.png' alt='Your Logo' width='120' height='120' class=''>";
            $message = "";
            $contenu .= "<input class='font-NotoSans text-xl h-20 w-1/2 px-3 py-4 pr-5 mt-20 mr-0 inline-block border-spacing-0.5 border-solid bg-gray-100 box-border' type='text' placeholder='Utilisateur' name='username' required>";
            $contenu .= "<br>";
            $contenu .= "<input class='font-NotoSans text-xl h-20 w-1/2 px-3 py-4 pr-5 my-2 mr-0 inline-block border-spacing-2 border-solid bg-gray-100 box-border' type='password' placeholder='Mot de passe' name='password' required>";
            $contenu .= "<br>";
            $contenu .= "<input class='font-Roboto font-extrabold text-2xl bg-red-800 text-white my-3.5 px-10 h-16 w-auto border-none cursor-pointer rounded-full hover:bg-red-900 hover:border-solid hover:border-spacing-0.5' type='submit' id='submit' value='Se Connecter'>";
        $contenu .= "</form>";
    $contenu .= "</div>";

    include "template.php";
?>