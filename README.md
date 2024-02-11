A simple task management project where
1) There are two types of users. Managers and team members.
2) Managers can register themselves, create team members, create projects, create tasks under each project and assign those tasks to team members.
3) Team members can log in, see their tasks and change their status.

To run this project locally,
Make sure you have node and npm installed
1) Clone the project.
2) Go to project directory and run 'cp .env.example .env'.
3) Open .env and fill out database credentials. For example
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
4) Fill out these two entries in .env
   MANAGER_EMAIL=
   MANAGER_PASSWORD=
   This will be email and password for default manager. you can delete them from .env after running database seeders.
5) Run 'composer install'.
6) Run 'php artisan migrate' and 'php artisan db:seed'.
7) Run 'npm install' and then 'npm run dev'.
8) Open another terminal in project directory and run 'php artisan serve'.
