<?php

namespace App\Memadmin;

use Royalcms\Component\App\AppParentServiceProvider;

class MemadminServiceProvider extends  AppParentServiceProvider
{
    
    public function boot()
    {
        $this->package('royalcms/app-memadmin');
    }
    
    public function register()
    {
        
    }
    
    
    
}