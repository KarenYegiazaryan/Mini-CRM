After downloading the zip, you need to do the following steps

1.composer install 

2.cp .env.example .env
3.create a database and include the name in the .env
4.php artisan key:generate
5.php artisan db:seed --class=UsersTableSeeder
6.php artisan db:seed
7.php artisan storage:link
8.php artisan migrate
9.npm install
10.npm run dev
11.php artisan serve
