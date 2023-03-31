<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class ContasController extends Controller
{

    public function contas(int $numero1, int $numero2, $operacao=null)
    {
        $operacoes = ['soma'=>'+','subtracao'=>'-','divisao'=>'/','multiplicacao'=>'*'];
        
        if($numero2 == 0 ){

            unset($operacoes['divisao']);
            echo 'Divisão por 0 não existe!<br>';
        }

        if($operacao != null && $numero2 != 0){
                 
            echo $operacao.' de ' .$numero1.' e '.$numero2.' = '.eval('return '.$numero1.$operacoes[$operacao].$numero2.';');

        }else{
            
                foreach ($operacoes as $oper=>$value){
                echo $oper.' de ' .$numero1.' e '.$numero2.' = '.eval('return '.$numero1.$value.$numero2.';').'<br>';
           
            }
        }
        
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
