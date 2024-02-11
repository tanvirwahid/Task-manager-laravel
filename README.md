A simple task management project where
1) There are two types of users. Managers and team members.
2) Managers can register themselves, create team members, create projects, create tasks under each project and assign those tasks to team members.
3) Team members can log in, see their tasks and change their status.

To run this project locally,
1) Clone the project.
2) Go to project directory and run 'cp .env.example .env'
3) Open .env and write database credentials.
4) Fill out these two entries in .env
   MANAGER_EMAIL=
   MANAGER_PASSWORD=
   This will be email and password of default manager.
5) Run 'composer install'
6) Run 'php artisan migrate' and 'php artisan db:seed'
7) Run 'npm install' and then 'npm run dev'
8) Open another terminal in project directory and run 'php artisan serve'
