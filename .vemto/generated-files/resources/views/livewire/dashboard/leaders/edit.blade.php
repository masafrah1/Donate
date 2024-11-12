<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.leaders.index') }}"
            >{{ __('crud.leaders.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Edit {{ __('crud.leaders.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <x-ui.toast on="saved"> Leader saved successfully. </x-ui.toast>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Edit {{ __('crud.leaders.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="first_name"
                        >{{ __('crud.leaders.inputs.first_name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.first_name"
                        name="first_name"
                        id="first_name"
                        placeholder="{{ __('crud.leaders.inputs.first_name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.first_name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="family_name"
                        >{{ __('crud.leaders.inputs.family_name.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.family_name"
                        name="family_name"
                        id="family_name"
                        placeholder="{{ __('crud.leaders.inputs.family_name.placeholder') }}"
                    />
                    <x-ui.input.error for="form.family_name" />
                </div>

                <div class="w-full">
                    <x-ui.label for="phone"
                        >{{ __('crud.leaders.inputs.phone.label') }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.phone"
                        name="phone"
                        id="phone"
                        placeholder="{{ __('crud.leaders.inputs.phone.placeholder') }}"
                        min="7"
                        max="13"
                    />
                    <x-ui.input.error for="form.phone" />
                </div>

                <div class="w-full">
                    <x-ui.label for="amount"
                        >{{ __('crud.leaders.inputs.amount.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.number
                        class="w-full"
                        wire:model="form.amount"
                        name="amount"
                        id="amount"
                        placeholder="{{ __('crud.leaders.inputs.amount.placeholder') }}"
                        step="10"
                    />
                    <x-ui.input.error for="form.amount" />
                </div>

                <div class="w-full">
                    <x-ui.label for="country"
                        >{{ __('crud.leaders.inputs.country.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.country"
                        name="country"
                        id="country"
                        placeholder="{{ __('crud.leaders.inputs.country.placeholder') }}"
                    />
                    <x-ui.input.error for="form.country" />
                </div>

                <div class="w-full">
                    <x-ui.input.checkbox
                        class=""
                        wire:model="form.is_private"
                        name="is_private"
                        id="is_private"
                    />
                    <x-ui.label for="is_private"
                        >{{ __('crud.leaders.inputs.is_private.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.error for="form.is_private" />
                </div>

                <div class="w-full">
                    <x-ui.label for="email"
                        >{{ __('crud.leaders.inputs.email.label') }}</x-ui.label
                    >
                    <x-ui.input.email
                        class="w-full"
                        wire:model="form.email"
                        name="email"
                        id="email"
                        placeholder="{{ __('crud.leaders.inputs.email.placeholder') }}"
                    />
                    <x-ui.input.error for="form.email" />
                </div>

                <div class="w-full">
                    <x-ui.label for="currency"
                        >{{ __('crud.leaders.inputs.currency.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.currency"
                        class="w-full"
                        id="currency"
                        name="currency"
                    >
                        <option value="">Select</option>
                        <option value="USD">USD</option>
                        <option value="ILS">ILS</option>
                        <option value="EUR">EUR</option>
                    </x-ui.input.select>
                    <x-ui.input.error for="currency" />
                </div>

                <div class="w-full">
                    <x-ui.label for="number_orphans"
                        >{{ __('crud.leaders.inputs.number_orphans.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.number
                        class="w-full"
                        wire:model="form.number_orphans"
                        name="number_orphans"
                        id="number_orphans"
                        placeholder="{{ __('crud.leaders.inputs.number_orphans.placeholder') }}"
                        step="1"
                    />
                    <x-ui.input.error for="form.number_orphans" />
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
