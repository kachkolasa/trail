@props(['label'])
<label {{ $attributes->merge(["class" => "w-full block mb-1 text-gray-400"]) }}>{{$label}}</label>