<?php

namespace App\Repositories;
use App\Models\PasswordTypeField;
use App\Core\Database;

class PasswordTypeFieldRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new PasswordTypeField();
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function getById($id)
    {
        return $this->model->getById($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->update($id, $data);
    }   

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function getFieldsByType($typeId) {
        $sql = "SELECT * FROM password_type_fields WHERE type_id = :type_id ORDER BY sort_order ASC";
        $params = ['type_id' => $typeId];
        return $this->model->query($sql, $params);
    }

}



