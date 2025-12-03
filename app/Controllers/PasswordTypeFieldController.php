<?php

namespace App\Controllers;

use App\Repositories\PasswordTypeFieldRepository;

class PasswordTypeFieldController extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new PasswordTypeFieldRepository();
    }

}