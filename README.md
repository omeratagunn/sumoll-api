#Sumoll-Api light

Clone this repository 

- Requirements
`php >= 8.0`,
``composer install``

Note : strict type declarations 1

Deep note : if you can do sumoll, you can do faster.

#Setup

````
Preferred sql mysql/mariadb ( flexible, up to you to add new db class )
Preferred noSql Redis ( flexible, up to you to add new nosql class )

import sumoll_dummy.sql from storage/database into your database

Take a look at bootstrap folder, if you have anything more to add or remove, go on.

Config/Config.php is your guy. You can also create your own Config class or even different config for each repository.

Router/Router is your man to point your own freshly created controllers

Run current tests, be sure things are fine.

php -S localhost:8000

call on browser localhost:8000/index

Now start developing your api application. Enjoy!

````

#License
Published under the MIT License
