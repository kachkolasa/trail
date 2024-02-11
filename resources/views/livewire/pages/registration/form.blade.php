<div>
    <div class="w-full max-w-2xl scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        
            <div>
                @if($step !== 3)
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Registration</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque pariatur quia, quo totam nemo dolorum amet maiores rerum quidem iste recusandae quod velit, dignissimos ipsum dolorem optio! Eum, deserunt necessitatibus.
                    </p>

                    <form class="my-6" wire:submit.prevent="next">
                        {{-- Step One --}}
                        @if($step === 1)
                            @include("livewire.pages.registration.steps.step-1")
                        @endif

                        {{-- Step Two --}}
                        @if($step === 2)
                            @include("livewire.pages.registration.steps.step-2")
                        @endif
                    </form>
                @endif

                
                {{-- Successfully Stored --}}
                @if($step === 3)
                    @include("livewire.pages.registration.steps.success")
                @endif
            </div>
        
    </div>
</div>
