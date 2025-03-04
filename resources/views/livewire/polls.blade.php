<div>
    @forelse ( $polls as $poll)
    <div class="mb-4 border p-4 rounded-md">
        <h3 class="text-lg font-semibold">
            {{ $poll->title }}
        </h3>
        @foreach ( $poll->options as $option)
            <div class="">
                <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                {{ $option->name }} ({{ $option->votes->count() }})
            </div>
        @endforeach
    </div>

    @empty
        <div class="text-gray-500">
            No poll available
        </div>

    @endforelse
</div>
