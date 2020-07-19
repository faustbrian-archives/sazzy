<?php

return [

    'affiliate' => [

        'commissionPercentage' => 20,

    ],

    /**
     * You can visit https://app.usefathom.com/#/settings/sites to get your site ID
     * and configure it here to automatically include the tracking code.
     */

    'usefathom' => env('FATHOM_ANALYTICS_SITE_ID', null),

];
