<?php

namespace App;

class Country
{
    public static function locate(): ?string
    {
        $address = app()->isProduction() ? request()->header('HTTP_CF_CONNECTING_IP') : env('CUSTOMER_IP_ADDRESS');

        return geoip($address)['iso_code'];

        // $country = request()->header('HTTP_CF_IPCOUNTRY');

        // return $country ? \strtoupper($country) : null;
    }

    public static function isEuropean(): bool
    {
        $address = app()->isProduction() ? request()->header('HTTP_CF_CONNECTING_IP') : env('CUSTOMER_IP_ADDRESS');

        return geoip($address)['continent'] === 'EU';
    }
}
