<?php

    namespace App\Entities;

    use CodeIgniter\Entity;

    class Usuarios extends Entity
    {
        protected $attributes = [
            'id' => null,
            'nome' => null,
            'email' => null,
            'senha' => null,
            'createdAt' => null,
            'updatedAt' => null
        ];
    }
    