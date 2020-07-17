<?php

namespace App\Services;

use Exception;
use Torann\GeoIP\Services\AbstractService;
use Torann\GeoIP\Support\HttpClient;

class GeoIP extends AbstractService
{
    /**
     * Http client instance.
     */
    protected \Torann\GeoIP\Support\HttpClient $client;

    /**
     * The "booting" method of the service.
     *
     * @return void
     */
    public function boot()
    {
        $this->client = new HttpClient([
            'base_uri' => 'https://api.ipapi.com/api/',
            'headers'  => [
                'User-Agent' => 'Laravel-GeoIP',
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function locate($ip)
    {
        // Get data from client
        $data = $this->client->get($ip, [
            'access_key' => $this->config('key'),
            'security'   => $this->config('secure', 1),
            'language'   => $this->config('language', 'en'),
        ]);

        // Verify server response
        if ($this->client->getErrors() !== null) {
            throw new Exception('Request failed ('.$this->client->getErrors().')');
        }

        // Parse body content
        $json = json_decode($data[0]);

        return $this->hydrate([
            'ip'          => $ip,
            'iso_code'    => $json->country_code,
            'country'     => $json->country_name,
            'city'        => $json->city,
            'state'       => $json->region_code,
            'state_name'  => $json->region_name,
            'postal_code' => $json->zip,
            'lat'         => round($json->latitude, 2),
            'lon'         => round($json->longitude, 2),
            'timezone'    => $json->time_zone->id,
            'continent'   => $json->continent_code,
        ]);
    }

    /**
     * Update function for service.
     *
     * @return string
     */
    public function update()
    {
        //
    }
}
