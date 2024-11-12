<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\OfflineAccount;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\OfflineAccounts\Forms\UpdateForm;

class OfflineAccountEdit extends Component
{
    public ?OfflineAccount $offlineAccount = null;

    public UpdateForm $form;

    public function mount(OfflineAccount $offlineAccount)
    {
        $this->authorize('view-any', OfflineAccount::class);

        $this->offlineAccount = $offlineAccount;

        $this->form->setOfflineAccount($offlineAccount);
    }

    public function save()
    {
        $this->authorize('update', $this->offlineAccount);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.offline-accounts.edit', []);
    }
}
