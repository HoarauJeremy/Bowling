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
    
    <style>
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
    </style>

</head>
<body>
<header class="bg-background z-50 fixed top-0 w-full shadow md:h-auto">
       <!-- Bar de navigation -->
        <!-- <nav class="bg-red-600 container mx-auto"> -->
        <nav class="bg-accent md:bg-transparent w-full font-Roboto p-6 md:p-0 flex items-center justify-between">
            <!-- <div class="md:w-full md:flex md:h-28 md:items-center"> -->
                <!-- Logo -->
                <a href="index.php" class="flex md:ml-10 md:mr-16">
                    <span id="logo" class="h-auto w-auto">
                        <img src="media/images/LogoBowling.png" alt="Your Logo" width="120" height="120">
                    </span> 
                </a>
                
            <!-- </div> -->
            
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
                        <a href="#action?accueil" class="w-full h-full flex justify-center items-center md:text-xl">Accueil</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="#action?reserver" class="w-full h-full flex justify-center items-center md:text-xl">Réserver</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="?action=contacter" class="w-full h-full flex justify-center items-center md:text-xl">Nous Contacter</a>
                    </li>

                    <li id="nav-item" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0
                    border-r border-black ">
                        <a href="#action?client" class="w-full h-full flex justify-center items-center md:text-xl">Espace Client</a>
                    </li>
            
                    <!-- Menu déroulant Langue -->
                    <li id="nav-item group relative" class="py-4 bg-primary mx-auto rounded-md w-11/12 mt-8 md:w-full md:h-full md:rounded-none md:py-0 md:mt-0">
                        <a href="#action?" id="group-hover:text-gray-300" class="w-full h-full flex justify-center items-center md:text-xl">Langue</a>
                        <ul class="dropdown-content hidden absolute right-0 mt-2 py-2 bg-black border border-gray-200 rounded-lg">
                            <li><a href="#action?langue=francais" class="block px-4 py-2 text-gray-800">Français</a></li>
                            <li><a href="#action?langue=english" class="block px-4 py-2 text-gray-800">English</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="bg-lime-500 w-28 h-3">
            
            </div>

            <button onclick="toggleNav()" aria-label="toggle button" aria-expanded="false" id="menu-btn" class="cursor-pointer w-14 md:hidden">
                <img src="media/images/burger-menu-svgrepo-com.svg" alt="" />
            </button>

        </nav>
    </header>

    <!-- Conteneur du contenue principale -->
    <!-- <div class="main-content mx-auto mt-8 p-4"> -->
    <div class="w-full mt-8 p-4">
        <main>

            <!-- Nom de l'entreprise -->
            <div class="hidden md:flex md:bg-gray-300 md:py-2 md:text-center md:text-black md:w-2/5 md:h-14 md:justify-center md:items-center">
            <!-- <div class="bg-gray-300 inline-block px-4 py-2 rounded-md"> -->
            <h1 class="text-2xl font-semibold">Le Bowling du Front de Mer</h1>
            <!-- </div> -->
            </div>

            <section>
                <article>
                    <div id="message">
                        <?= $message = isset($message) ? $message : NULL; ?>
                    </div>
                    <div id="contenu">
                        <?= $contenu = isset($contenu) ? $contenu : NULL; ?>
                    </div>
                </article>
            </section>
        </main>
    </div>

    <footer class="text-center py-4 bg-gray-300">
        <p>&copy; 2023 Le Nom de Votre Site Web</p>
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