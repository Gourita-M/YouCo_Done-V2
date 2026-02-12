<?php 


// Mocks Test 
// Mocks are fake objects used in tests that simulate real 
// classes or services so you can test your code without using the real thing.
// Why we use mocks
// When testing, real things can be:
// Slow (database, APIs)
// Expensive (payments, emails)
// Unpredictable
// Hard to control
// So we replace them with mocks.


use App\Services\PaymentService;
use Mockery;

uses(Tests\TestCase::class);

Test('uses payment service', function () {


    $mock = Mockery::mock(PaymentService::class);
        // Fake payment service
        // No real API calls

    $mock->shouldReceive('charge')
         ->once()
         ->with(200)
         ->andReturn(true);

    $this->app->instance(PaymentService::class, $mock);
    //Whenever someone asks for PaymentService, give the mock.


    $this->post('/pay') //user clicka on Pay Button
         ->assertOk()
         ->assertJson(['success' => true]);
});
