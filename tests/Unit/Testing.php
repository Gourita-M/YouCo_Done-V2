<!-- <?php

use App\Models\Restaurants;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\testCase;


Expectation
Meaning
toBe()
exact match
toEqual()
same value
toBeTrue()
boolean true
toContain()
contains string/array
toHaveCount()
array count
toThrow()
exception expected

----------basic Test

Test('adds numbers correctly', function () {
    $sum = 2 + 3;

    expect($sum)->toBe(4);
});

---------- String Test

Test('formats text to uppercase', function () {
    $text = 'hello pest';
    $uppercase = strtoupper($text);

    expect($uppercase)->toBe('HELLO pEST');
});

--------- Boolean Test even or not . toBeFalse/toBeFalse

Test('checks if a number is even', function () {
    $number = 5;

    expect($number % 2 === 0)->tobeFalse();
});

---------- Array / Collection Test

Test('checks array contents', function () {
    $fruits = ['apple', 'banana', 'orange'];

    expect($fruits)->toHaveCount(3);
    expect($fruits)->toContain('ban');
});


------ Dataset Test multiple test without repeating code

dataset('numbers', [0, 1, 2, 3, 4]);

Test('checks numbers are positive', function ($number) {
    expect($number)->toBeGreaterThan(0);
})->with('numbers'); //runs the same test for each number


// dataset('restaurant_names', [
    'first'  => ['Pizza Palace'],
    'second' => ['Sushi Spot'],
    'third'  => ['Burger Barn'],
]);

Test('can format restaurant names to uppercase', function ($name) {
    $formatted = strtoupper($name);

    expect($formatted)->toBe(strtoupper($name));
})->with('restaurant_names');

dataset('restaurant_names', [...]) defines multiple inputs.

it(...)->with('restaurant_names') runs the test once per dataset item.

Useful for testing multiple edge cases without repeating code.


Mocks Test 
Mocks are fake objects used in tests that simulate real 
classes or services so you can test your code without using the real thing.
Why we use mocks
When testing, real things can be:
Slow (database, APIs)
Expensive (payments, emails)
Unpredictable
Hard to control
So we replace them with mocks.
 -->
