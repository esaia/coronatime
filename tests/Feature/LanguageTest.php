<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageTest extends TestCase
{
    use RefreshDatabase;
    public function test_change_language()
    {
        $locale = 'en';
        $response = $this->post(route('language'), ['locale' => $locale]);
        $this->assertEquals($locale, session('locale'));
        $this->assertEquals($locale, App::getLocale());
        $response->assertStatus(302);

    }
}
