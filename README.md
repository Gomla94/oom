# PROMOCLICKS

#### Installation

- clone all repository files by running this command : 

```php

git clone https://github.com/osclancer/promoclicks [project_name]

```
> Replace `project_name` with your project name you choose

and then `cd [project_name]`

- Download all vendors and missing laravel files by running the following command:

```php

    composer install

```

- Clone `.env` file `cp .env-example .env`

- in `.env` file change database credintials and run migrate :

`php artisan migrate --seed`

- To open the project run artisan `php artisan serve` and go to login page `http://localhost:8000/admin/login`
- login by :
    - email: `admin@admin.com`.
    - password : `123456`.

`Goodluck` 