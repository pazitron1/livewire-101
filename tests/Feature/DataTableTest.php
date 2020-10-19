<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTables;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DataTableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_page_contains_datatables_livewire_component()
    {
        $this->get('users')
            ->assertSeeLivewire('data-tables');
    }

    /** @test */
    public function datatables_active_checkbox_works()
    {
        $userA = User::create([
            'name' => 'Bob',
            'email' => 'bob@doe.com',
            'password' => bcrypt('password'),
            'active' => true
        ]);

        $userB = User::create([
            'name' => 'Sam',
            'email' => 'sam@doe.com',
            'password' => bcrypt('password1'),
            'active' => true
        ]);

        Livewire::test(DataTables::class)
            ->assertSee($userA->name)
            ->assertSee($userB->name)
            ->set('active', false)
            ->assertDontSee($userA->name)
            ->assertDontSee($userB->name);
    }

    /** @test */
    public function datatables_searches_name_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->assertSee($userA->name)
            ->assertSee($userB->name)
            ->set('search', 'user')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }

    /** @test */
    public function datatables_searches_email_correctly()
    {
        $userA = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Another',
            'email' => 'another@another.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->assertSee($userA->name)
            ->assertSee($userB->name)
            ->set('search', 'another@another.com')
            ->assertSee($userB->email)
            ->assertDontSee($userA->name);
    }

    /** @test */
    public function datatables_sorts_name_asc_correctly()
    {
        $userC = User::create([
            'name' => 'Sam C',
            'email' => 'sam@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'John A',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Tom B',
            'email' => 'tom-b@another.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['John A', 'Sam C', 'Tom B']);
    }

    /** @test */
    public function datatables_sorts_name_desc_correctly()
    {
        $userC = User::create([
            'name' => 'Sam C',
            'email' => 'sam@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'John A',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Tom B',
            'email' => 'tom-b@another.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'name')
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['Tom B', 'Sam C', 'John A']);
    }

    /** @test */
    public function datatables_sorts_email_asc_correctly()
    {
        $userC = User::create([
            'name' => 'Sam C',
            'email' => 'sam@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'John A',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Tom B',
            'email' => 'tom-b@another.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['john@example.com', 'sam@user.com', 'tom-b@another.com']);
    }

    /** @test */
    public function datatables_sorts_email_desc_correctly()
    {
        $userC = User::create([
            'name' => 'Sam C',
            'email' => 'sam@user.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userA = User::create([
            'name' => 'John A',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB = User::create([
            'name' => 'Tom B',
            'email' => 'tom-b@another.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        Livewire::test(DataTables::class)
            ->call('sortBy', 'email')
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['tom-b@another.com', 'sam@user.com', 'john@example.com']);
    }
}
