# salon_b

## Description
Mon projet symfony permet à la gérante et à l'administrateur de voir la liste des utilisateurs, le profil du salon, les chiffres d'affaires du salon
et de rajouter le mois précédent, les chiffres d'affaires par région et par département, les moyennes et sommes des chiffres d'affaires du salon, des concurrents
par département et région. Ces montants peuvent être modifiés et les calculs de moyennes et de sommes s'actualisent.

## Exigences
- PHP 8 ou supérieur
- Symfony 6 ou supérieur
- Composer

## Installation
1. Clonez ce dépôt sur votre machine locale :
   ```shell
   git clone https://github.com/wendy1976/salon_b.git
2.Accédez au répertoire du projet :
  cd salon_b
3. Installez les dépendances PHP en utilisant Composer :
  composer install
4.Configurez votre base de données dans le fichier .env et exécutez les migrations :
  php bin/console doctrine:migrations:migrate
5. Lancez le serveur de développement Symfony :
  symfony server:start
6.Accédez à l'application dans votre navigateur à l'adresse http://localhost:8000.  
  
