<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_confirmation_view_is_rendering()
    {
        $response = $this->get(route('confirmation.register_confirmation'));
        $response->assertStatus(200);
        $response->assertSee('Your account is confirmed, you can sign in');
    }

    public function test_register_user_verify()
    {

        $response = $this->post(
            route('register.store'),
            ['username' => 'user', 'email' => 'user@gmail.com', 'password' => 'password', 'password_confirmation' => 'password']
        );
        $response->assertRedirect(route('verification.notice'));
        $this->followRedirects($response)->assertSee('We have sent you a confirmation email');

        $user = User::first();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $user->id,
                'hash' => sha1($user->getEmailForVerification())
            ]
        );

        $response = $this->get($verificationUrl);
        $response->assertStatus(302);
        $this->followRedirects($response)->assertViewIs('authorization.verify.register-confirmation');
    }

    public function test_register_resend_confirmation_to_email()
    {
        $user = User::factory()->create();
        Notification::fake();
        $this->actingAs($user);
        $response = $this->post(route('verification.send'));
        $response->assertStatus(302);
        Notification::assertSentTo($user, VerifyEmail::class);
        $response->assertSessionHas('message', 'Verification link sent!');
    }

    public function test_register_should_see_register_form()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertSee('Welcome to Coronatime');
    }

    public function test_register_should_give_us_errors_when_input_are_not_provided()
    {
        $response = $this->post(route('register.store'), []);
        $response->assertSessionHasErrors(['username', 'email', 'password']);
    }

    public function test_register__should_give_us_errors_when_username_has_less_than_three_symbols()
    {

        $response = $this->post(route('register.store'), ['username' => 'le']);
        $response->assertSessionHasErrors(['username' => 'The username field must be at least 3 characters.', 'email', 'password']);

    }


    public function test_register_should_give_us_error_if_email_is_not_correct()
    {
        $response = $this->post(route('register.store'), ['email' => 'le']);
        $response->assertSessionHasErrors(['username', 'email' => 'The email field must be a valid email address.', 'password']);
    }


    public function test_register_should_give_us_errors_when_password_has_less_than_three_symbols()
    {
        $response = $this->post(route('register.store'), ['password' => 'le']);
        $response->assertSessionHasErrors(['username', 'email' ,  'password' => 'The password field must be at least 3 characters.']);
    }

    public function test_register_should_give_us_error_when_repeat_password_does_not_match()
    {
        $response = $this->post(route('register.store'), ['password' => 'password', 'password_confirmation' => 'other']);
        $response->assertSessionHasErrors(['username', 'email' ,  'password' => 'The password field confirmation does not match.']);
    }

    public function test_register_user_should_create_successfully()
    {
        $response = $this->post(
            route('register.store'),
            ['username' => 'user', 'email' => 'user@gmail.com', 'password' => 'password', 'password_confirmation' => 'password']
        );
        $response->assertRedirect(route('verification.notice'));
        $this->followRedirects($response)->assertSee('We have sent you a confirmation email');
    }
}
