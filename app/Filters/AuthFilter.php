<?php 
	namespace App\Filters;

	use CodeIgniter\HTTP\RequestInterface;
	use CodeIgniter\HTTP\ResponseInterface;
	use CodeIgniter\HTTP\Response;
	use CodeIgniter\Filters\FilterInterface;
	use Config\Services;
	use Firebase\JWT\JWT;
	use CodeIgniter\API\ResponseTrait;
	use Exception;

	class AuthFilter implements FilterInterface
	{
		use ResponseTrait;

		public function before(RequestInterface $request, $arguments = null)
		{
			try
			{
				$key        = Services::getSecretKey();
				$authHeader = $request->getServer('HTTP_AUTHORIZATION');
				$arr        = explode(' ', $authHeader);
				
				if (count($arr) <= 1) {
					throw new Exception('Não autenticado! Token nulo.');
				}
				
				$token      = $arr[1];

				JWT::decode($token, $key, ['HS256']);
			}
			catch (\Exception $e)
			{
				$dados = [
					"code" => ResponseInterface::HTTP_UNAUTHORIZED,
					"data" => [],
					"message" => $e->getMessage()
				];

				return Services::response()
					   ->setStatusCode($dados['code'])
					   ->setContentType('application/json')
					   ->setJSON(json_encode($dados));
			}
		}

		//--------------------------------------------------------------------

		public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
		{
			// Do something here
		}
	}