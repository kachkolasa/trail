<div class="grid grid-cols-2 gap-5">
    
    {{-- Are you married --}}
    <div class="col-span-2">
        <x-input-label for="is_married" label="Are you married?" />
        <div class="flex gap-5">
            <div class="flex items-center">
                <input type="radio" name="is_married" value="1" id="is_married_yes" wire:model="is_married" wire:change="set_is_married(true)">
                <label for="is_married_yes" class="ml-2 text-gray-400">Yes</label>
            </div>
            <div class="flex items-center">
                <input type="radio" name="is_married" value="0" id="is_married_no" wire:model="is_married" wire:change="set_is_married(false)">
                <label for="is_married_no" class="ml-2 text-gray-400">No</label>
            </div>
        </div>
        <x-input-error for="is_married" />
    </div>

    {{-- Is Married --}}
    @if($is_married == 1)
        
        {{-- Date of Marriage --}}
        <div>
            <x-input-label for="marriage_month" label="Date of Marriage" />
            <div class="flex gap-2">
                <div>
                    @livewire("dropdown-select", [
                        "name" => "marriage_month",
                        "id" => "marriage_month",
                        "options" => range(1, 12),
                        "placeholder" => "mm",
                        "class" => "!w-[50px]",
                        "width" => "50px",
                        "type" => "number",
                        "min" => 1,
                        "max" => 12,
                        "selected" => $marriage_month
                    ])
                </div>
                <div>
                    @livewire("dropdown-select", [
                        "name" => "marriage_day",
                        "id" => "marriage_day",
                        "options" => range(1, 31),
                        "placeholder" => "dd",
                        "class" => "!w-[50px]",
                        "width" => "50px",
                        "type" => "number",
                        "min" => 1,
                        "max" => 31,
                        "selected" => $marriage_day
                    ])
                </div>
                <div>
                    @livewire("dropdown-select", [
                        "name" => "marriage_year",
                        "id" => "marriage_year",
                        "options" => range(1900, intval(date("Y"))),
                        "placeholder" => "yyyy",
                        "class" => "!w-[80px]",
                        "width" => "80px",
                        "type" => "number",
                        "min" => 1900,
                        "max" => intval(date("Y")),
                        "selected" => $marriage_year
                    ])
                </div>
            </div>
            <x-input-error for="marriage_day" />
            <x-input-error for="marriage_month" />
            <x-input-error for="marriage_year" />
            <x-input-error for="marriage_date" />
        </div>

        {{-- Country of Marriage --}}
        <div class="">
            <x-input-label for="country_of_marriage" label="Country of Marriage" />
            <x-select name="country_of_marriage" id="country_of_marriage" wire:model="country_of_marriage">
                <option value="" selected disabled></option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="MX">Mexico</option>
            </x-select>
            <x-input-error for="country_of_marriage" />
        </div>


    {{-- Is Not Married --}}
    @elseif($is_married == 0 && $is_married !== null)

        {{-- Are you widowed --}}
        <div>
            <x-input-label for="is_widowed" label="Are you widowed?" />
            <div class="flex gap-5">
                <div class="flex items-center">
                    <input type="radio" name="is_widowed" value="1" id="is_widowed_yes" wire:model="is_widowed">
                    <label for="is_widowed_yes" class="ml-2 text-gray-400">Yes</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="is_widowed" value="0" id="is_widowed_no" wire:model="is_widowed">
                    <label for="is_widowed_no" class="ml-2 text-gray-400">No</label>
                </div>
            </div>
            <x-input-error for="is_widowed" />
        </div>

        {{-- Ever been married --}}
        <div>
            <x-input-label for="ever_married" label="Have you ever been married in the past?" />
            <div class="flex gap-5">
                <div class="flex items-center">
                    <input type="radio" name="ever_married" value="1" id="ever_married_yes" wire:model="ever_married">
                    <label for="ever_married_yes" class="ml-2 text-gray-400">Yes</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="ever_married" value="0" id="ever_married_no" wire:model="ever_married">
                    <label for="ever_married_no" class="ml-2 text-gray-400">No</label>
                </div>
            </div>
            <x-input-error for="ever_married" />
        </div>
    @endif
</div>

{{-- Actions --}}
<div class="flex flex-wrap items-center justify-between mt-5">
    <x-button wire:click="back" color="secondary" type="button"><i class="bi bi-arrow-left mr-2"></i> Previous</x-button>
    <x-button
        wire:loading.disabled
        wire:target="next"
        wire:click="next"
        :disabled="!$can_submit"
        type="button">

        Submit

    </x-button>
</div>