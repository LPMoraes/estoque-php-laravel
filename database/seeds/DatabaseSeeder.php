<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProdutoTableSeeder::class);
    }
}

/**
* 
*/
class ProdutoTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::insert("INSERT INTO produtos (nome, quantidade, valor, descricao) 
					VALUES (?,?,?,?)", array('Geladeira', 2, 578.00, 'Side by Side com gelo na porta'));

		DB::insert("INSERT INTO produtos (nome, quantidade, valor, descricao) 
					VALUES (?,?,?,?)", array('Fogão', 5, 950.00, 'Painel automático e forno elétrico'));
 	}
}
