<div>
    <form wire:submit.prevent="createPoll">
        <h1>Create New Poll</h1>
        <label>Poll Title</label>
        <input type="text" wire:model.live='title' />
        @error('title')
            <span class="error">{{ $message }}</span>
        @enderror
        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>
        @error('options')
            <div class="error">{{ $message }}</span>
            @enderror
            @foreach ($options as $index => $option)
                <div class="mb-4 flex flex-nowrap flex-col">

                    <label>Option {{ $index + 1 }}</label>
                    <input type="text" wire:model.live='options.{{ $index }}'
                        placeholder="Fill your option here" />
                    <button class="btn mt-4" wire:click.prevent="removeOption({{ $index }})">Remove
                        Option</button>
                    @error("options.{$index}")
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
            <div class="mt-4">
                <button class="btn" type="submit">Create Poll</button>
            </div>

    </form>
</div>
