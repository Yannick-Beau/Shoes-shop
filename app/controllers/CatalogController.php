<?php

    class CatalogController
    {
        public function category( $routeVarInfos ) 
        {
            dump( $routeVarInfos );

            // L'id de la catégorie que je souhaite afficher est donc stocké dans
            // dump( $routeVarInfos['id'] );

            // On instancie notre model
            $category = new Category();

            // On appelle ensuite sa méthode find pour
            // récupérer la bonne catégorie (sous la forme d'un objet Category)
            $category = $category->find( $routeVarInfos['id'] );
            // dump( $category );
            // dump( $category->getName() );

            // On a aussi la méthode findAll pour récupérer toutes les catégories
            $category->findAll();

            // Je vais préparer un tableau des variables a transmettre à la vue
            // pour lui permettre de les afficher
            $viewVarsPofpof = [
                'category' => $category
            ];

            // Enfin je transmet ce tableau comme deuxième argument de show()
            $this->show( "product.list", $viewVarsPofpof );
        }

        public function brand( $routeVarInfos ) 
        {            
            $this->show( "product.list" );
        }

        public function type( $routeVarInfos ) 
        {
            $this->show( "product.list" );
        }

        public function product( $routeVarInfos ) 
        {
            $this->show( "product" );
        }

        // Cette méthode n'est appellée QUE par le controleur via ses propres méthodes
        // et jamais depuis l'exéterieur, on peut la définir comme private
        private function show( $viewName, $viewVars = [] ) 
        {
            global $router;

            // On peut vérifier les variables disponibles dans chaque vue
            // en faisant un dump de viewVars
            dump( $viewVars );
            
            // $viewVars est disponible dans chaque fichier de vue
            require_once __DIR__.'/../views/partials/header.tpl.php';
            require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
            require_once __DIR__.'/../views/partials/footer.tpl.php';
        }
    }