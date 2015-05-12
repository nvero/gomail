<?php namespace Nvero\Imapmail;

use Illuminate\Support\ServiceProvider;

class ImapmailServiceProvider extends ServiceProvider {

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

		$this->package('nvero/imapmail');
		//require __DIR__ . '/../vendor/autoload.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		// $this->app->bind('gomail', function ($app) {
		// 	require_once '/mail/bootstrap.php';
		// 	die("dd");
		// 	$rcube = rcube::get_instance(rcube::INIT_WITH_DB | rcube::INIT_WITH_PLUGINS);
		// 	$imap = $rcube->get_storage();
		// });	


		// $this->app['gomail'] = $this->app->share(function($app)
  //       {
  //       	//require_once '/mail/bootstrap.php';
  //       	die("dd");
  //       });


         $this->app->singleton('gomail', function($app)
        {	
			require_once '/mail/bootstrap.php';
			//require_once '/mail/rcube.php';
			return $this;
						
        });	
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

	public function  instance($classname){
		return $classname;
	}
	

	public function  NewInstance($classname){
		return new $classname();
	}

}

