<?php

namespace App\Livewire\Dashboard\Leaders\Forms;

use Livewire\Form;
use App\Models\Leader;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Leader $leader;

    public $first_name = '';

    public $family_name = '';

    public $phone = '059';

    public $amount = '';

    public $country = '';

    public $is_private = '';

    public $email = '';

    public $currency = '';

    public $number_orphans = '';

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'family_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'amount' => ['required'],
            'country' => ['required', 'string'],
            'is_private' => ['required', 'boolean'],
            'email' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'number_orphans' => ['required'],
        ];
    }

    public function setLeader(Leader $leader)
    {
        $this->leader = $leader;

        $this->first_name = $leader->first_name;
        $this->family_name = $leader->family_name;
        $this->phone = $leader->phone;
        $this->amount = $leader->amount;
        $this->country = $leader->country;
        $this->is_private = $leader->is_private;
        $this->email = $leader->email;
        $this->currency = $leader->currency;
        $this->number_orphans = $leader->number_orphans;
    }

    public function save()
    {
        $this->validate();

        $this->leader->update($this->except(['leader']));
    }
}
