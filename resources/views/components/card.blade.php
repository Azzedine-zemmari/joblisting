<div {{$attributes->merge(['class'=>'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    {{$slot}}
</div>
{{--this $attributes->merge let me pass new class if i need like this <x-card class="p-10">}}