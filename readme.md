### simple laravel football team project

this project is about a football team structure in laravel
with a big seeder(2000 teams and 44000 players)

#### features

- get teams with players
- search in team
- search in players
- register

##### jwt

- login
- admin can update team
- admin can update player
- admin can get one team with players

#### installation

```
php artisan migrate
php artisan db:seed --class=TeamsTableSeeder //it will take some minutes
php artisan jwt:secret

```

`if you get some errors, please make a new issue`