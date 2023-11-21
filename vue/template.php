<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $titre; ?></title>
    <meta name="description" content="Description of your website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Ajout d'un potentielle fichier CSS personnalisé -->
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    
    <!-- Ajout de Tailwind CSS -->
    <link rel="stylesheet" href="./media/css/output.css">
    <link rel="shortcut icon" href="./media/images/logoBowling.ico" type="image/x-icon">
    <!-- <style>
        /* Bar verticale pour le menu */
        .nav-item:not(:last-child) {
            border-right: 1px solid black; /* bar verticale */
            padding-right: 10px; /* ajustement de l'espace pour les bars */
        }

        /* Css pour les menu déroulant */
        .dropdown-menu {
            position: relative;
            display: inline-block;
        }

        /* CSS pour le contenue du menu déroulant */
        .dropdown-content {
            display: ;
            position: absolute;
            background-color: #fff;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-menu:hover .dropdown-content {
            display: block;
        }

        /* CSS pour le contenue principale */
        .main-content {
            max-width: 800px; /* Ajustement de la taille */
            margin: 0 auto; /* Centré le bloc d'information principale */
            padding: 20px; /* Ajout du padding pour l'espacement du contenue */
        }
    </style> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-background z-50 fixed top-0 w-full shadow md:h-auto">
        <!-- Bar de navigation -->
        <nav class="bg-accent md:bg-transparent w-full font-Roboto p-6 md:p-0 flex items-center justify-between">
            <!-- Logo -->
            <a href="index.php" class="flex md:ml-10 md:mr-16">
                <span id="logo" class="h-auto w-auto">
                    <img src="media/images/LogoBowling.png" alt="Logo" width="150" height="150">
                </span> 
            </a>
            
            <div id="toggled-menu" class="w-full h-screen md:h-28 absolute top-full left-0 -translate-y-full -z-10
                text-white border-b backdrop-blur-lg md:backdrop-blur-none md:bg-transparent border-gray-200 flex flex-col items-center
                md:static md:z-10 md:transform-none md:border-none md:flex-row">
                
                <ul class="w-11/12 h-5/6 mt-4 mx-auto py-4 px-2 bg-background rounded-xl text-center text-2xl font-bold font-Roboto 
                md:px-0 md:flex md:flex-row md:items-center md:rounded-none md:w-9/12 md:p-0 md:mt-0">
            
                    <li id="nav-item" class="py-4 text-text font-NotoSans font-extrabold text-5xl mx-auto w-11/12 mt-8 md:hidden">
                        <h1>Menu</h1>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="?controleur=Acceuil&method=Acceuil" class="w-full h-full flex justify-center items-center md:text-xl">Accueil</a>
                    </li>   

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="index.php?action=reserver" class="w-full h-full flex justify-center items-center md:text-xl">Réserver</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="index.php?action=contacter" class="w-full h-full flex justify-center items-center md:text-xl">Nous Contacter</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0 border-r border-black ">
                        <a href="<?php echo (isset($_SESSION['CONNECTER']) != "OK") ? 'index.php?url=Connexion/PageConnexion' : 'index.php?url=Connexion/EspaceClient'; ?>" class="w-full h-full flex justify-center items-center md:text-xl">Espace Client</a>
                    </li>
         
                    <!-- Menu déroulant Langue -->
                    <li id="nav-item group relative" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0">
                        <a href="?action=" id="group-hover:text-gray-300" class="w-full h-full flex justify-center items-center md:text-xl">Langue</a>
                        <ul class="dropdown-content hidden absolute right-0 mt-2 py-2 bg-black border border-gray-200 rounded-lg">
                            <li><a href="?action=langue=francais" class="block px-4 py-2 text-gray-800">Français</a></li>
                            <li><a href="?action=langue=english" class="block px-4 py-2 text-gray-800">English</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <button onclick="toggleNav()" aria-label="toggle button" aria-expanded="false" id="menu-btn" class="cursor-pointer w-14 md:hidden">
                <img src="media/images/burger-menu-svgrepo-com.svg" alt="" />
            </button>
<?php
    if (isset($_SESSION['CONNECTER']) != "OK")
        {
           echo '<a href="?url=Connexion/PageConnexion" class="flex md:ml-10 md:mr-16">
                    <span id="logo" class="h-auto w-auto py-2 ">
                    <div class="flex flex-col items-center">
                    <img src="media/images/LogoConnexion.png" alt="Connexion" width="100" height="100">
                    </div>
                    <p class="font-Roboto font-extrabold text-center text-white bg-primary rounded-md px-2">Se Connecter</p>
                    </span> 
                </a>';
        } else {
            echo '<a href="?url=Connexion/Deconnexion" class="flex md:ml-10 md:mr-16">
                    <span id="logo" class="h-auto w-auto py-2 ">
                    <div class="flex flex-col items-center">
                    <img src="media/images/LogoDeconnexion.png" alt="Connexion" width="100" height="100">
                    </div>
                    <p class="font-Roboto font-extrabold text-center text-white bg-primary rounded-md px-2">Se Déconnecter</p>
                    </span> 
                </a>';
        }
?>

        </nav>
    </header>

    <!-- Conteneur du contenue principale -->
    <div class="w-full mt-48 pt-4 md:p-4">
        <main>
            <!-- Nom de l'entreprise 
            <div class="hidden md:flex md:bg-gray-300 md:py-2 md:text-center md:text-black md:w-2/5 md:h-14 md:justify-center md:items-center">
            <div class="bg-gray-300 inline-block px-4 py-2 rounded-md"> 
            <h1 class="text-2xl font-semibold">Le Bowling du Front de Mer</h1>
            <</div>
            </div> -->

            <section>
                <article>
                    <div id="message">
                        <?php $message = isset($message) ? $message : NULL; ?>
                    </div>
                    <div id="contenu">
                        <?= $contenu = isset($contenu) ? $contenu : NULL; ?>
                    </div>
                    <!-- Ne pas oublier de fermer la connection -->
                </article>
            </section>
        </main>
    </div>
<footer class="mt-auto py-6 bg-gray-300 flex items-center justify-evenly md:flex-row flex-col text-lg">
    <a class='pt-1' href="index.php?action=mention">Mention légales</a>
    <p class='pt-1'>&copy; Le Bowling du Front de Mer</p>
    <a class='pt-1' href="index.php?action=cookie">Cookies</a>
</footer>
</body>
</html>

<script>
    function toggleNav(){
        const toggleMenuBtn = document.querySelector("#menu-btn");
        const toggleMenuImg = document.querySelector("#menu-btn img");
        const toggledMenu = document.querySelector("#toggled-menu");
        // const menuLinks = document.querySelector("#main-nav ul a");

        // toggleMenuBtn.addEventListener("click", toggleNav);

        toggledMenu.classList.toggle("-translate-y-full")

        if(toggledMenu.classList.contains("-translate-y-full")) {
            toggleMenuImg.setAttribute("src", "./media/images/burger-menu-svgrepo-com.svg")
            toggleMenuBtn.setAttribute("aria-expanded", "false")
        } 
        else {
            toggleMenuImg.setAttribute("src", "./media/images/times-svgrepo-com.svg")
            toggleMenuBtn.setAttribute("aria-expanded", "true")
        }
    } 
</script>