<?php 

    namespace App\Controllers;

    use CodeIgniter\API\ResponseTrait;

    class Users extends BaseController
	{
        use ResponseTrait;

		public function index()
		{
            $json = [
                'data' => 'Retorno Json'
            ];

			return $this->respond($json);
        }

        //--------------------------------------------------------------------
        
        public function view($id)
        {

        }

        public function add()
        {

        }

        public function edit($id)
        {

        }

        public function delete($id)
        {
            
        }

	}
