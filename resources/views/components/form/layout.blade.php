@props(['method' => 'GET', 'action' => '/'])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes(['class' => 'w-full   ']) }}>
    @csrf

    {{ $slot }}


</form>
