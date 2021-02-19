<?php 

    namespace App\Controllers;

    use CodeIgniter\API\ResponseTrait;
    use App\Models\UsuariosModel;
    use Firebase\JWT\JWT;
    use Config\Services;

    class Auth extends BaseController
	{
        use ResponseTrait;

        public function __construct(){
            $this->Usuarios = new UsuariosModel;
        }

		public function login()
		{   
            try {
                $data = $this->request->getJSON();

                if(!$data->usuario){
                    $dados = [
                        "status" => 400,
                        "data" => [
                            "usuario" => "Usuário não está preenchido."
                        ],
                        "message" => ""
                    ];
                    return $this->respond($dados, 400);
                }

                if(!$data->senha){
                    $dados = [
                        "status" => 400,
                        "data" => [
                            "senha" => "Senha não está prenchido"
                        ],
                        "message" => ""
                    ];
                    return $this->respond($dados, 400);
                }

                $key = Services::getSecretKey();
                $dados = $this->Usuarios->login($data);
                $dados['exp'] = time() +1800;
                $token = JWT::encode($dados, $key);
                
                $json = [
                    "status" => 200,
                    "data" => [
                        "token" => $token
                    ],
                    "message" => null
                ];

                return $this->respond($json);
            } catch (\Throwable $th) {
                throw $th;
            }
        }

    }
