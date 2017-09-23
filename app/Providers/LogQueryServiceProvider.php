<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LogQueryServiceProvider extends ServiceProvider
{


    Const FILENAMEFORMAT = '{filename}-{date}';
    const FILE_PER_DAY = RotatingFileHandler::FILE_PER_DAY;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $logger = $this->app->make('queryLogger');
        DB::listen(function ($query) use ($logger) {
            $logger->info($query->sql);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('queryLogger', function () {
            $filename = storage_path('logs/query/log');
            $logger   = new Logger('QUERY');
            $handler  = new RotatingFileHandler($filename);
            $handler->setFilenameFormat(self::FILENAMEFORMAT, self::FILE_PER_DAY);

            return $logger->pushHandler($handler);
        });
    }
}
