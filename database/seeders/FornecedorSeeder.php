<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome'=>'Fornecedor 200',
            'site'=> 'fornecedor200.com.br',
            'uf'=>'mg',
            'email'=>'contato@fornecedor200.com.br'
        ]);

        \DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor 300',
            'site'=> 'fornecedor300.com.br',
            'uf'=>'sp',
            'email'=>'contato@fornecedor300.com.br'
        ]);
    }
}
