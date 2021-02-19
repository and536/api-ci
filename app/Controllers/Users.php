<?php 

    namespace App\Controllers;

    use CodeIgniter\API\ResponseTrait;
    use CodeIgniter\RESTful\ResourceController;

    class Users extends BaseController
	{
        use ResponseTrait;

		public function index()
		{
            $json = [
                'status' => 200,
                'data' => 'Retorno Json',
                'message' => null
            ];

			return $this->respond($json);
		}

        public function view($id)
        {
            $json = [
                'status' => 200,
                'data' => 'Retorno Json',
                'message' => null
            ];

			return $this->respond($json);
        }

        public function edit($id)
        {
            $json = [
                'status' => 200,
                'data' => 'Retorno Json',
                'message' => null
            ];

			return $this->respond($json);
        }

        public function add()
        {
            $json = [
                'status' => 200,
                'data' => 'Retorno Json',
                'message' => null
            ];

			return $this->respond($json);
        }

        public function delete($id)
        {
            $json = [
                'status' => 200,
                'data' => 'Retorno Json',
                'message' => null
            ];

			return $this->respond($json);
        }

	}
