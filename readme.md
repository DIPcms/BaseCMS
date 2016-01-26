DIP BaseCms
=============



How to install
--------------

```sh
$ composer create-project dipcms/basecms my_project_name
```
How to use [composer?](https://getcomposer.org/doc/00-intro.md)



Create a database called "sandmin" database settings can be changed in the app/config/config.neon <br />
How to use [doctrine?](https://github.com/Kdyby/Doctrine/blob/master/docs/en/index.md)

```yaml
    doctrine:
        user: root
        password: 
        dbname: cms
        metadata:
            App: %appDir%
```


Migrate database tables.
How to use [migrations?](https://github.com/Zenify/DoctrineMigrations)

```sh
$ cd my_project_name
$ php www/index.php migrations:migrate
```
Setting apache folder  my_project_name/www/




