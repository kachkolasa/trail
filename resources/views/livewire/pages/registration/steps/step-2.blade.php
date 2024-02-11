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
            <x-input-label for="marriage_day" label="Date of Marriage" />
            <div class="grid grid-cols-3 gap-2">
                <div>
                    <x-select name="marriage_month" id="marriage_month" wire:model="marriage_month" wire:change="marriage_date_changed">
                        <option value="" selected>Month</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
                </div>
                <div>
                    <x-select name="marriage_day" id="marriage_day" wire:model="marriage_day" wire:change="marriage_date_changed">
                        <option value="" selected>Day</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
                </div>
                <div>
                    <x-select name="marriage_year" id="marriage_year" wire:model="marriage_year" wire:change="marriage_date_changed">
                        <option value="" selected>Year</option>
                        @for ($i = 1900; $i <= 2024; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
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