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

Ajouter l’usager wikicontrib avec cette requete SQL:

    CREATE USER 'wikicontrib'@'localhost' IDENTIFIED BY 'wiki007';
    GRANT ALL PRIVILEGES ON wiki_contrib . * TO 'wikicontrib'@'localhost';
    FLUSH PRIVILEGES;

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