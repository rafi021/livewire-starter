<section>
<form action="" wire:submit='save' class="flex flex-col gap-6">
    <flux:input
        wire:model="name"
        :label="__('Task Name')"
        required
        badge="required"
    />
    <flux:input
        wire:model="due_date"
        type="date"
        :label="__('Due Date')"
    />

    <div class="">
        <flux:button variant="primary" type="submit" class="">{{ __('Save') }}</flux:button>
    </div>
</form>
</section>
