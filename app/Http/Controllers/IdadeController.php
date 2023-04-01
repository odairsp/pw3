<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;

class IdadeController extends Controller
{

    public function idade(int $ano, int $mes = 0, int $dia = 0)
    {
        $dateStart = new DateTime("$ano-$mes-$dia");
        $dateEnd = new DateTime('now');
        $flagIdade = 1;

        if (($dateStart->format('Y') >= $dateEnd->format('Y'))) {

            $flagIdade = 0;
        }

        $date = $dateEnd->diff($dateStart);
        $idade = $date;

        return view('home/idade', ['flagIdade' => $flagIdade, 'idade' => $idade, 'mes' => $mes, 'dia' => $dia]);
    }
}
