<?php

namespace App\Livewire\Dashboard\Programs\Forms;

use Livewire\Form;
use App\Models\Program;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Program $program;

    public $pay_link = '';

    public function rules(): array
    {
        return [
            'pay_link' => ['required'],
        ];
    }

    public function setProgram(Program $program)
    {
        $this->program = $program;

        $this->pay_link = $program->pay_link;
    }

    public function save()
    {
        $this->validate();

        $this->program->update($this->except(['program']));
    }
}
