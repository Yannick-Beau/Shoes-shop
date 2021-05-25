<?php

require_once __DIR__ . "/../models/Type.php";

    class MainController
    {
        public function home() 
        {
            $this->show( "home" );
        }

        public function legal() 
        {
            $this->show( "legal" );
        }

        public function test($routeVarInfos) 
        {

            // On instancie notre model
            $brand = new Type();

            // On appelle ensuite sa méthode find pour
            // récupérer la bonne catégorie (sous la forme d'un objet Category)
            $brand = $brand->find( $routeVarInfos['id'] );
            // dump( $category );
            // dump( $category->getName() );

            // On a aussi la méthode findAll pour récupérer toutes les catégories
            $brand->findAll();

            $brand->findFooter_order();

            // Je vais préparer un tableau des variables a transmettre à la vue
            // pour lui permettre de les afficher
            $viewVarsPofpof = [
                'category' => $brand
            ];

            // Enfin je transmet ce tableau comme deuxième argument de show()
            $this->show( "test", $viewVarsPofpof );
        }

        // Cette méthode n'est appellée QUE par le controleur via ses propres méthodes
        // et jamais depuis l'exéterieur, on peut la définir comme private
        private function show( $viewName, $viewVars = [] ) 
        {
            global $router;

            // $viewVars est disponible dans chaque fichier de vue
            require_once __DIR__.'/../views/partials/header.tpl.php';
            require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
            require_once __DIR__.'/../views/partials/footer.tpl.php';
        }
    }