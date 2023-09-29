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
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 98888-9877';
        // $contato->email = 'contato@sistemasg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem vindo ao Super gestão!';
        // $contato->save();
        
        SiteContato::factory()->count(30)->create(); 
    }
}
