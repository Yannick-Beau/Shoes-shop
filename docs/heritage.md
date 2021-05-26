
```php

class Animal
{
    public $id;
    public $name;
    public $color;
    public $race;

    public function manger() { /* TODO */ }
}

class Dog extends Animal
{
    // Automatiquement ces propriétés sont héritées
    // de la classe Animal (grace a extends)
    // public $id;
    // public $name;
    // public $color;
    // public $race;

    public $barkType;

    // Hérite également de la méthode manger() de Animal
}

class Pug extends Dog
{
    // Automatiquement ces propriétés sont héritées
    // de la classe Dog (grace a extends)
    // public $barkType;

    // Mais elle hérite aussi des propriétées héritées
    // de son parent
    // public $id;
    // public $name;
    // public $color;
    // public $race;

    // Hérite également de la méthode manger() de Animal

    // Il a aussi ses spécificités
    public $prognathe;
}

class Cat extends Animal
{
    // Automatiquement ces propriétés sont héritées
    // de la classe Animal (grace a extends)
    // public $id;
    // public $name;
    // public $color;
    // public $race;

    public $ronronStrength;
}

class Pig extends Animal
{
    // Automatiquement ces propriétés sont héritées
    // de la classe Animal (grace a extends)
    // public $id;
    // public $name;
    // public $color;
    // public $race;

    public $gruik;
}



```