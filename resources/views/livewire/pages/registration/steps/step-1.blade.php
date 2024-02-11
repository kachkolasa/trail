
<div class="grid grid-cols-2 gap-5">
    {{-- First Name --}}
    <div class="">
        <x-input-label for="first_name" label="First Name" />
        <x-input type="text" name="first_name" id="first_name" wire:model="first_name" autofocus />
        <x-input-error for="first_name" />
    </div>

    {{-- Last Namee --}}
    <div class="">
        <x-input-label for="last_name" label="Last Name" />
        <x-input type="text" name="last_name" id="last_name" wire:model="last_name" />
        <x-input-error for="last_name" />
    </div>

    {{-- Address --}}
    <div class="col-span-2">
        <x-input-label for="address" label="Address" />
        <x-input type="text" name="address" id="address" wire:model="address" />
        <x-input-error for="address" />
    </div>

    {{-- City --}}
    <div class="">
        <x-input-label for="city" label="City" />
        <x-input type="text" name="city" id="city" wire:model="city" />
        <x-input-error for="city" />
    </div>

    {{-- Country --}}
    <div class="">
        <x-input-label for="country" label="Country" />
        <x-select name="country" id="country" wire:model="country">
            <option value="" selected disabled></option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="MX">Mexico</option>
        </x-select>
        <x-input-error for="country" />
    </div>

    {{-- Date of Birth --}}
    <div class="col-span-2">
        <x-input-label for="dob_month" label="Date of Birth" />
        <div class="flex gap-2">
            <div>
                @livewire("dropdown-select", [
                    "name" => "dob_month",
                    "id" => "dob_month",
                    "options" => range(1, 12),
                    "placeholder" => "mm",
                    "class" => "!w-[50px]",
                    "width" => "50px",
                    "type" => "number",
                    "min" => 1,
                    "max" => 12,
                    "selected" => $dob_month
                ])
            </div>
            <div>
                @livewire("dropdown-select", [
                    "name" => "dob_day",
                    "id" => "dob_day",
                    "options" => range(1, 31),
                    "placeholder" => "dd",
                    "class" => "!w-[50px]",
                    "width" => "50px",
                    "type" => "number",
                    "min" => 1,
                    "max" => 31,
                    "selected" => $dob_day
                ])
            </div>
            <div>
                @livewire("dropdown-select", [
                    "name" => "dob_year",
                    "id" => "dob_year",
                    "options" => range(1900, intval(date("Y"))),
                    "placeholder" => "yyyy",
                    "class" => "!w-[80px]",
                    "width" => "80px",
                    "type" => "number",
                    "min" => 1900,
                    "max" => intval(date("Y")),
                    "selected" => $dob_year
                ])
            </div>
        </div>
        <x-input-error for="dob_day" />
        <x-input-error for="dob_month" />
        <x-input-error for="dob_year" />
        <x-input-error for="date_of_birth" />
    </div>
</div>

{{-- Actions --}}
<div class="flex flex-wrap items-center justify-end mt-5">
    <x-button
        wire:loading.disabled
        wire:target="next"
        wire:click="next"
        :disabled="!$can_submit"
        type="button">

        Next <i class="bi bi-arrow-right ml-2"></i>

    </x-button>
</div>