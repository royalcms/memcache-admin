<?php

namespace Ecjia\App\Memadmin;

use Royalcms\Component\App\AppParentServiceProvider;

class MemadminServiceProvider extends  AppParentServiceProvider
{
    
    public function boot()
    {
        $this->package('ecjia/app-memadmin');
    }
    
    public function register()
    {
        
    }
    
    
    
}