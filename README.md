# kambban_developer
Proyecto foro kammban para developers

--------------------------------------------------------

Comandos para back

Crear un archivo .env y copiar el contenido del archivo .env.example y modificar las variables de DB con sus respectivos parámetros de conexión
Crear la base de datos para este proyecto con charset: UTF-8 collation: general_ci
Correr los siguientes comandos:

composer install
php artisan migrate
php artisan db:seed
php artisan passport:install
php artisan key:generate

Iniciar el servirdor:

php artisan serve

Comandos recomendados:

composer dump-autoload
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan optimize
php artisan module:optimize
php artisan migrate:reset
php artisan migrate --seed
php artisan optimize:clear

-------------------------------------------------------------------------------------------

Comandos para front 

This project was bootstrapped with Create React App.

Available Scripts
In the project directory, you can run:

npm start or yarn start

Runs the app in development mode.
Open http://localhost:3000 to view it in the browser.
The page will automatically reload if you make changes to the code.
You will see the build errors and lint warnings in the console.




npm test or yarn test

Runs the test watcher in an interactive mode.
By default, runs tests related to files changed since the last commit.
Read more about testing.

npm run build or yarn build

Builds the app for production to the build folder.
It correctly bundles React in production mode and optimizes the build for the best performance.
The build is minified and the filenames include the hashes.
Your app is ready to be deployed.

User Guide
You can find detailed instructions on using Create React App and many tips in its documentation.