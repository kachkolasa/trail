<div class="relative dropdown-select">
    <x-input 
        type="{{$type}}"
        wire:model="selected"
        placeholder="{{$placeholder}}"
        name="{{$name}}"
        id="{{$id}}"
        class="{{$class}} !w-[{{$width}}] hide-arrows text-center px-2"
        min="{{$min}}"
        max="{{$max}}"
        wire:change="select"
    />

    <ul class="absolute hidden top-[calc(100%+5px)] bg-gray-900 text-gray-400 text-center overflow-hidden rounded-md !w-[{{$width}}] max-h-[200px] overflow-y-auto shadow shadow-gray-800 custom-scrollbar">
        @foreach($options as $option)
            <li class="py-2 hover:bg-gray-800 hover:text-white cursor-pointer option">{{$option}}</li>
        @endforeach
    </ul>
</div>