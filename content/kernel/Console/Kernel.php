<?php 

namespace Kernel\Console;

use Royalcms\Component\Console\Scheduling\Schedule;
use Royalcms\Component\Contracts\Foundation\Royalcms;
use Royalcms\Component\Contracts\Events\Dispatcher;
use Royalcms\Component\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * 应用程序提供的 Artisan 命令。
     *
     * @var array
     */
    protected $commands = array();

    /**
     * Create a new console kernel instance.
     *
     * @param  \Royalcms\Component\Contracts\Foundation\Royalcms  $royalcms
     * @param  \Royalcms\Component\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function __construct(Royalcms $royalcms, Dispatcher $events)
    {

        parent::__construct($royalcms, $events);

        $this->royalcms->booted(function ($royalcms) {

            /*
            |--------------------------------------------------------------------------
            | Load The Command Start Script
            |--------------------------------------------------------------------------
            |
            | The start scripts gives this royalcms the opportunity to override
            | any of the existing IoC bindings, as well as register its own new
            | bindings for things like repositories, etc. We'll load it here.
            |
            */

            $path = $royalcms['path.system'].'/start/command.php';

            if (file_exists($path)) require $path;

        });
    }

    /**
     * Bootstrap the application for artisan commands.
     *
     * @return void
     */
    public function bootstrap()
    {
        parent::bootstrap();

        // not do something, do something...
        if (! \RC_Hook::did_action('console_init')) {
            \RC_Hook::do_action('console_init');
        }
    }

    /**
     * 定义应用程序的命令调度。
     *
     * @param  \Royalcms\Component\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->call(function () {
           
//         })->daily();
        
        $schedule->command('test:log')->everyOneMinutes();
    }
}
