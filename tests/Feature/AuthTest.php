<?php
/**
 * Created by PhpStorm.
 * User: password
 * Date: 3/26/19
 * Time: 4:02 PM
 */

namespace Tests\Feature;


use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_can_view_a_signup_form()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

}