<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {

        // Create a user
        $user = User::factory()->create();

        // Create orders for the user
        $order = Order::factory()->create(['user_id' => $user->id]);

        // Create payments for the order
        $payment1 = Payment::factory()->create(['order_id' => $order->id, 'amount' => 100]);
        $payment2 = Payment::factory()->create(['order_id' => $order->id, 'amount' => 150]);

        // Act: Visit the user details page
        $response = $this->get(route('user.show', $user->id));
        // Assert: Check if the orders and payments are displayed
        $response->assertStatus(200);
        $response->assertSee($order->id);
        $response->assertSee($payment1->amount);
        $response->assertSee($payment2->amount);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
