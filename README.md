# Module users
Gestione degli utenti, ruoli, permessi.

## Screenshots

![create_user](Resources\img\readme\create_user.jpg)
![set_password](Resources\img\readme\set_password.jpg)
![roles list](Resources\img\readme\roles_list.jpg)

## Aggiungere Modulo nella base
Dentro la cartella laravel/Modules

```bash
git submodule add https://github.com/laraxot/module_user_fila3.git User
```

## Verificare che il modulo sia attivo
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable User
```