<button {{ $attributes->merge(['type' => 'submit', 'class' => 'submit']) }}>
    {{ $slot }}
</button>
