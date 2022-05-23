## Task Order Api
The app is implementation of a task schema knows as Freight Forwarding(One or more tasks need to be done before proceeding the others). A simple laravel api uses some of its features like model, controller, service layer, validation by form requests, database seeding.

### Installation
Clone the project

Copy .env.example and rename it as .env

Go to directory of project

Run
```
$ composer install
```
to install dependencies

Run
```
$ php artisan key:generate
```

You should run
```
$ php artisan migrate
```
to create database table

optional
```
$ php artisan db:seed
```
to seed the database with related entries.

### To Run The App


```
$ php artisan serve
```

### Endpoints

postman collection is available at the root directory of the project as 
"forwardie_yunus.postman_collection.json"

or check api.php


