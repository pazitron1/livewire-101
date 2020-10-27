<?php

namespace Tests\Feature;

use App\Http\Livewire\PollExample;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PollTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function welcome_page_has_poll_example_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('poll-example');
    }

    /** @test */
    public function poll_sums_orders_correctly()
    {
        $orderOne = Order::create(['price' => 101]);
        $orderTwo = Order::create(['price' => 15]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSee('£116');
    }
}
