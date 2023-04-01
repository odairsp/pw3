<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class ContasController extends Controller
{

    public function contas(int $numero1, int $numero2, $operacao = null)
    {
        $operacoes = ['soma' => '+', 'subtracao' => '-', 'divisao' => '/', 'multiplicacao' => '*'];

        if (($numero2 == 0 && $operacao == 'divisao')) {

            echo 'Divisão por 0 não é possivel!';
        } else if ($numero2 == 0 && $operacao == null) {

            unset($operacoes['divisao']);
            foreach ($operacoes as $oper => $value) {
                echo $oper . ' de ' . $numero1 . ' e ' . $numero2 . ' = ' . eval('return ' . $numero1 . $value . $numero2 . ';') . '<br>';
            }
            $operacoes['divisao'] = '/';
            echo 'Divisão por 0 não é possivel!';
        } else if ($operacao == null) {


            foreach ($operacoes as $oper => $value) {
                echo $oper . ' de ' . $numero1 . ' e ' . $numero2 . ' = ' . eval('return ' . $numero1 . $value . $numero2 . ';') . '<br>';
            }
        } else {
            echo $operacao . ' de ' . $numero1 . ' e ' . $numero2 . ' = ' . eval('return ' . $numero1 . $operacoes[$operacao] . $numero2 . ';') . '<br>';
        }
        return view('home/calculadora', [
            'text' => $text, 'resultado' => $resultado, 
            'numero1' => $numero1, 'numero2' => $numero2, 
            'operacao' => $operacao
        ]);
    }
}
