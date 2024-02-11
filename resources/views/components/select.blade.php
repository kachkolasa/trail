@props(["disabled" => false])

<select {{ $disabled ? 'disabled' : '' }}  {{ $attributes->merge(["class" => "disabled:opacity-100 w-full py-2.5 px-4 bg-gray-900 text-gray-400 focus:text-white rounded-md focus:outline-none focus:ring-primary focus:ring-2"]) }}>
    {{$slot}}
</select>