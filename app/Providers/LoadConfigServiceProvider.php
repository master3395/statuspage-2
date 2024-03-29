<?php

/*
 * This file is part of Cachet.
 *
 * (c) James Brooks <james@cachethq.io>
 * (c) Joseph Cohen <joseph.cohen@dinkbit.com>
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Providers;

use CachetHQ\Cachet\Facades\Setting;
use Exception;
use Illuminate\Support\ServiceProvider;

class LoadConfigServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $appDomain = $appLocale = null;

        try {
            // Get app custom configuration.
            $appDomain = Setting::get('app_domain');
            $appLocale = Setting::get('app_locale');

            // Set the Segment.com settings.
            if (Setting::get('app_track')) {
                $segmentRepository = $this->app->make('CachetHQ\Cachet\Segment\RepositoryInterface');
                $this->app->config->set('segment.write_key', $segmentRepository->fetch());
            }

            // Setup Cors.
            $allowedOrigins = $this->app->config->get('cors.defaults.allowedOrigins');
            $allowedOrigins[] = Setting::get('app_domain');

            // Add our allowed domains too.
            if ($allowedDomains = Setting::get('allowed_domains')) {
                $domains = explode(',', $allowedDomains);
                foreach ($domains as $domain) {
                    $allowedOrigins[] = $domain;
                }
            } else {
                $allowedOrigins[] = env('APP_URL');
            }

            $this->app->config->set('cors.paths.api/v1/*.allowedOrigins', $allowedOrigins);
        } catch (Exception $e) {
            // Don't throw any errors, we may not be setup yet.
        }

        // Override default app values.
        $this->app->config->set('app.url', $appDomain ?: $this->app->config->get('app.url'));
        $this->app->config->set('app.locale', $appLocale ?: $this->app->config->get('app.locale'));

        // Set custom lang.
        $this->app->translator->setLocale($appLocale);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
