**GRISOU - BASE DE DONNÉES**
=======================
Les mineurs - INM5001 - AUT13


Prérequis
----------
Serveur LAMP, WAMP ou MAMP avec phpMyAdmin, mais les commandes SQL peuvent être faites
manuellement avec le client mysql si vous êtes à l'aise avec celui-ci.

Base de données
---------------

Importez le fichier wiki_contrib.sql dans phpMyAdmin.

Ajouter l'usager wikicontrib avec cette requete SQL:

    CREATE USER 'wikicontrib'@'localhost' IDENTIFIED BY 'wiki007';
    GRANT ALL PRIVILEGES ON wiki_contrib . * TO 'wikicontrib'@'localhost';
    FLUSH PRIVILEGES;

Classe ContributionInfo.php
-------------

**Description**

Sers à encapsuler les informations d'une contribution d'un utilisateur.

**Contient**

- userName : Le nom de l'utilisateur ayant fait la contribution.
- website : Le site web d'où provient la contribution.
- pagesId : L'identificateur de la page de la contribution.
- oldVersion : L'identificateur de la page avant la contribution.
- userVersion : L'identificateur de la révision de la page de la contribution.
- usertimestamp : Le moment où la contribution a été effectuée.
- userID : Le ID unique de l'utilisateur représenté dans la base de données.

Classe PostInfo.php
-------------

**Description**

Sers à encapsuler les informations d'un post d'un utilisateur.

**Contient**

- userName : Le nom de l'utilisateur ayant fait le post.
- website : Le site web d'où provient le post
- pagesId : L'identificateur de la page du post.
- revId : L'identificateur de la révision du post.
- userID : Le ID unique de l'utilisateur représenté dans la base de données.

Classe DBConnection.php
-------------
**Description**

Sers à créer un objet de type PDO de connexion à la base de données.

**Utilisation**
Créer un objet et appeler la fonction createConnection() pour faire une connexion à la base de données.
Exemple :

    $maConnectionALaBaseDeDonnee = createConnection();

On peut ensuite utiliser cet objet pour faire les requêtes dans la base de données et pour l'utilisation de la classe DBManagement.php.

Classe DBManagement.php
-------------
**Description**
Classe servant à faire la gestion, entrée et sortie de la base de données.

**Utilisation**
Méthode pour usage externe :

- **insertUserIntoTable($usernameToInsert, $dataBase)** : Insère un nouvel utilisateur dans la base de données s'il n'est pas déjà présent. Prends en paramètre le nom d'un utilisateur à insérer et un objet créé avec la fonction createConnection() de la classe DBConnection.
- **retrieveUserID($username, $dataBase)** : Retourne l'ID d'un utilisateur tel que représenté dans la base de données interne. Prends en paramètre le nom d'un utilisateur à insérer et un objet créé avec la fonction createConnection() de la classe DBConnection.
- **insertContributionIntoTable($uneContrib, $dataBase)** : Insère une contribution dans la base de données si elle n'est pas déjà présente. Prends en paramètre un objet de type ContributionInfo et un objet créé avec la fonction createConnection() de la classe DBConnection.
- **insertPostIntoTable($unPost, $dataBase)** : Insère un post dans la base de données s'il n'est pas déjà présent. Prends en paramètre un objet de type PostInfo et un objet créé avec la fonction createConnection() de la classe DBConnection.


Test Unitaire
-------------
**Présenation**

Dans le dossier test se trouve de quoi tester les methodes de la classe DBManagement

**Instalation**

PhpUnit et DBUnit **sont installé dans le Repo**
(PhpStorm le détecte automatiquement)

Si ce n'est plus/pas le cas:

- Pour l'instaler dans un repo par phpStorm, [ici][2].
- Ou sur toute votre machine [PhpUnit][1] 



**Utilisation**

Importez le fichier **wiki_contrib_test.sql** dans phpMyAdmin. Pour crée la BD de test.


* Méthodes de DBManagmentTest.php :

	>**getConnection()** 
	
    - crée la connexion avec la base de donnée de test


	>**getDataSet()**
 
	 - vide la BD de test (truncate), et lui insère les données spécifié dans *./dataSets/wikiTable.xml*
  
	>**test....()**
	
	- Un test unitaire. Doit commencer par *test*

	>**getSetUpOperation()**
	
	- résout un problème apparut depuis MySql 5.5, utilise *PHPUnit_Extensions_Database_Operation_MySQL55Truncate.php*


* Pour plus d'information, lisez la documentation de [phpUnit][4] sur les tests de bases de données


  [1]: http://phpunit.de/manual/current/en/installation.html
  [2]: http://confluence.jetbrains.com/display/PhpStorm/PHPUnit+Installation+via+Composer+in+PhpStorm
  [3]: http://www.coolestguidesontheplanet.com/downtown/installing-pear-osx-109-mavericks-and-osx108107
  [4]: http://phpunit.de/manual/3.8/fr/database.html
