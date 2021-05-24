<?php

    class CatalogController
    {
        public function category( $routeVarInfos ) 
        {
            dump( $routeVarInfos );

            // L'id de la catégorie que je souhaite afficher est donc stocké dans
            dump( $routeVarInfos['id'] );

            $this->show( "product.list" );
        }

        public function type ( $routeVarInfos ) 
        {
            $this->show( "product.list" );
        }

        public function mark ( $routeVarInfos )
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
            // $viewVars est disponible dans chaque fichier de vue
            require_once __DIR__.'/../views/partials/header.tpl.php';
            require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
            require_once __DIR__.'/../views/partials/footer.tpl.php';
        }
    }