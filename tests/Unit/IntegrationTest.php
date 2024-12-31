<?php

// tests/Feature/MatchControllerTest.php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Laptop;
use App\Models\User;

class IntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_matching_laptops_based_on_user_preferences()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        // Arrange: Create dummy laptop data
        $laptop1 = Laptop::factory()->create([
            'merk' => 'Dell',
            'processor' => 'Intel i5',
            'harga' => 15000000,
            'gambar' => 'default.jpg',
        ]);

        $laptop2 = Laptop::factory()->create([
            'merk' => 'HP',
            'processor' => 'Intel i7',
            'harga' => 20000000,
            'gambar' => 'default.jpg',
        ]);

        // Act: Send a request to match laptops
        $response = $this->post('/match-check', [
            'merk' => 'Dell',
            'min_price' => 10000000,
            'max_price' => 20000000,
        ]);

        // Assert: Verify only the matching laptop is returned
        $response->assertStatus(200);
        $response->assertViewHas('matchingLaptops', function ($laptops) use ($laptop1, $laptop2) {
            return $laptops->contains($laptop1) && !$laptops->contains($laptop2);
        });
    }

    /** @test */
    /** @test */
public function it_allows_user_to_store_preferences()
{
    // Arrange: Authenticate a user
    $user = User::factory()->create();
    $this->actingAs($user);

    // Act: Send a request to save preferences
    $response = $this->postJson('/preferences', [
        'merk' => 'Asus',
        'processor' => 'Intel i7',
        'min_price' => 10000000,
        'max_price' => 30000000,
    ]);

    // Assert: Verify preferences are saved in the database
    $response->assertStatus(200);

    $savedPreferences = \DB::table('user_preferences')
        ->where('user_id', $user->id)
        ->value('preferences');

    $this->assertEquals([
        'merk' => 'Asus',
        'processor' => 'Intel i7',
        'min_price' => 10000000,
        'max_price' => 30000000,
    ], json_decode($savedPreferences, true));
}


    /** @test */
    public function admin_can_manage_laptops()
    {
        // Arrange: Authenticate as an admin
        $admin = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($admin);

        // Act: Admin creates a laptop
        $createResponse = $this->post('crud-table', [
            'merk' => 'Lenovo',
            'model' => 'ThinkPad',
            'processor' => 'Intel i7',
            'jenis_ram' => 'DDR4',
            'ukuran_ram' => '16GB',
            'jenis_storage' => 'SSD',
            'ukuran_storage' => '512GB',
            'gpu' => 'NVIDIA GTX 1650',
            'sistem_operasi' => 'Windows 11',
            'tipe_laptop' => 'Gaming',
            'harga' => 25000000,
            'link' => 'http://example.com',
        ]);

        // Assert: Verify the laptop is created
       // $createResponse->assertStatus(302);
        $this->assertDatabaseHas('laptops', [
            'merk' => 'Lenovo',
            'model' => 'ThinkPad',
            'processor' => 'Intel i7',
            'jenis_ram' => 'DDR4',
            'ukuran_ram' => '16GB',
            'jenis_storage' => 'SSD',
            'ukuran_storage' => '512GB',
            'gpu' => 'NVIDIA GTX 1650',
            'sistem_operasi' => 'Windows 11',
            'tipe_laptop' => 'Gaming',
            'harga' => 25000000,
            'link' => 'http://example.com',
        ]);

        // Act: Admin updates the laptop
        $laptop = Laptop::where('merk', 'Lenovo')->first();
        $updateResponse = $this->put("crud-table/{id}", [
            'merk' => 'Lenovo',
            'model' => 'ThinkPad',
            'processor' => 'Intel i7',
            'jenis_ram' => 'DDR4',
            'ukuran_ram' => '16GB',
            'jenis_storage' => 'SSD',
            'ukuran_storage' => '512GB',
            'gpu' => 'NVIDIA GTX 1650',
            'sistem_operasi' => 'Windows 11',
            'tipe_laptop' => 'Gaming',
            'harga' => 23000000,
            'link' => 'http://example.com',
        ]);

        // Assert: Verify the laptop is updated
        //$updateResponse->assertStatus(200);
        $this->assertDatabaseHas('laptops', [
            'id' => $laptop->id,
            'merk' => 'Lenovo',
            'model' => 'ThinkPad',
            'processor' => 'Intel i7',
            'jenis_ram' => 'DDR4',
            'ukuran_ram' => '16GB',
            'jenis_storage' => 'SSD',
            'ukuran_storage' => '512GB',
            'gpu' => 'NVIDIA GTX 1650',
            'sistem_operasi' => 'Windows 11',
            'tipe_laptop' => 'Gaming',
            'harga' => 23000000,
            'link' => 'http://example.com',
        ]);

        // Act: Admin deletes the laptop
        $deleteResponse = $this->delete("crud-table/{id}");

        // Assert: Verify the laptop is deleted
        $deleteResponse->assertStatus(200);
        $this->assertDatabaseMissing('laptops', [
            'id' => $laptop->id,
        ]);
    }
}
