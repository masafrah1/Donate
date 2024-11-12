<?php

namespace App\Livewire\Dashboard\Leaders\Forms;

use Livewire\Form;
use App\Models\Leader;
use Livewire\Attributes\Rule;

class UpdateDetailForm extends Form
{
    public ?Leader $leader;

    public $first_name = '';

    public $family_name = '';

    public $phone = '';

    public $email = '';

    public $currency = '';

    public $amount = '';

    public $country = '';

    public $is_private = '';

    public $number_orphans = '';

    public $payment_method = '';

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'family_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'amount' => ['required'],
            'country' => ['required', 'string'],
            'is_private' => ['required', 'boolean'],
            'number_orphans' => ['nullable'],
            'payment_method' => ['required', 'string'],
        ];
    }

    public function setLeader(Leader $leader)
    {
        $this->leader = $leader;

        $this->first_name = $leader->first_name;
        $this->family_name = $leader->family_name;
        $this->phone = $leader->phone;
        $this->email = $leader->email;
        $this->currency = $leader->currency;
        $this->amount = $leader->amount;
        $this->country = $leader->country;
        $this->is_private = $leader->is_private;
        $this->number_orphans = $leader->number_orphans;
        $this->payment_method = $leader->payment_method;
    }

    public function save()
    {
        $this->validate();

        $this->leader->update($this->except(['leader']));
    }
}
