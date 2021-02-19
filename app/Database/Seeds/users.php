<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
	public function run()
	{
		$options = [ 'cost' => 12, ];
		$data = [
			'nome'  => 'admin',
			'email' => 'admin@admin.com',
			'senha' => password_hash("admin", PASSWORD_BCRYPT, $options),
		];

		// Using Query Builder
		$this->db->table('usuarios')->insert($data);
		for ($i=0; $i < 200; $i++) { 
			$data = [
				'nome'  => 'usuario'.$i,
				'email' => 'usuario'.$i.'@api.com',
				'senha' => password_hash("usuario".$i, PASSWORD_BCRYPT, $options),
			];
	
			// Using Query Builder
			$this->db->table('usuarios')->insert($data);
		}
	}
}
