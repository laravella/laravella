<?php

/**
 * show index page
 */
Route::get('/', function()
        {


            $features = DB::table('contents')
                    ->join('category_content', 'contents.id', '=', 'category_content.content_id')
                    ->join('categories', 'category_content.category_id', '=', 'categories.id')
                    ->select('categories.name', 'contents.title', 'contents.content', 'contents.excerpt')
                    ->where('categories.name', 'Feature')
                    ->take(1)
                    ->get();

            $sectors = DB::table('contents')
                    ->join('category_content', 'contents.id', '=', 'category_content.content_id')
                    ->join('categories', 'category_content.category_id', '=', 'categories.id')
                    ->select('categories.name', 'contents.title', 'contents.id', 'contents.content', 'contents.excerpt')
                    ->where('categories.name', 'Sectors')
                    ->get();

//first three news articles
            $posts = DB::table('contents')->where('content_type', 'post')->take(3)->get();

            $content = DB::table('contents')->where('slug', 'home')->first();
            return View::make('home.index')
                            ->with('posts', $posts)
                            ->with('content', $content)
                            ->with('features', $features)
                            ->with('sectors', $sectors)
                            ->with('search', '');
        });

Route::get('/query', function()
        {
            $get = Input::get('q');
            if (!empty($get))
            {
                return Redirect::to("/search/$get");
            }
        });

Route::get('/search/{searchPhrase}', 'SearchController@search');

Route::get('/post/{postId}', function($id)
        {


            $features = DB::table('contents')
                    ->join('category_content', 'contents.id', '=', 'category_content.content_id')
                    ->join('categories', 'category_content.category_id', '=', 'categories.id')
                    ->select('categories.name', 'contents.title', 'contents.content', 'contents.excerpt')
                    ->where('categories.name', 'Feature')
                    ->take(1)
                    ->get();

            $sectors = DB::table('contents')
                    ->join('category_content', 'contents.id', '=', 'category_content.content_id')
                    ->join('categories', 'category_content.category_id', '=', 'categories.id')
                    ->select('categories.name', 'contents.title', 'contents.id', 'contents.content', 'contents.excerpt')
                    ->where('categories.name', 'Sectors')
                    ->get();

//first three news articles
            $posts = DB::table('contents')->where('content_type', 'post')->take(3)->get();

            $content = DB::table('contents')->where('id', $id)->first();
            
            return View::make('page.index')
                            ->with('posts', $posts)
                            ->with('content', $content)
                            ->with('features', $features)
                            ->with('sectors', $sectors)
                            ->with('search', '');
        });

/**
 * All pages go through this route, except the home page
 * Slug is a machine friendly version of the page title e.g. The Page Title = the-page-title
 */
Route::controller('/page/{pageSlug}', 'PageController');

Route::controller('/media/{mcollection}', 'MediaController');

Route::get('/gallery/{gallery}', 'MediaController@getGallery');

/**
 * Process Logout process
 */
Route::get('logout', function()
        {
            Auth::logout();
            return Redirect::to('/');
        });

Route::controller('account', 'AccountController');

Route::get('login', function()
        {
            return Redirect::to('/account/login');
        });

        Route::get('admin', function()
        {
            return Redirect::to('/account/login');
        });

/**
Route::controller('article', 'ArticleController');
Route::get('newarticle', 'ArticleController@newArticle');
Route::post('newarticle', 'ArticleController@insertArticle');
Route::controller('editor', 'EditorController');
Route::get('/', 'HomeController@showWelcome');
*/