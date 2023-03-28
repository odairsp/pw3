<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/hello/{nome}', function ($nome) {
    $user = strtoupper($nome);
    return view('home/hello', ['user' => $user]);
})->where('nome', '[a-zA-Z]{3,10}')->name('home');

Route::get('/conta/{numero1}/{numero2}/{operacao?}', function (int $numero1, int $numero2, string $operacao = null) {
    $resultado  = 0;
    $operacao = strtolower($operacao);
    switch ($operacao) {

        case null:
            $resultado=['soma'=>$numero1 + $numero2,'subtracao'=>$numero1 - $numero2,
            'multiplicacao' => $numero1 * $numero2, 'divisao'=>$numero1 / $numero2 ];
            break;
        case "soma":
            $resultado = $numero1 + $numero2;
            break;
        case "subtracao":
            $resultado = $numero1 - $numero2;
            break;
        case "multiplicacao":
            $resultado = $numero1 * $numero2;
            break;
        case "divisao":
            $resultado = $numero1 / $numero2;
            break;
        default:
            $resultado = 'Digite uma operação válida!<br>
        ["soma", "subtração", "multiplicação", "divisão"]';
            break;
    }

    return view('home/calculadora', ['resultado' => $resultado, 'numero1' => $numero1, 'numero2' => $numero2, 'operacao' => $operacao]);
})->where(['numero1' => '[0-9]{1,10}', 'numero2' => '[0-9]{1,10}', 'operacao' => '[a-zA-Z]{4,13}'])->name('calculadora');





Route::get('/idade/{ano}/{mes?}/{dia?}', function (int $ano, int $mes = null, int $dia = null) {
    return '';
})->name('idade');