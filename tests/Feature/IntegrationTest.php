<?php

// tests/Feature/MatchControllerTest.php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\MatchController;

class IntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_match_laptop()
    {
        $response = $this->post('/match-check', [
            'merk' => 'Asus',
            'processor' => 'Intel Core i5',
            'jenis_ram' => 'DDR4',
            'min_price' => 10000000,
            'max_price' => 20000000,
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('matchingLaptops');
    }

    public function test_match_laptop_with_no_results()
    {
        $response = $this->post('/match-check', [
            'merk' => 'Nonexistent',
            'processor' => 'Nonexistent',
            'jenis_ram' => 'Nonexistent',
            'min_price' => 10000000,
            'max_price' => 20000000,
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('matchingLaptops', function ($laptops) {
            return $laptops->isEmpty();
        });
    }

    public function test_match_laptop_with_multiple_results()
    {
        $response = $this->post('/match-check', [
            'merk' => 'Asus',
            'processor' => 'Intel Core i5',
            'jenis_ram' => 'DDR4',
            'min_price' => 10000000,
            'max_price' => 20000000,
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('matchingLaptops', function ($laptops) {
            return $laptops->count() > 1;
        });
    }
}
