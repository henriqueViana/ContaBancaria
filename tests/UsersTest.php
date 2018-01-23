<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Model\Balance;

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

    public function testRelationshipWithBalancesTable()
    {
        $user = User::create([
            'name' => 'Tester',
            'email' => 'tester@tester.com',
            'password' => bcrypt(123)
        ]);

        $balance = Balance::create([
            'user_id' => $user->id,
            'amount' => 15000.00
        ]);

        $this->seeInDatabase('users',['email' => 'tester@tester.com']);
        $this->seeInDatabase('balances', ['user_id' => $user->id, 'amount' => 15000.00]);
    }
}
