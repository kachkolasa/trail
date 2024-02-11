@props(["disabled" => false, "color" => "primary"])

@php
$colors["default"] = "primary";
$colors["hover"] = "primary-dark";

if($color == "secondary"){
    $colors["default"] = "gray-900";
    $colors["hover"] = "gray-800";
}
@endphp

{{-- Tailwind Load These Classes --}}
{{-- bg-gray-900 bg-gray-800 hover:bg-gray-800 --}}

<button {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(["class" => "bg-".$colors["default"]." text-white rounded-md px-5 py-2 hover:bg-".$colors["hover"]." duration-100 disabled:opacity-25"]) }}>
    {{$slot}}
</button>