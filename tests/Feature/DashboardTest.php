<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Country;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;


    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        Country::factory()->create(['name' => ['en'=> 'Germany', 'ka' => 'გერმანია']]);
        Country::factory()->create(['name' => ['en'=> 'United States', 'ka' => 'ამერიკის შეერთებული შტატები']]);
        Country::factory()->create(['name' => ['en'=> 'France', 'ka' => 'საფრანგეთი']]);

        $this->user = User::factory()->create();

    }


    public function test_dashboard_worldwide_can_not_see_unauthorized_user()
    {
        $response = $this->get(route('dashboard.worldwide'));
        $response->assertStatus(302);
        $this->followRedirects($response)->assertViewIs('authorization.login');
    }

    public function test_dashboard_worldwide_view_is_rendering()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.worldwide'));
        $response->assertStatus(200);
        $response->assertSee('Recovered');
    }


    public function test_dashboard_country_can_not_see_unauthorized_user()
    {

        $response = $this->get(route('dashboard.country'));
        $response->assertStatus(302);
        $this->followRedirects($response)->assertViewIs('authorization.login');

    }


    public function test_dashboard_country_view_is_rendering()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.country'));
        $response->assertStatus(200);
        $response->assertSee('Death');
    }

    public function test_dashboard_country_sort_by_name_in_asc_order()
    {

        $response = $this->actingAs($this->user)->get(route('dashboard.country', ['sortBy' => 'name', 'sortOrder' => 'asc']));
        $response->assertSeeInOrder(['France', 'Germany', 'United States']);
    }

    public function test_dashboard_country_sort_by_name_in_desc_order()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard.country', ['sortBy' => 'name', 'sortOrder' => 'desc']));
        $response->assertSeeInOrder([ 'United States' , 'Germany','France']);
    }

    public function test_dashboard_country_filtering_by_search_query()
    {

        $response = $this->actingAs($this->user)->get(route('dashboard.country', ['search' => 'Ger']));
        $response->assertDontSee(['United States', 'France']);
    }
}
