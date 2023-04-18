@props(['method' => 'GET', 'action' => '/'])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes(['class' => 'w-full  md:max-w-md ']) }}>
    @csrf

    {{ $slot }}


</form>
