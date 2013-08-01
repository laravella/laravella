Laravella 
==========

Laravel 4 starter project.  Hit the ground running with the most useful packages installed and integrated.

Included
-------------------
###cborgia/radiate
HTML5 Boiler Plate, Twitter Bootstrap, Font Awesome, SASS, and a quick little login/register script to get you started.

###laravella/ravel
CMS built with Angular.js but using the Twitter Bootstrap style. Forked from raftalks\ravel.

###laravella/crud
Database Create, Read, Update, Delete package.  laravella/crud also makes provision for custom views and and AJAX friendly api so that you can basically achieve anything you want with it.

###laravella/cms
A content management system and blog built on crud.

Quick start guide
-------------------
1. **Download** the laravella project (Git clone or zip extract)
2. **Run : composer update** (or : php composer.phar update)
3. You should have a database server running and a target database created.
4. **Edit database details** in /app/config/database.php.
5. **Add providers** in /app/config/app.php : 
> `'providers' => array(...` <br />
> `'Laravella\Ravel\RavelServiceProvider',` <br />
> `'Laravella\Crud\CrudServiceProvider')`
6. **Initialize the database** with php artisan ravel:install
7. You can start a development server with : `php artisan serve --port 80` from the command line
8. **Generate metadata** by browsing to <http://localhost/dbinstall/install>
9. Browse to :
> <http://localhost> for the frontent <br />
> <http://localhost/admin> for cms console <br />
> <http://localhost/db> for crud console 

License
-------------------
http://opensource.org/licenses/MIT

What's new
-------------------
4.1.004
