<?php

Route::filter('frontfilter', function($route)
{
    if (Request::segment(1) == 'en' && Request::segment(2) == 'list')
    {
        return View::make(Options::get('skin').'.default');
    } else {
        return Redirect::to('/account/login');
    }
});

Route::when('en/*', 'frontfilter'); //guest use i.e. front end

Route::controller('en', 'PageController');
Route::controller('/', 'PageController');

?>