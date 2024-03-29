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

use CachetHQ\Cachet\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        Model::unguard();

        $defaultSettings = [
            [
                'name'  => 'app_name',
                'value' => 'Cachet Demo',
            ],
            [
                'name'  => 'app_domain',
                'value' => 'https://demo.cachethq.io',
            ],
            [
                'name'  => 'show_support',
                'value' => '1',
            ],
            [
                'name'  => 'app_locale',
                'value' => 'en',
            ],
            [
                'name'  => 'app_timezone',
                'value' => 'Europe/London',
            ],
            [
                'name'  => 'app_track',
                'value' => '1',
            ],
            [
                'name'  => 'app_incident_days',
                'value' => '7',
            ],
            [
                'name'  => 'app_analytics',
                'value' => 'UA-58442674-3',
            ],
        ];

        Setting::truncate();

        foreach ($defaultSettings as $setting) {
            Setting::create($setting);
        }
    }
}
