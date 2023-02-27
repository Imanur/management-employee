<button {{ $attributes->merge(['type' => 'submit','class'=> 'btn-block']) }}>
    {{ $slot }}
</button>
