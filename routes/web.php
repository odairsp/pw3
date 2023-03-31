<?php

use App\Http\Controllers\ContasController;
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
    $text = '';
    $resultado  = 0;
    $operacao = mb_strtolower($operacao, 'utf-8');
    switch ($operacao) {
        case null:
            if ($numero2 == 0) {
                $resultado = [
                    'soma' => $numero1 + $numero2, 'subtração' => $numero1 - $numero2,
                    'multiplicação' => $numero1 * $numero2, 'divisão' => 'Não é possivel divisão por 0'
                ];
            } else {
                $resultado = [
                    'soma' => $numero1 + $numero2, 'subtração' => $numero1 - $numero2,
                    'multiplicação' => $numero1 * $numero2, 'divisão' => $numero1 / $numero2
                ];
            }

            break;
        case "soma":
            $resultado = $numero1 + $numero2;
            break;
        case "subtracao":
            $resultado = $numero1 - $numero2;
            $operacao = 'subtração';
            break;
        case "multiplicacao":
            $resultado = $numero1 * $numero2;
            $operacao = 'multiplicação';
            break;
        case "divisao":
            $resultado = $numero1 / $numero2;
            $operacao = 'divisão';
            break;
        default:
            $text = 'Entre com uma operação válida! 
        ["soma", "subtracao", "multiplicacao", "divisao"]';
            break;
    }

    return view('home/calculadora', ['text' => $text, 'resultado' => $resultado, 'numero1' => $numero1, 'numero2' => $numero2, 'operacao' => $operacao]);
})->where(['numero1' => '[0-9]{1,10}', 'numero2' => '[0-9]{1,10}', 'operacao' => '[a-zA-Z]{4,13}'])->name('calculadora');


Route::get('/idade/{ano}/{mes?}/{dia?}', function (int $ano, int $mes = 0, int $dia = 0) {

    $dateStart = new DateTime("$ano-$mes-$dia");
    $dateEnd = new DateTime('now');
    $flagIdade = 1;
    if (($dateStart->format('Y') >= $dateEnd->format('Y'))) {

        $flagIdade = 0;
    }

    $date = $dateEnd->diff($dateStart);
    $idade = $date;

    return view('home/idade', ['flagIdade' => $flagIdade, 'idade' => $idade, 'mes' => $mes, 'dia' => $dia]);
})->where(['ano' => '[0-9]{4}', 'mes' => '[0-9]{1,2}', 'dia' => '[0-9]{1,2}'])->name('idade');




Route::get('/contas/{numero1}/{numero2}/{operacao?}', [ContasController::class, 'contas'])
->where(['numero1' => '[0-9]{1,10}', 'numero2' => '[0-9]{1,10}'])
->whereIn('operacao', ['soma', 'subtracao', 'multiplicacao', 'divisao'])->name('contas');