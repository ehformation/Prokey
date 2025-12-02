<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\PasswordRepository;
use App\Repositories\PasswordTypeRepository;
use App\Repositories\PasswordTypeFieldRepository;

class PasswordController extends Controller
{
    protected $passwordRepository;

    public function __construct()
    {
        $this->passwordRepository = new PasswordRepository();
    }

    public function create($project_id)
    {       
        $passwordTypeRepo = new PasswordTypeRepository();
        $password_types = $passwordTypeRepo->getAll();

        $selected_type = $_GET['password_type_id'] ?? null;

        $fields = [];
        if ($selected_type) {
            $passwordTypeFieldRepo = new PasswordTypeFieldRepository();
            $fields = $passwordTypeFieldRepo->getFieldsByType($selected_type);
        }

        $this->view('password/create', 
            ['title' => 'Ajouter un mot de passe',
             'project_id' => $project_id,
             'selected_type' => $selected_type,
             'password_types' => $password_types,
             'fields' => $fields,
            ]
        );
    }

    public function store()
    {   
        $extra = $_POST['extra'] ?? []; 

        $data = [
            'project_id' => $_POST['project_id'],
            'type_id' => $_POST['password_type_id'],
            'label' => $_POST['label'],
            'extra' => json_encode($extra),
        ];

        $this->passwordRepository->create($data);

        header('Location: ' . url('/projects/' . $_POST['project_id'] . '/show'));
        exit();
    }

}