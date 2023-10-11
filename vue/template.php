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
    <header>
        <!-- Logo -->
        <div class="logo">
            <img src="logo.png" alt="Your Logo" width="100">
        </div>
        
        <!-- Nom de l'entreprise -->
        <div class="bg-gray-300 py-2 text-center text-black">
            <div class="bg-gray-300 inline-block px-4 py-2 rounded-md">
                <h1 class="text-2xl font-semibold">Le Nom de Votre Entreprise</h1>
            </div>
        </div>

        <!-- Bar de navigation -->
        <nav class="bg-red-600 container mx-auto">
            <div class="py-4 flex justify-center items-center">
                <ul class="flex space-x-4 text-black">
                    <li class="nav-item"><a href="index.php">Accueil</a></li>
                    <li class="nav-item"><a href="#action?reserver">Réserver</a></li>
                    <li class="nav-item"><a href="?action=contacter">Nous Contacter</a></li>
                    <li class="nav-item"><a href="#action?client">Espace Client</a></li>
                    <li class="nav-item group relative">
                        <!-- Menu déroulant Langue -->
                        <a href="#action?" class="group-hover:text-gray-300">Langue</a>
                        <ul class="dropdown-content hidden absolute right-0 mt-2 py-2 bg-black border border-gray-200 rounded-lg">
                            <li><a href="#action?langue=francais" class="block px-4 py-2 text-gray-800">Français</a></li>
                            <li><a href="#action?langue=english" class="block px-4 py-2 text-gray-800">English</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Conteneur du contenue principale -->
    <!-- <div class="main-content mx-auto mt-8 p-4"> -->
    <div class="w-full mt-8 p-4">
        <main>
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