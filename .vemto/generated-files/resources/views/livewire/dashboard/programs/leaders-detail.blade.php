<div>
    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="detailLeadersSearch"
            type="text"
            placeholder="Search {{ __('crud.leaders.collectionTitle') }}..."
        />

        @can('create', App\Models\Leader::class)
        <a wire:click="newLeader()">
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Modal --}}
    <x-ui.modal wire:model="showingModal">
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
                            >{{ __('crud.leaders.inputs.phone.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.text
                            class="w-full"
                            wire:model="form.phone"
                            name="phone"
                            id="phone"
                            placeholder="{{ __('crud.leaders.inputs.phone.placeholder') }}"
                        />
                        <x-ui.input.error for="form.phone" />
                    </div>

                    <div class="w-full">
                        <x-ui.label for="email"
                            >{{ __('crud.leaders.inputs.email.label')
                            }}</x-ui.label
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
                        <x-ui.input.text
                            class="w-full"
                            wire:model="form.currency"
                            name="currency"
                            id="currency"
                            placeholder="{{ __('crud.leaders.inputs.currency.placeholder') }}"
                        />
                        <x-ui.input.error for="form.currency" />
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
                            step="1"
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

                    <div class="w-full">
                        <x-ui.label for="payment_method"
                            >{{ __('crud.leaders.inputs.payment_method.label')
                            }}</x-ui.label
                        >
                        <x-ui.input.text
                            class="w-full"
                            wire:model="form.payment_method"
                            name="payment_method"
                            id="payment_method"
                            placeholder="{{ __('crud.leaders.inputs.payment_method.placeholder') }}"
                        />
                        <x-ui.input.error for="form.payment_method" />
                    </div>
                </div>

                <div
                    class="flex justify-between mt-4 border-t border-gray-50 bg-gray-50 p-4"
                >
                    <div>
                        <!-- Other buttons here -->
                    </div>
                    <div>
                        <x-ui.button type="submit">Save</x-ui.button>
                    </div>
                </div>
            </form>
        </div>
    </x-ui.modal>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingLeaderDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingLeaderDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="deleteLeader({{ $deletingLeader }})"
                wire:loading.attr="disabled"
            >
                {{ __('Delete') }}
            </x-ui.button.danger>
        </x-slot>
    </x-ui.modal.confirm>

    {{-- Index Table --}}
    <x-ui.container.table>
        <x-ui.table>
            <x-slot name="head">
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('first_name')"
                    >{{ __('crud.leaders.inputs.first_name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('family_name')"
                    >{{ __('crud.leaders.inputs.family_name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('phone')"
                    >{{ __('crud.leaders.inputs.phone.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('email')"
                    >{{ __('crud.leaders.inputs.email.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('currency')"
                    >{{ __('crud.leaders.inputs.currency.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('amount')"
                    >{{ __('crud.leaders.inputs.amount.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-detailCrud wire:click="sortBy('country')"
                    >{{ __('crud.leaders.inputs.country.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('is_private')"
                    >{{ __('crud.leaders.inputs.is_private.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('number_orphans')"
                    >{{ __('crud.leaders.inputs.number_orphans.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-detailCrud
                    wire:click="sortBy('payment_method')"
                    >{{ __('crud.leaders.inputs.payment_method.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($detailLeaders as $leader)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->first_name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->family_name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->phone }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->email }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->currency }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->amount }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->country }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->is_private }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->number_orphans }}</x-ui.table.column
                    >
                    <x-ui.table.column for-detailCrud
                        >{{ $leader->payment_method }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $leader)
                        <x-ui.action wire:click="editLeader({{ $leader->id }})"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $leader)
                        <x-ui.action.danger
                            wire:click="confirmLeaderDeletion({{ $leader->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="11"
                        >No {{ __('crud.leaders.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $detailLeaders->links() }}</div>
    </x-ui.container.table>
</div>
