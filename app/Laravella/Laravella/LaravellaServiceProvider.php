<?php namespace Laravella\Laravella;

use Illuminate\Support\ServiceProvider;

class LaravellaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('laravella/laravella');

		include __DIR__.'/../../routes/routes.php';         
		
		$this->registerCommands();
				
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
	
	/** register the custom commands **/
	public function registerCommands()
	{
//            Artisan::add(new InstallCommand);
//            Artisan::add(new UpdateCommand);
            
		$commands = array('LaravellaInstall','LaravellaUpdate');

		foreach ($commands as $command)
		{
			$this->{'register'.$command.'Command'}();
		}

		$this->commands(
			'command.laravella.install','command.laravella.update'
		);
                
	}	
        
	public function registerLaravellaInstallCommand()
	{
		$this->app['command.laravella.install'] = $this->app->share(function($app)
		{
			return new LaravellaInstallCommand();
		});
	}

	public function registerLaravellaUpdateCommand()
	{
		$this->app['command.laravella.update'] = $this->app->share(function($app)
		{
			return new LaravellaUpdateCommand();
		});
	}

        

}