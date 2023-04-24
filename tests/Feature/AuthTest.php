<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }


     public function test_user_can_view_a_login_form()
     {
         $response = $this->get('/login');
         $response->assertStatus(200)
               ->assertViewHas('errors');
     }

     public function test_auth_should_give_us_error_when_inputs_are_not_provided()
     {
         $response = $this->post(route('login.store'), []);
         $response->assertSessionHasErrors(['email', 'password']);
     }

     public function test_auth_should_give_us_error_when_password_is_not_provided()
     {
         $response = $this->post(route('login.store'), ['email' => 'jack']);
         $response->assertSessionHasErrors(['password']);
     }

     public function test_auth_should_give_us_error_when_email_is_not_provided()
     {
         $response = $this->post(route('login.store'), ['password' => '123']);
         $response->assertSessionHasErrors(['email']);
     }


     public function test_auth_should_give_us_error_when_email_and_password_are_not_correct()
     {
         $response = $this->post(route('login.store'), ['email' => 'test@gmail.com' ,'password' => '123123']);
         $response->assertSessionHasErrors(['email' => 'mail or password is incorrect']);
     }

     public function test_auth_should_redirect_to_worldwide_page_after_successful_login_with_email()
     {
         $user = User::factory()->create(['email' => 'mytestuser@gmail.com', 'password' =>  bcrypt('1234')]);
         $response = $this->post(route('login.store'), ['email' => $user->email, 'password' => '1234']);
         $response->assertStatus(302);
         $response->assertRedirect('/worldwide');
         $this->followRedirects($response)->assertSee('Statistics By Country');
         $this->assertAuthenticatedAs($user);
     }

     public function test_auth_should_redirect_to_worldwide_page_after_successful_login_with_username()
     {
         $user = User::factory()->create(['username' => 'mytestuser', 'password' =>  bcrypt('1234')]);
         $response = $this->post(route('login.store'), ['email' => $user->username, 'password' => '1234']);
         $response->assertStatus(302);
         $response->assertRedirect('/worldwide');
         $this->followRedirects($response)->assertSee('Statistics By Country');
         $this->assertAuthenticatedAs($user);
     }


     public function test_auth_should_not_logout_if_user_is_not_authenticated()
     {
         $this->post(route('logout'))->assertRedirect('/login');
     }

     public function test_auth_should_log_out_if_user_is_authenticated()
     {
         $response = $this->actingAs($this->user)->post(route('logout'));
         $response->assertRedirect('/login');
     }
}
