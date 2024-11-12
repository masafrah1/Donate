<?php

namespace App\Livewire\Dashboard;

use App\Models\Leader;
use Livewire\Component;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Leaders\Forms\UpdateForm;

class LeaderEdit extends Component
{
    public ?Leader $leader = null;

    public UpdateForm $form;

    public function mount(Leader $leader)
    {
        $this->authorize('view-any', Leader::class);

        $this->leader = $leader;

        $this->form->setLeader($leader);
    }

    public function save()
    {
        $this->authorize('update', $this->leader);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.leaders.edit', []);
    }
}
