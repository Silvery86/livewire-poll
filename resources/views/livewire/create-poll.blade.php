<div>
    <form wire:submit.prevent="createPoll">
        <h1>Create New Poll</h1>
        <label>Poll Title</label>
        <input type="text" wire:model.live='title' />
        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>

        </div>

        <div>
            @foreach ($options as $index => $option)
                <label>Option {{ $index + 1 }}</label>
                <input type="text" wire:model.live='options.{{ $index }}' placeholder="Fill your option here"/>
                <button class="btn mt-4" wire:click.prevent="removeOption({{ $index }})">Remove Option</button>
            @endforeach
        </div>
        <div class="mt-4">
            <button class="btn" type="submit">Create Poll</button>
        </div>

    </form>
</div>
