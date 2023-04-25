<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FetchDataCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_data_from_the_api_with_command()
    {

        Http::fake([
          'https://devtest.ge/countries' => Http::response([
            [
            "code"=> "GE",
            "name"=> [
                "en"=> "Georgia",
                "ka"=> "საქართველო"
                ]
            ],
            [
            "code"=> "AL",
            "name"=> [
                "en"=> "Albania",
                "ka"=> "ალბანეთი"
                ]
            ],
          ]),
        ]);
        Http::fake([
            'https://devtest.ge/get-country-statistics' => Http::response([
            'country' => 'Georgia',
            'code' => 'GE',
            'confirmed' => 100,
            'recovered' => 50,
            'critical' => 10,
            'deaths' => 5,
            ]),
        ]);
        $this->artisan('coronatime:fetch-data')
            ->expectsOutput('API data fetched and stored in countries table successfully!')
            ->assertExitCode(0);
        $this->assertDatabaseHas('countries', ['name->en' => 'Georgia']);

    }


    public function test_fetch_data_failed()
    {
        Http::fake(['https://devtest.ge/get-country-statistics' => Http::response(['error' => 'Failed to fetch data'], 500)]);
        $this->artisan('coronatime:fetch-data')->expectsOutput('Failed to fetch data from API');
    }
}
