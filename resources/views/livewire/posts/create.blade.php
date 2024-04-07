<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Events\PostCreated;

new class extends Component 
{
    #[Validate('required|string|max:255')]
    public string $message = ''; 

    public function store(): void
    {
        $validated = $this->validate();

        // Create a new post and assign it to $post
        $post = auth()->user()->posts()->create($validated);

        // Dispatch the PostCreated event with the newly created post
        event(new PostCreated($post));

        $this->message = '';

        // Dispatch a Livewire event
        $this->dispatch('post-created');
    }
}; ?>

<div>
    <form wire:submit="store">  
        <textarea
            wire:model="message"
            placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
 
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
    </form> 
</div>
