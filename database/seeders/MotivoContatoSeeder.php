<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Forma 1
        MotivoContato::create(['motivo_contato' => 'Dúvida']);
        MotivoContato::create(['motivo_contato' => 'Elogio']);
        MotivoContato::create(['motivo_contato' => 'Reclamação']);

        //Forma 2
        $motivo_contato = new MotivoContato();
        $motivo_contato->motivo_contato = 'Sugestão';
        $motivo_contato->save();
    }
}
