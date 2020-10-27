<?php

namespace Tests\Feature;

use App\Http\Livewire\TagsComponent;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TagsComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tags_page_contains_livewire_tags_component()
    {
        $this->get('tags')
            ->assertSeeLivewire('tags-component');
    }

    /** @test */
    public function loads_existing_tags_correctly()
    {
        $tagA = Tag::create(['name' => 'TagA']);
        $tagB = Tag::create(['name' => 'TagB']);

        Livewire::test(TagsComponent::class)
            ->assertSet('tags', json_encode(['TagA', 'TagB']));
    }

    /** @test */
    public function adds_new_tags_correctly()
    {
        $tagA = Tag::create(['name' => 'TagA']);
        $tagB = Tag::create(['name' => 'TagB']);

        Livewire::test(TagsComponent::class)
            ->emit('tagAdded', 'TagC');

        $this->assertDatabaseHas('tags', [
            'name' => 'TagC'
        ]);
    }

    /** @test */
    public function removes_new_tags_correctly()
    {
        $tagA = Tag::create(['name' => 'TagA']);
        $tagB = Tag::create(['name' => 'TagB']);

        Livewire::test(TagsComponent::class)
            ->emit('tagRemoved', 'TagA');

        $this->assertDatabaseMissing('tags', [
            'name' => 'TagA'
        ]);
    }
}
