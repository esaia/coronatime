<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;


    public function test_reset_confirmation_view_is_rendering()
    {
        $response = $this->get(route('confirmation.reset_confirmation'));
        $response->assertStatus(200);
        $response->assertSee('Your password has been updeted successfully');
    }



    public function test_reset_can_view_a_reset_form()
    {
        $response = $this->get(route('password.request'));
        $response->assertStatus(200);
    }


    public function test_reset_should_give_us_error_if_email_is_not_provided()
    {
        $response = $this->post(route('password.email'));
        $response->assertSessionHasErrors([ 'email'=>'The email field is required.']);
    }


    public function test_reset_should_give_us_error_if_email_is_not_correct()
    {
        $response = $this->post(route('password.email'), ['email' => 'other']);
        $response->assertSessionHasErrors([ 'email'=>'The email field must be a valid email address.']);
    }



    public function test_reset_email_send_successful_with_token()
    {
        $user = User::factory()->create();

        // Send email to reset user password
        $response = $this->post(route('password.email'), ['email' => $user->email]);
        $response->assertSessionHasNoErrors();

        // check if token is recorded in db
        $this->assertDatabaseHas('password_reset_tokens', [
          'email' => $user->email,
        ]);
    }

    public function test_reset_password_form_is_rendering()
    {
        $password = 'password';
        // create a new user
        $user = User::factory()->create(['password' => bcrypt($password)]);
        $token = Password::createToken($user). 'res';

        $response = $this->get(route('password.reset', ['token'=> $token]));

        $response->assertStatus(200);
        $response->assertSee('Reset Password');

    }

    public function test_reset_user_cannot_reset_password_with_invalid_token()
    {
        $password = 'password';
        $newPassword = 'new-password';

        // create a new user
        $user = User::factory()->create(['password' => bcrypt($password)]);
        $token = 'invalid-token';

        // reset password
        $response = $this->post(route('password.update'), [
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
            'token' => $token,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Hash::check('new-password', $user->fresh()->password));


        // user can login with old password
        $response = $this->post(route('login.store'), ['email' => $user->email, 'password' => $password]);
        $response->assertStatus(302);
        $response->assertRedirect('/worldwide');
        $this->followRedirects($response)->assertSee('Statistics By Country');
        $this->assertAuthenticatedAs($user);
    }

    public function test_reset_user_can_reset_password_with_valid_token()
    {

        $password = 'password';
        $newPassword = 'new-password';
        // create a new user
        $user = User::factory()->create(['password' => bcrypt($password)]);
        $token = Password::createToken($user);

        // reset password
        $response = $this->post(route('password.update'), [
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
            'token' => $token,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('status', trans('passwords.reset'));
        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));


        // user can login with updated password
        $response = $this->post(route('login.store'), ['email' => $user->email, 'password' => $newPassword]);
        $response->assertStatus(302);
        $response->assertRedirect('/worldwide');
        $this->followRedirects($response)->assertSee('Statistics By Country');
        $this->assertAuthenticatedAs($user);

    }

}
