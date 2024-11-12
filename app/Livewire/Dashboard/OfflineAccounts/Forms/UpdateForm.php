<?php

namespace App\Livewire\Dashboard\OfflineAccounts\Forms;

use Livewire\Form;
use App\Models\OfflineAccount;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?OfflineAccount $offlineAccount;

    public $bank_name = '';

    public $swift_code = '';

    public $iban = '';

    public $beneficiary = '';

    public function rules(): array
    {
        return [
            'bank_name' => ['required', 'string'],
            'swift_code' => ['required'],
            'iban' => ['required', 'string'],
            'beneficiary' => ['required', 'string'],
        ];
    }

    public function setOfflineAccount(OfflineAccount $offlineAccount)
    {
        $this->offlineAccount = $offlineAccount;

        $this->bank_name = $offlineAccount->bank_name;
        $this->swift_code = $offlineAccount->swift_code;
        $this->iban = $offlineAccount->iban;
        $this->beneficiary = $offlineAccount->beneficiary;
    }

    public function save()
    {
        $this->validate();

        $this->offlineAccount->update($this->except(['offlineAccount']));
    }
}
