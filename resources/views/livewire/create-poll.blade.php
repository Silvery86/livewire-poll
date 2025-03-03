<div>
    <form>
        <label>Poll Title</label>
        <input type="text" wire:model.live='title' />
        <p>Current title: {{ $title }}</p>
    </form>
</div>
