<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Database\Factories\UserFactory;

class UserTest extends TestCase
{


    use RefreshDatabase;

    /** @test */
    public function register_page_displays_correctly():void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee("Create an Account");
    }
    /** @test */
    public function test_User_Insertion_successfully():void
    {
        $response = $this->post('users', [
            'fullname'          =>  'John Di',
            'email'         =>  'john@test.com',
            'photo'         =>  UploadedFile::fake()->image('test.png'),
            'user_name'     => 'john',
            'birthdate'     => '2000-01-01',
            'phone'         => '01000000000',
            'address'       => 'test test',
            'password'      => 'test@123',
            'confirmpassword' => 'test@123'
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('users_data',[
            'full_name'=>'John Di',
            'email' =>'john@test.com',
        ]);
    }

    /** @test */
    public function register_form_redirects_after_successful_registration()
    {
        $response = $this->post('users', [
            'fullname'          =>  'John Di',
            'email'         =>  'john@test.com',
            'photo'         =>  UploadedFile::fake()->image('test.png'),
            'user_name'     => 'john' ,
            'birthdate'     => '2000-01-01',
            'phone'         => '01000000000',
            'address'       => 'test test',
            'password'      => 'test@123',
            'confirmpassword' => 'test@123'
        ]);
        $response->assertRedirect("users.create")->assertSessionHas('success', 'User Added successfully.');
    }
    /** @test */
    public function register_form_displays_success_message_after_successful_registration()
    {
        $response = $this->post('users', [
            'fullname'          =>  'John Di',
            'email'         =>  'john@test.com',
            'photo'         =>  UploadedFile::fake()->image('test.png'),
            'user_name'     => 'john' ,
            'birthdate'     => '2000-01-01',
            'phone'         => '01000000000',
            'address'       => 'test test',
            'password'      => 'test@123',
            'confirmpassword' => 'test@123'
        ]);
        $response->assertSessionHas('success', 'User Added successfully.');
    }
    /** @test */
    public function test_unique_username_validation()
    {
        // create user with username that try to get it again
        $existUsername = User::factory()->withUsername('username')->create();

        // Submit the registration form
        $response = $this->post('users', [
            'fullname'          =>  'John Di',
            'email'         =>  'john@test.com',
            'photo'         =>  UploadedFile::fake()->image('test.png'),
            'user_name'     => 'username',
            'birthdate'     => '2000-01-01',
            'phone'         => '01000000000',
            'address'       => 'test test',
            'password'      => 'test@123',
            'confirmpassword' => 'test@123'
        ]);


        $response->assertSessionHasErrors('user_name');

        // assert that username is already taken before
        $this->assertEquals(
            'The user name has already been taken.',
            session('errors')->first('user_name')
        );

    }
}
