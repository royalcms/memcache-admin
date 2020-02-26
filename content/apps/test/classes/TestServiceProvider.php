<?php 

namespace Ecjia\App\Test;

use Royalcms\Component\App\AppParentServiceProvider;

class TestServiceProvider extends AppParentServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() 
    {
        $this->package('ecjia/app-test');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}
	
}
