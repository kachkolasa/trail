
<h2 class="text-xl font-semibold text-gray-900 dark:text-white"><i class="bi bi-check2-circle text-green-400 mr-2"></i> Thank you for your time!</h2>
<p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis aperiam ullam, corrupti in deleniti dolores. Inventore dolore repudiandae delectus recusandae?</p>

<p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">We have received your submission with the following data:</p>

<div class="mt-4">
    <div class="grid grid-cols-3 gap-5">
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">First Name:</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->first_name }}</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Last Name:</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->last_name }}</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Address:</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->address }}</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">City:</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->city }}</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Country:</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->country }}</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Date of Birth:</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->date_of_birth->format("m-d-Y") }}</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Are you married?</p>
            <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->is_married ? "Yes" : "No" }}</p>
        </div>
        @if($submission->is_married)
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Date of Marriage:</p>
                <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->date_of_marriage->format("m-d-Y") }}</p>
            </div>
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Country of Marriage:</p>
                <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->country_of_marriage }}</p>
            </div>
        @else
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Are you widowed?</p>
                <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->is_widowed ? "Yes" : "No"  }}</p>
            </div>
            <div>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Have you ever been married in the past?</p>
                <p class="text-gray-900 dark:text-white font-semibold">{{ $submission->ever_married ? "Yes" : "No" }}</p>
            </div>
        @endif
    </div>

    <div>
        <x-button color="secondary" wire:click="restart">Submit another one</x-button>
    </div>
</div>