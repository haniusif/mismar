<?php

namespace Modules\Mismar\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Modules\Mismar\Models\MismarOrder;

class MismarControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $order = MismarOrder::factory()->create();

        $response = $this->getJson(route('orders.index'));

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'mismar_order_id' => $order->mismar_order_id,
                 ]);
    }

    public function test_show()
    {
        $order = MismarOrder::factory()->create();

        $response = $this->getJson(route('orders.show', $order->id));

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'mismar_order_id' => $order->mismar_order_id,
                 ]);
    }

    public function test_store()
    {
        $data = [
            'mismar_order_id' => 'unique_order_id',
            'mismar_customer_phone' => '1234567890',
            'mismar_customer_lat' => '25.276987',
            'mismar_customer_long' => '55.296249',
            'mismar_customer_address' => '123 Street Name',
            'mismar_car_plate' => 'ABC123',
            'mismar_order_time' => now()->addHour()->format('Y-m-d H:i'),
            'mismar_order_status' => 'pending',
        ];

        $response = $this->postJson(route('orders.store'), $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'mismar_order_id' => $data['mismar_order_id'],
                 ]);

        $this->assertDatabaseHas('mismar_orders', $data);
    }

    public function test_update()
    {
        $order = MismarOrder::factory()->create();
        $data = [
            'mismar_customer_phone' => '0987654321',
            'mismar_customer_lat' => '26.276987',
            'mismar_customer_long' => '56.296249',
            'mismar_customer_address' => '456 Street Name',
            'mismar_car_plate' => 'XYZ789',
            'mismar_order_time' => now()->addHour()->format('Y-m-d H:i'),
            'mismar_order_status' => 'completed',
        ];

        $response = $this->putJson(route('orders.update', $order->id), $data);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'mismar_customer_phone' => $data['mismar_customer_phone'],
                 ]);

        $this->assertDatabaseHas('mismar_orders', $data);
    }

    public function test_change_order_location()
    {
        $order = MismarOrder::factory()->create();
        $data = [
            'mismar_customer_lat' => '27.276987',
            'mismar_customer_long' => '57.296249',
            'mismar_customer_address' => '789 Street Name',
        ];

        $response = $this->postJson(route('mismar.staging.orders.change_location', $order->id), $data);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'mismar_customer_lat' => $data['mismar_customer_lat'],
                 ]);

        $this->assertDatabaseHas('mismar_orders', $data);
    }

    public function test_change_order_time()
    {
        $order = MismarOrder::factory()->create();
        $data = [
            'mismar_order_time' => now()->addHours(2)->format('Y-m-d H:i'),
        ];

        $response = $this->postJson(route('mismar.staging.orders.change_time', $order->id), $data);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'mismar_order_time' => $data['mismar_order_time'],
                 ]);

        $this->assertDatabaseHas('mismar_orders', $data);
    }

    public function test_cancel_order()
    {
        $order = MismarOrder::factory()->create();

        $response = $this->getJson(route('mismar.staging.orders.cancel', $order->id));

        $response->assertStatus(204);

        $this->assertDatabaseHas('mismar_orders', [
            'id' => $order->id,
            'mismar_order_status' => 'cancelled',
        ]);
    }
}
