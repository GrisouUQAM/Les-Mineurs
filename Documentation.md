**GRISOU - BASE DE DONNÉE**
=======================
Les mineurs - INM5001 - AUT13


Pré-requis
----------
Serveur LAMP, WAMP ou MAMP avec phpMyAdmin mais les commandes SQL peuvent être faites
manuellement avec le client mysql si vous êtes à l'aise avec celui-ci.

Base de données
---------------

Importer le wiki_contrib.sql dans phpMyAdmin.

Ajouter l'usager wikicontrib avec cette requete SQL:

    CREATE USER 'wikicontrib'@'localhost' IDENTIFIED BY 'wiki007';
    GRANT ALL PRIVILEGES ON wiki_contrib . * TO 'wikicontrib'@'localhost';
    FLUSH PRIVILEGES;

Classe ContributionInfo.php
-------------

**Description**

Sert à encapsuler les informations d'une contribution d'un utilisateur.

**Contient**

- userName : Le nom de l'utilisateur ayant fait la contribution.
- website : Le site web d'où provient la contribution.
- pagesId : L'identificateur de la page de la contribution.
- oldVersion : L'identificateur de la page avant la contribution.
- userVersion : L'identificateur de la révision de la page de la contribution.
- usertimestamp : Le moment où la contribution a été effectuée.
- userID : Le ID unique de l'utilisateur représenté dans la base de donnée.

Classe PostInfo.php
-------------

**Description**

Sert à encapsuler les informations d'un post d'un utilisateur.

**Contient**

- userName : Le nom de l'utilisateur ayant fait le post.
- website : Le site web d'où provient le post
- pagesId : L'identificateur de la page du post.
- revId : L'identificateur de la révision du post.
- userID : Le ID unique de l'utilisateur représenté dans la base de donnée.

Classe DBConnection.php
-------------
**Description**

Sert à créer un objet de type PDO de connection a la base de donnée.

**Utilisation**
Créer un objet et appeler la fonction createConnection() pour faire une connection à la base de donnée.
Exemple :

    $maConnectionALaBaseDeDonnee = createConnection();

On peut ensuite utilisé cette objet pour faire les requêtes dans la base de donnée et pour l'utilisation de la classe DBManagement.php.

Classe DBManagement.php
-------------
**Description**
Classe servant à faire la gestion, entrée et sortie de la base de données.

**Utilisation**
Méthode pour utilisation externe :

- insertUserIntoTable($usernameToInsert, $dataBase) : Insère un nouvel utilisateur dans la base de donnée s'il n'est pas déjà présent. Prend en paramètre le nom d'un utilisateur a insérer et un objet créé avec la fonction createConnection() de la classe DBConnection.
- retrieveUserID($username, $dataBase) : Retourne l'ID d'un utilisateur tel que représenté dans la base de donnée interne. Prend en paramètre le nom d'un utilisateur a insérer et un objet créé avec la fonction createConnection() de la classe DBConnection.
- insertContributionIntoTable($uneContrib, $dataBase) : Insère une contribution dans la base de donnée si elle n'est pas déjà présente. Prend en paramètre un objet de type ContributionInfo et un objet créé avec la fonction createConnection() de la classe DBConnection.
- insertPostIntoTable($unPost, $dataBase) : Insère un post dans la base de donnée s'il n'est pas déjà présent. Prend en paramètre un objet de type PostInfo et un objet créé avec la fonction createConnection() de la classe DBConnection.


Test Unitaire
-------------
**Instalation**

[PhpUnit][1]  (Ps: Installez [PEAR][3] avant).

Directement dans [PhpStorm][2].


**Utilisation**

Un [tutoriel][4] de tests phpUnit


  [1]: http://phpunit.de/manual/current/en/installation.html
  [2]: http://confluence.jetbrains.com/display/PhpStorm/PHPUnit+Installation+via+Composer+in+PhpStorm
  [3]: http://www.coolestguidesontheplanet.com/downtown/installing-pear-osx-109-mavericks-and-osx108107
  [4]: https://jtreminio.com/2013/03/unit-testing-tutorial-introduction-to-phpunit/
