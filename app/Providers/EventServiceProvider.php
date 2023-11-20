<?php

namespace App\Providers;

use App\Models\DocumentFile;
use App\Models\DocumentFileLogs;
use App\Models\DocumentTracking;
use App\Models\DocumentFileTracking;
use App\Models\DocumentLogs;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\DocumentLogsObserver;
use App\Observers\lastUpdatedByObserver;
use App\Observers\DocumentFileLogsObserver;
use App\Observers\DocumentTrackingObserver;
use App\Observers\DocumentFileTrackingObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    //     DocumentFile::observe(lastUpdatedByObserver::class);
    //    DocumentFileTracking::observe(DocumentFileTrackingObserver::class);
    //       DocumentTracking::observe(DocumentTrackingObserver::class);
    //    DocumentFileLogs::observe(DocumentFileLogsObserver::class);
    //     DocumentLogs::observe(DocumentLogsObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
