<?php

    class MainController
    {
        // On créé une propriété qui va nous permettre de stocker
        // pour toute la classe, les variables communes a toutes nos pages
        private $commonViewVars = [];

        public function __construct()
        {
            // Dans notre constructeur de notre controlleur
            // On va récupérer toutes les données qui sont COMMUNES
            // a toutes nos pages (en tout cas a nos pages gérées par ce controleur)
            
            // Les 5 marques du footer
            $brandModel = new Brand();
            $footerBrands = $brandModel->findForFooter();

            // Les 5 types de produit du footer
            $typeModel = new Type();
            $footerTypes = $typeModel->findForFooter();

            // dump( $footerBrands );
            // dump( $footerTypes );
            
            // Je stocke la liste des 5 types dans mon tableau
            // qui contient les variables communes à toutes mes pages
            // Je créé pour ça une nouvelle clé "footerTypes" dans ce tableau
            $this->commonViewVars['footerTypes'] = $footerTypes;

            // Je fais pareil pour les 5 marques
            $this->commonViewVars['footerBrands'] = $footerBrands;
        }

        public function home() 
        {
            $this->show( "home" );
        }

        public function legal() 
        {
            $this->show( "legal" );
        }

        // Cette méthode n'est appellée QUE par le controleur via ses propres méthodes
        // et jamais depuis l'exéterieur, on peut la définir comme private
        private function show( $viewName, $viewVars = [] ) 
        {
            global $router;

            dump( $this->commonViewVars );

            // $viewVars est disponible dans chaque fichier de vue
            require_once __DIR__.'/../views/partials/header.tpl.php';
            require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
            require_once __DIR__.'/../views/partials/footer.tpl.php';
        }
    }