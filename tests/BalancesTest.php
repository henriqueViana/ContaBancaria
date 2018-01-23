<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\Balance;

class BalancesTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testCreateBalance() 
    {
        Balance::create([
            'user_id' => 1, 
            'amount' => 8000.00
        ]);

        $this->seeInDatabase('balances', ['amount' => 8000.00]);
    }
}
