<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Leaders\Forms\CreateForm;

class LeaderCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', Leader::class);

        $this->validate();

        $leader = $this->form->save();

        return redirect()->route('dashboard.leaders.edit', $leader);
    }

    public function render()
    {
        return view('livewire.dashboard.leaders.create', []);
    }
}
