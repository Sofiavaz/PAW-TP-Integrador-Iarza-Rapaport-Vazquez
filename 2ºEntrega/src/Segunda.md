## Proyecto final PAW UNLU 2020

### Acerca del tp


### Integrantes
Alumnos: ...

#### Instalación

- Descargar XAMPP para Windows: https://sourceforge.net/projects/xampp/files/latest/download

- Crear base de datos llamada ```dashcourse-testing``` (utf8mb4_general_ci)

- Descargar Composer: https://getcomposer.org/Composer-Setup.exe

Instalar dependencias:

```
composer install
```

Renombrar el archivo de configuración:

```
copy .env.example .env
```

Modificar el archivo de configuración ```.env``` con los parámetros adecuados para la conexión a la base de datos 
creada en el segundo paso (usuario ```root``` por defecto y contraseña en blanco). 


Generar la clave:

```php
php artisan key:generate
```

Migrar BD:

```php
php artisan migrate
```

Correr los seeders:

```php
php artisan db:seed
```

Levantar el servidor:

```php
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
