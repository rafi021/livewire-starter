<section>
    <div class="container mx-auto max-w-3xl">
        <div class="grid grid-cols-1 gap-6">
            <form action="" wire:submit='save' class="flex flex-col gap-6" enctype="multipart/form-data">
                <flux:input wire:model="name" :label="__('Task Name')" required badge="required" />
                <flux:input wire:model="due_date" type="date" :label="__('Due Date')" />

                <flux:input wire:model="media" type="file" :label="__('Media')" />

                <div class="">
                    <flux:button variant="primary" type="submit" class="">{{ __('Save') }}</flux:button>
                </div>
            </form>
        </div>
    </div>
</section>
