<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coronatime:fetch-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data from API (https://devtest.ge/api) and store in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $countries = Http::get('https://devtest.ge/countries');


        foreach($countries->json() as $country) {

            $response = Http::post('https://devtest.ge/get-country-statistics', $country);

            if ($response->successful()) {
                $apiData = $response->json();

                Country::create([
                    'name' => $country['name'],
                    'country' => $apiData['country'],
                    'code' => $apiData['code'],
                    'confirmed' => $apiData['confirmed'],
                    'recovered' => $apiData['recovered'],
                    'critical' => $apiData['critical'],
                    'deaths' => $apiData['deaths'],
                ]);


                $this->info('API data fetched and stored in countries table successfully!');
            } else {
                $this->error('Failed to fetch data from API: ' . $response->body());
            }

        }




    }
}
