@extends('layouts/main')
@section('title', 'Idade')


@section('card-title', 'Idade')

@section('card-text')

@if ($flagIdade == 0)
<p>Coloque um ano anterior ao atual!</p>

@elseif($dia == 0 && $mes == 0)
<p>Sua idade é {{$idade->y}} anos.</p>

@elseif($dia == 0)
<p>Sua idade é {{$idade->y}} ano (s) e {{$idade->m}} mes (es).</p>

@else
<p>Sua idade é {{$idade->y}} ano (s), {{$idade->m}} mes (es) e {{$idade->d}} dia(s).</p>
@endif



@endsection

@section('content')

@endsection