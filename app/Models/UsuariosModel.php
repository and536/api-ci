<?php

    namespace App\Models;

    use CodeIgniter\Model;
    use Exception;

    class UsuariosModel extends Model {
        protected $table      = 'usuarios';
        protected $primaryKey = 'id';

        protected $useAutoIncrement = true;

        protected $returnType     = 'App\Entities\Usuarios';
        protected $useSoftDeletes = false;

        // protected $allowedFields = ['name', 'email'];

        // protected $useTimestamps = false;
        // protected $createdField  = 'created_at';
        // protected $updatedField  = 'updated_at';
        // protected $deletedField  = 'deleted_at';

        // protected $validationRules    = [];
        // protected $validationMessages = [];
        // protected $skipValidation     = false;
        
        public function login($dados_login)
        {
            try {
                $dados = $this->where(['email' => $dados_login->usuario])
                              ->first();

                if(!password_verify($dados_login->senha, $dados->senha)){
                    throw new Exception('As senhas não conferem');
                }

                $retorno = [
                    'codigo' => $dados->id,
                    'nome' => $dados->nome,
                    'email' =>  $dados->email
                ];

                return $retorno;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }