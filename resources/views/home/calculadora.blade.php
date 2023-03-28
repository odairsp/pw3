@extends('layouts/main')
@section('title', 'Home')




@if (is_array($operacao))
    @section('card-title', 'Operações')
    @foreach ($operacao as $item)
        @section('card-text', 'A ' . $item . ' de ' . $numero1 . ' e ' . $numero2 . ' é = ' . $resultado . '!')
    @endif
@endforeach
@else
@section('card-title', strtoupper($operacao))
@section('card-text', 'A ' . $operacao . ' de ' . $numero1 . ' e ' . $numero2 . ' é = ' . $resultado . '!')
@endif


@section('content')

@endsection
