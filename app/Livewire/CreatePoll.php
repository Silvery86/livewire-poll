<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{

    public $title;

    public $options = [""];

    protected $rules = [
        'title' => 'required|string|min:6',
        'options' => 'required|array|min:2|max:10',
        'options.*' => 'required|string|min:3',
    ];

    protected $messages = [
        'options.*.required' => 'Option cannot be empty',
        'options.*.min' => 'Option must be at least 3 characters',
        'options.min' => 'Must have at least 2 options',
    ];


    public function render()
    {
        return view('livewire.create-poll');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate();

       Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)
            ->map(fn($option) => ['name' => $option])
            ->all()
        );

        $this->reset('title', 'options');

    }
}
