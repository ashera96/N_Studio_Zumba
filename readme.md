##  Introduction
This is a web application for N Studio Zumba, which is a women's only zumba fitness center

The technology stack used for the development of the system are given below.

1. Laravel
2. XAMPP
3. HTML, CSS, JS, jQuery


##  Installation
1. Clone to your server root `git clone https://github.com/ashera96/N_Studio_Zumba.git`
2. Run `composer install` to install all dependencies
3. Create .env in application root `touch .env`
4. Add your database details & optional sentry DNS
```
DB_HOST= [HOST]
DB_DATABASE=[DBHOST]
DB_USERNAME=[USERNAME]
DB_PASSWORD= [PASSWORD]
SENTRY_DSN= [SENTRYDNS]
```
5. Run `php artisan key:generate` to generate key
6. Run `php artisan migrate --seed` to install the database & required data
7. All done!
```