<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login'); 
    }

    public function loginLogic() {
        helper(['form', 'url']);

        if ($this->validate([
            'email' => 'required|valid_email',
        ])) {
            $email = $this->request->getPost('email');
            $model = new UserModel();
            $user = $model->getUserByEmail($email);

            if ($user) {
                $session = session();
                $session->set([
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'logged_in' => true,
                ]);

                return redirect()->to('/user');

                echo("login berhasil");
            } else {
                return redirect()->to('/login');
                echo("login gagal");
            }
        } else {
            return view('login', ['validation' => $this->validator]);
        }
    }
}
