**Laravel Version: 10.0**

**PHP Version: 8+**

**Database: MySQL**


Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations and seeds (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Run the Swapi Fetch

    php artisan schedule:run

OR

    php artisan data:check

Run the Queues

    php artisan queue:work

Run the UnitTest for the application

    php artisan test

Start the local development server

    php artisan serve

Postman Documentation URL: https://documenter.getpostman.com/view/19174482/2s93RMVbL4

**Important Note:** You need to change the environment epigrian_api_url value via Postman according to your own project's link and you need to set the "QUEUE_CONNECTION" value in the .env file to "database".
# epigrian
