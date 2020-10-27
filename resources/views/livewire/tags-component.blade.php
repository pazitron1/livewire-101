<div
    wire:ignore
    class="w-1/2 px-4 py-2 mt-10 border border-blue-100 shadow rounded-md"
    x-data
    x-init="
        new Taggle($el, {
            tags: {{$tags}},
            onTagAdd: function(e, tag) {
                Livewire.emit('tagAdded', tag);
            },
            onTagRemove: function(e, tag) {
                Livewire.emit('tagRemoved', tag);
            }
        })
    "
>
