<?php

namespace App\Providers;

use App\Services\TwilioService;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sms', function($app) {
        	return new TwilioService(
        		config('services.twilio.number'),
				new Client(config('services.twilio.account_sid'), config('services.twilio.auth_token'))
			);
		});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
