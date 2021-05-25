<?php
    // Dans le cadre de la méthode Active Record :
    //  - Un classe = Une entité dans le MCD = Une table en DB
    //  - Une propriété de cette classe = un champ de cette table
    //  - Un objet instancié de cette classe = une ligne dans la table (un enregistrement)

    // Nom de la classe = Nom de la table (sans les maj)
    class Brand 
    {
        // Propriétés (=> champs de la table)
        private $id;
        private $name;
        private $footer_order;
        private $created_at;
        private $updated_at;
    }