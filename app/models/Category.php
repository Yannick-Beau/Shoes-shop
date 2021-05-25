<?php
    // Dans le cadre de la méthode Active Record :
    //  - Un classe = Une entité dans le MCD = Une table en DB
    //  - Une propriété de cette classe = un champ de cette table
    //  - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

    // Nom de la classe = Nom de la table (sans les maj)
    class Category 
    {
        // Propriétés (=> champs de la table)
        private $id;
        private $name;
        private $subtitle;
        private $picture;
        private $home_order;
        private $created_at;
        private $updated_at;

        // Méthodes (vont interagir avec la DB)
        public function find( $id )
        {
            // Récupérer la catégorie #x
            // sous la forme d'objet Category

            // Etape 1 : on récupère la connexion à la DB
            $pdo = Database::getPDO();

            // Je récupère l'objet PDO (comme en S4)
            // dump( $pdo );

            // Etape 2 : La requete SQL
            $sql = "SELECT * FROM `category` WHERE `id` = $id";

            // Etape 3 : On utilise l'objet PDO pour executer la requete
            $statement = $pdo->query( $sql );
            // dump( $statement );

            // Etape 4 : on fetch le(s) résultat(s)
            $result = $statement->fetchObject( "Category" );
            // Grace a PDO et fetchObject(), $result sera un objet
            // de type Category, avec des propriétés automatiquement
            // renseignées par PDO pour correspondre aux valeurs
            // récupèrées par la requete SQL (et donc en BDD)
            dump( $result );

            // Etape 5 : On renvoi le résultat
            return $result;
        }

        public function findAll()
        {
            // Récupérer toutes les catégories
            // sous la forme d'un tableau d'objets Category

            // Etape 1 : on récupère la connexion à la DB
            $pdo = Database::getPDO();

            // Je récupère l'objet PDO (comme en S4)
            // dump( $pdo );

            // Etape 2 : La requete SQL
            $sql = "SELECT * FROM `category`";

            // Etape 3 : On utilise l'objet PDO pour executer la requete
            $statement = $pdo->query( $sql );
            // dump( $statement );

            // Etape 4 : on fetch le(s) résultat(s)
            $results = $statement->fetchAll( PDO::FETCH_CLASS, "Category" );

            // Grace a PDO et fetchObject(), $results sera un tableau d'objets
            // de type Category, avec des propriétés automatiquement
            // renseignées par PDO pour correspondre aux valeurs
            // récupèrées par la requete SQL (et donc en BDD)
            dump( $results );

            // Etape 5 : On renvoi le résultat
            return $results;
        }

        /**
         * Get the value of updated_at
         */ 
        public function getUpdatedAt()
        {
            return $this->updated_at;
        }

        /**
         * Get the value of created_at
         */ 
        public function getCreatedAt()
        {
            return $this->created_at;
        }

        /**
         * Get the value of home_order
         */ 
        public function getHome_order()
        {
            return $this->home_order;
        }

        /**
         * Get the value of picture
         */ 
        public function getPicture()
        {
            return $this->picture;
        }

        /**
         * Get the value of subtitle
         */ 
        public function getSubtitle()
        {
            return $this->subtitle;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }
    }