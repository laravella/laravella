Laravella 
==========

Laravel 4 Admin console, CMS and starter project.  Hit the ground running with the most useful packages installed and integrated.

Github
-------------------
+ [Project Home](https://github.com/laravella/laravella)
+ [Documentation](http://laravella.github.io/docs/)
+ [Download](https://github.com/laravella/laravella/archive/master.zip) 
+ [Issues and Questions](https://github.com/laravella/laravella/issues)
+ [Wiki] (https://github.com/laravella/laravella/wiki)

Included
-------------------
###cborgia/radiate
HTML5 Boiler Plate, Twitter Bootstrap, Font Awesome, SASS, and a quick little login/register script to get you started.

###laravella/crud
Database Create, Read, Update, Delete package.  laravella/crud also makes provision for custom views and and AJAX friendly api so that you can basically achieve anything you want with it, above and beyond CRUD.

###laravella/cart
A demo shopping cart built on laravella/crud (just an example project).

###laravella/package
A starter package for laravel. Includes a facade, artisan commands, IoC class, migrations and database seed examples.

###laravella/cms
A content management system and blog built on crud.

###laravella/uploader
A sweet file uploader from [blueimp](https://github.com/blueimp/jQuery-File-Upload) packaged for laravel and integrated into Laravella/CMS.

Screenshots
-------------------
<a href="http://laravella.github.io/docs/images/large-upload.png"><img alt="File Uploads" src="http://laravella.github.io/docs/images/large-upload.png" title="File Uploads" style="border:5px solid #f0e0d0; width: 640px" /></a>

<a href="http://laravella.github.io/docs/images/large-menu-permissions.png"><img alt="Menu Permissions" src="http://laravella.github.io/docs/images/large-menu-permissions.png" title="Menu Permissions" style="border:5px solid #f0e0d0; width: 640px" /></a>


Quick start guide
-------------------
1. **Download** the laravella project (Git clone or zip extract)
2. **Run : composer update** (or : php composer.phar update)
3. You should have a database server running and a target database created.
4. **Edit database details** in /app/config/database.php.
5. **Add providers** in /app/config/app.php : 
> `'providers' => array(...` <br />
> `'Laravella\Laravella\LaravellaServiceProvider',` <br />
> `'Laravella\Crud\CrudServiceProvider',` <br />
> `'Laravella\CMS\CMSServiceProvider',` <br />
> `'Laravella\Uploader\UploaderServiceProvider')`
6. **Install with : ** with `php artisan laravella:install`
7. You can start a development server with : `php artisan serve --port 80` from the command line
8. Browse to :
> <http://localhost> for the frontend <br />
> <http://localhost/admin> for crud console  <br />
> Default username is **superadmin@yourwebsite.com** and password is **ravel**
9. Run `php artisan crud:install` again to regenerate meta data after you've added or altered tables.

API Docs
-------------------
+ Laravella
+ [Cart](apidocs/cart/index.html)
+ [Crud](apidocs/crud/index.html)
+ CMS
+ Package
+ Uploader

License
-------------------
<http://opensource.org/licenses/MIT>

What's new
-------------------
4.1.009 <br />
Ravel replaced with CMS

4.1.008 <br />
File uploader included

4.1.007 <br />
Options and option categories

4.1.006 <br />
dynamic menus
