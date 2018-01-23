<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\Transaction;

class TransactionsTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateTransaction() 
    {
        Transaction::create([
            'user_id' => 1,
            'type' => 'I',
            'amount' => 100.00,
            'total_before' => 8000.00,
            'total_after' => 8100.00,
            'date' => '2017-01-22'
        ]);

        $this->seeInDatabase('transactions', ['user_id' => 1]);
    }
}
