@props([
    'id',
    'name',
    'type' => 'text',
    'label' => '',
    'icon' => 'fa-circle'
])

<div class="flex flex-wrap space-x-4 mb-5">
    <label for="{{ $id }}" class="block text-sm text-orange-400 mb-1">{{ $label }}</label>
    <div class="flex items-center border-b border-orange-400">
        <i class="fas {{ $icon }} text-orange-400 mr-3"></i>
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name) }}"
            class="bg-transparent focus:bg-transparent w-full py-2 text-white placeholder-gray-400 focus:outline-none"
            placeholder="Entrez votre {{ strtolower($label) }}"
            {{ $attributes }}
        >
    </div>
    @error($name)
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
