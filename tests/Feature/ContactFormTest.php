<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /** @test */
    public function contact_page_has_contact_form_livewire_component()
    {
        $this->get('contact')->assertSeeLivewire('contact-form');
    }

    /** @test */
    public function contact_form_submits_data()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@doe.com')
            ->set('phone', '099232323111')
            ->set('message', 'This is a message')
            ->call('submitForm')
            ->assertSee('Your message has been submitted successfully!');
    }

    /** @test */
    public function contact_form_name_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'john@doe.com')
            ->set('phone', '099232323111')
            ->set('message', 'This is a message')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function contact_form_email_field_is_required()
    {
        Livewire::test(ContactForm::class)
             ->set('name', 'John Doe')
            ->set('phone', '099232323111')
            ->set('message', 'This is a message')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function contact_form_email_field_is_must_be_email_address()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john.doe.email.com')
            ->set('phone', '099232323111')
            ->set('message', 'This is a message')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function contact_form_phone_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@doe.com')
            ->set('message', 'This is a message')
            ->call('submitForm')
            ->assertHasErrors(['phone' => 'required']);
    }

    /** @test */
    public function contact_form_message_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@doe.com')
            ->set('phone', '124242424')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'required']);
    }

    /** @test */
    public function contact_form_message_field_must_not_exceeed_500_characters()
    {
        $faker = Factory::create();
        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@doe.com')
            ->set('phone', '124242424')
            ->set('message', $faker->text(1000))
            ->call('submitForm')
            ->assertHasErrors(['message' => 'max']);
    }
}
