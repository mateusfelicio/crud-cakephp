## Execute the Mateus's App

This project was created with the objective for demonstrate a crud in CakePhp Framework. The docker-compose database credentials and configurations below presented is not recommended in a real project.

- git clone the project;

- Go to project folder `/docker` and start the docker containers
```bash
docker composer up
```

- Create the file `config/app_local.php` copying the ``config/app_local.example.php`

- Set the database configsconfig database at `config/app_local.php` in the `'Datasources'` place with the configs below:
```php
    'Datasources' => [
        'default' => [
            'host' => 'base-mysql',
            'username' => 'base_user',
            'password' => 'Jun4ZMJIamn2',
            'database' => 'base',
            'url' => env('DATABASE_URL', null),
        ],

        'test' => [
            'host' => 'base-mysql',
            'username' => 'base_user',
            'password' => 'Jun4ZMJIamn2',
            'database' => 'test',
            'url' => env('DATABASE_URL', null),
        ],
    ],
```

- In another cmd execute the migrations
```bash
docker exec -it base-app composer install
```
```bash
docker exec -it base-app bin/cake migrations migrate
```
```bash
docker exec -it base-app bin/cake migrations migrate --connection test
```

- To execute the tests
```bash
docker exec -it base-app vendor/bin/phpunit
```

- Access the project in localhost [CRUDstore](http://localhost:8084)
