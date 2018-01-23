<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UsersTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testCreateUser()
    {
        User::create([
            'name' => 'Tester',
            'email' => 'tester@tester.com',
            'password' => bcrypt(123)
        ]);

        $this->seeInDatabase('users', ['email' => 'tester@tester.com']);
    }
}
