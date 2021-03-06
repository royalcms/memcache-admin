<?php

namespace Royalcms\Component\Foundation\Providers;

use Royalcms\Component\Foundation\Console\OptimizeAliasCommand;
use Royalcms\Component\Support\ServiceProvider;
use Royalcms\Component\Foundation\Console\OptimizeClearCommand;
use Royalcms\Component\Foundation\Console\OptimizeCompileCommand;
use Royalcms\Component\Foundation\Console\PackageDiscoverCommand;
use Royalcms\Component\Foundation\Console\UpCommand;
use Royalcms\Component\Foundation\Console\DownCommand;
use Royalcms\Component\Foundation\Console\ServeCommand;
use Royalcms\Component\Foundation\Console\TinkerCommand;
use Royalcms\Component\Foundation\Console\JobMakeCommand;
use Royalcms\Component\Foundation\Console\AppNameCommand;
use Royalcms\Component\Foundation\Console\OptimizeCommand;
use Royalcms\Component\Foundation\Console\TestMakeCommand;
use Royalcms\Component\Foundation\Console\RouteListCommand;
use Royalcms\Component\Foundation\Console\EventMakeCommand;
use Royalcms\Component\Foundation\Console\ModelMakeCommand;
use Royalcms\Component\Foundation\Console\ViewClearCommand;
use Royalcms\Component\Foundation\Console\PolicyMakeCommand;
use Royalcms\Component\Foundation\Console\RouteCacheCommand;
use Royalcms\Component\Foundation\Console\RouteClearCommand;
use Royalcms\Component\Foundation\Console\CommandMakeCommand;
use Royalcms\Component\Foundation\Console\ConfigCacheCommand;
use Royalcms\Component\Foundation\Console\ConfigClearCommand;
use Royalcms\Component\Foundation\Console\ConsoleMakeCommand;
use Royalcms\Component\Foundation\Console\EnvironmentCommand;
use Royalcms\Component\Foundation\Console\KeyGenerateCommand;
use Royalcms\Component\Foundation\Console\RequestMakeCommand;
use Royalcms\Component\Foundation\Console\ListenerMakeCommand;
use Royalcms\Component\Foundation\Console\ProviderMakeCommand;
use Royalcms\Component\Foundation\Console\HandlerEventCommand;
use Royalcms\Component\Foundation\Console\ClearCompiledCommand;
use Royalcms\Component\Foundation\Console\EventGenerateCommand;
use Royalcms\Component\Foundation\Console\VendorPublishCommand;
use Royalcms\Component\Foundation\Console\HandlerCommandCommand;
use Royalcms\Component\Foundation\Console\TranslationCacheCommand;
use Royalcms\Component\Foundation\Console\TranslationClearCommand;

class ArtisanServiceProvider extends ServiceProvider
{
    /**
     * The commands to be registered.
     * @var array
     */
    protected $commands = [
        'AppName'                 => 'command.app.name',
        'ClearCompiled'           => 'command.clear-compiled',
        'ConfigCache'             => 'command.config.cache',
        'ConfigClear'             => 'command.config.clear',
        'Down'                    => 'command.down',
        'Environment'             => 'command.environment',
        'HandlerCommand'          => 'command.handler.command',
        'HandlerEvent'            => 'command.handler.event',
        'KeyGenerate'             => 'command.key.generate',
        'Optimize'                => 'command.optimize',
        'OptimizeClear'           => 'command.optimize.clear',
        'OptimizeAlias'           => 'command.optimize.alias',
        'OptimizeCompile'         => 'command.optimize.compile',
        'PackageDiscover'         => 'command.package.discover',
        'RouteCache'              => 'command.route.cache',
        'RouteClear'              => 'command.route.clear',
        'RouteList'               => 'command.route.list',
        'Up'                      => 'command.up',
        'ViewClear'               => 'command.view.clear',
        'TranslationCache'        => 'command.trans.cache',
        'TranslationClear'        => 'command.trans.clear',
    ];

    /**
     * The commands to be registered.
     * @var array
     */
    protected $devCommands = [
//        'CommandMake'   => 'command.command.make',
//        'ConsoleMake'   => 'command.console.make',
//        'EventGenerate' => 'command.event.generate',
//        'EventMake'     => 'command.event.make',
//        'JobMake'       => 'command.job.make',
//        'ListenerMake'  => 'command.listener.make',
//        'ModelMake'     => 'command.model.make',
//        'Optimize'      => 'command.optimize',
//        'PolicyMake'    => 'command.policy.make',
//        'ProviderMake'  => 'command.provider.make',
//        'RequestMake'   => 'command.request.make',
//        'TestMake'      => 'command.test.make',
        'VendorPublish' => 'command.vendor.publish',
        'Serve'         => 'command.serve',
        'Tinker'        => 'command.tinker',
    ];

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerCommands(array_merge(
            $this->commands, $this->devCommands
        ));
    }

    /**
     * Register the given commands.
     * @param array $commands
     * @return void
     */
    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            call_user_func_array([$this, "register{$command}Command"], []);
        }

        $this->commands(array_values($commands));
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerAppNameCommand()
    {
        $this->royalcms->singleton('command.app.name', function ($royalcms) {
            return new AppNameCommand($royalcms['composer'], $royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerClearCompiledCommand()
    {
        $this->royalcms->singleton('command.clear-compiled', function () {
            return new ClearCompiledCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerCommandMakeCommand()
    {
        $this->royalcms->singleton('command.command.make', function ($royalcms) {
            return new CommandMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerConfigCacheCommand()
    {
        $this->royalcms->singleton('command.config.cache', function ($royalcms) {
            return new ConfigCacheCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerConfigClearCommand()
    {
        $this->royalcms->singleton('command.config.clear', function ($royalcms) {
            return new ConfigClearCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerConsoleMakeCommand()
    {
        $this->royalcms->singleton('command.console.make', function ($royalcms) {
            return new ConsoleMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerEventGenerateCommand()
    {
        $this->royalcms->singleton('command.event.generate', function () {
            return new EventGenerateCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerEventMakeCommand()
    {
        $this->royalcms->singleton('command.event.make', function ($royalcms) {
            return new EventMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerDownCommand()
    {
        $this->royalcms->singleton('command.down', function () {
            return new DownCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerEnvironmentCommand()
    {
        $this->royalcms->singleton('command.environment', function () {
            return new EnvironmentCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerHandlerCommandCommand()
    {
        $this->royalcms->singleton('command.handler.command', function ($royalcms) {
            return new HandlerCommandCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerHandlerEventCommand()
    {
        $this->royalcms->singleton('command.handler.event', function ($royalcms) {
            return new HandlerEventCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerJobMakeCommand()
    {
        $this->royalcms->singleton('command.job.make', function ($royalcms) {
            return new JobMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerKeyGenerateCommand()
    {
        $this->royalcms->singleton('command.key.generate', function () {
            return new KeyGenerateCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerListenerMakeCommand()
    {
        $this->royalcms->singleton('command.listener.make', function ($royalcms) {
            return new ListenerMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerModelMakeCommand()
    {
        $this->royalcms->singleton('command.model.make', function ($royalcms) {
            return new ModelMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerOptimizeCommand()
    {
        $this->royalcms->singleton('command.optimize', function () {
            return new OptimizeCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerOptimizeClearCommand()
    {
        $this->royalcms->singleton('command.optimize.clear', function () {
            return new OptimizeClearCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerOptimizeAliasCommand()
    {
        $this->royalcms->singleton('command.optimize.alias', function ($royalcms) {
            return new OptimizeAliasCommand($royalcms['classaliasloader']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerOptimizeCompileCommand()
    {
        $this->royalcms->singleton('command.optimize.compile', function ($royalcms) {
            return new OptimizeCompileCommand($royalcms['composer'], $royalcms['classpreloader']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerPackageDiscoverCommand()
    {
        $this->royalcms->singleton('command.package.discover', function () {
            return new PackageDiscoverCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerProviderMakeCommand()
    {
        $this->royalcms->singleton('command.provider.make', function ($royalcms) {
            return new ProviderMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerRequestMakeCommand()
    {
        $this->royalcms->singleton('command.request.make', function ($royalcms) {
            return new RequestMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerRouteCacheCommand()
    {
        $this->royalcms->singleton('command.route.cache', function ($royalcms) {
            return new RouteCacheCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerRouteClearCommand()
    {
        $this->royalcms->singleton('command.route.clear', function ($royalcms) {
            return new RouteClearCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerRouteListCommand()
    {
        $this->royalcms->singleton('command.route.list', function ($royalcms) {
            return new RouteListCommand($royalcms['router']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerServeCommand()
    {
        $this->royalcms->singleton('command.serve', function () {
            return new ServeCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerTestMakeCommand()
    {
        $this->royalcms->singleton('command.test.make', function ($royalcms) {
            return new TestMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerTinkerCommand()
    {
        $this->royalcms->singleton('command.tinker', function () {
            return new TinkerCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerUpCommand()
    {
        $this->royalcms->singleton('command.up', function () {
            return new UpCommand;
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerVendorPublishCommand()
    {
        $this->royalcms->singleton('command.vendor.publish', function ($royalcms) {
            return new VendorPublishCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerViewClearCommand()
    {
        $this->royalcms->singleton('command.view.clear', function ($royalcms) {
            return new ViewClearCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerPolicyMakeCommand()
    {
        $this->royalcms->singleton('command.policy.make', function ($royalcms) {
            return new PolicyMakeCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerTranslationCacheCommand()
    {
        $this->royalcms->singleton('command.trans.cache', function ($royalcms) {
            return new TranslationCacheCommand($royalcms['files']);
        });
    }

    /**
     * Register the command.
     * @return void
     */
    protected function registerTranslationClearCommand()
    {
        $this->royalcms->singleton('command.trans.clear', function ($royalcms) {
            return new TranslationClearCommand($royalcms['files']);
        });
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return array_merge(array_values($this->commands), array_values($this->devCommands));
    }
}
