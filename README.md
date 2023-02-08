# Color picker

Make sure to have installed:
- Composer
- SymfonyCLI
- MySQL
- PHP
- NodeJs
- NPM

To run the client:
````
cd client
npm run i
npm run dev
````

To run the server:
````
cd server
composer install
````
Adjust the `DATABASE_URL` in the .env file in the server folder.

Then run: 
````
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
symfony server:start
````
 
Have fun!
