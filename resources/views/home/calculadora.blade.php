@extends('layouts/main')
@section('card-title', 'Operações')



@if (is_array($resultado))
    @section('card-text')
        @foreach ($resultado as $operacao => $result)
            <h6>
                A {{ mb_strtoupper($operacao, 'utf-8') }} de {{ $numero1 }} e {{ $numero2 }} é =
                {{ $result }}!
            </h6>
        @endforeach
    @endsection
@elseif(strlen($text) > 1)
    @section('card-title', 'Erro')
    @section('card-text', $text)
@else
    @section('card-title', mb_strtoupper($operacao, 'utf-8'))
    @section('card-text', 'A ' . $operacao . ' de ' . $numero1 . ' e ' . $numero2 . ' é = ' . $resultado . '!')

@endif


@section('content')

@endsection
