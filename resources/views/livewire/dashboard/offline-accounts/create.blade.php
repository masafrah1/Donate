<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link
            href="{{ route('dashboard.offline-accounts.index') }}"
            >{{ __('crud.offlineAccounts.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.offlineAccounts.itemTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.offlineAccounts.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="bank_name"
                        >{{ __('crud.offlineAccounts.inputs.bank_name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.bank_name"
                        name="bank_name"
                        id="bank_name"
                        placeholder="{{ __('crud.offlineAccounts.inputs.bank_name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.bank_name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="swift_code"
                        >{{ __('crud.offlineAccounts.inputs.swift_code.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.swift_code"
                        rows="6"
                        name="swift_code"
                        id="swift_code"
                        placeholder="{{ __('crud.offlineAccounts.inputs.swift_code.placeholder') }}"
                    />
                    <x-ui.input.error for="form.swift_code" />
                </div>

                <div class="w-full">
                    <x-ui.label for="iban"
                        >{{ __('crud.offlineAccounts.inputs.iban.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.iban"
                        name="iban"
                        id="iban"
                        placeholder="{{ __('crud.offlineAccounts.inputs.iban.placeholder') }}"
                    />
                    <x-ui.input.error for="form.iban" />
                </div>

                <div class="w-full">
                    <x-ui.label for="beneficiary"
                        >{{ __('crud.offlineAccounts.inputs.beneficiary.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.beneficiary"
                        name="beneficiary"
                        id="beneficiary"
                        placeholder="{{ __('crud.offlineAccounts.inputs.beneficiary.placeholder') }}"
                    />
                    <x-ui.input.error for="form.beneficiary" />
                </div>
            </div>

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit">Save</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
