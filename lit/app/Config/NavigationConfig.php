<?php

namespace Lit\Config;

use Ignite\Application\Navigation\Config;
use Ignite\Application\Navigation\Navigation;
use Lit\Config\Crud\DayConfig;
use Lit\Config\Crud\FrequencyConfig;
use Lit\Config\Crud\ServiceConfig;
use Lit\Config\Crud\TimeConfig;
use Lit\Config\Crud\AppointmentConfig;
use Lit\Config\Form\Pages\HomeConfig;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation  $nav
     * @return void
     */
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__lit('navigation.user_administration')),

            $nav->preset('user.user', ['icon' => fa('users')]),
            $nav->preset('permissions'),
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation  $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->group([
                'title' => 'Maintenance',
                'icon' => fa('cogs'),

            ], [
                $nav->preset(DayConfig::class, ),
                $nav->preset(FrequencyConfig::class, ),
                $nav->preset(TimeConfig::class, ),
                $nav->preset(ServiceConfig::class, ),

            ]),
            $nav->preset(AppointmentConfig::class, ['icon' => fa('calendar')]),
            $nav->preset(HomeConfig::class, ['icon' => fa('home')]),
            //
        ]);
    }
}
