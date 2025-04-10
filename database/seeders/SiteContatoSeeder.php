<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(61) 99156-6128';
        $contato->email = 'pessoa_t@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Obrigado';
        $contato->save();
        */

        
        //factory(SiteContatoFactory::class, 100)->create();
        
        //aula 121
        SiteContato::factory()->count(100)->create();
    }
}
