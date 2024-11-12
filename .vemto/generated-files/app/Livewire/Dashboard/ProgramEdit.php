<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Program;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Programs\Forms\UpdateForm;

class ProgramEdit extends Component
{
    public ?Program $program = null;

    public UpdateForm $form;

    public function mount(Program $program)
    {
        $this->authorize('view-any', Program::class);

        $this->program = $program;

        $this->form->setProgram($program);
    }

    public function save()
    {
        $this->authorize('update', $this->program);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.programs.edit', []);
    }
}
