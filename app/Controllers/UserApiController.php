<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserApiController extends ResourceController
{
    public function index()
    {
        $model = new UserModel();
        $user = $model->findAll();
        return $this->respond($user, 200);
    }

    public function detail($id = null) {
        $model = new UserModel();
        $user = $model->getWhere(['id' => $id])->getResult();

        if (!$user) {
            return $this->failNotFound('No Data Found with id '.$id);
        }

        return $this->respond($user);
    }

    public function create() {
        $model = new UserModel();

        $data = [
            'name' => $this->request->getPost('name'), 
            'email' => $this->request->getPost('email'),
            'gender' => $this->request->getPost('gender'),
            'hobbies' => $this->request->getPost('hobbies'),
            'country' => $this->request->getPost('country'),
            'status' => $this->request->getPost('status'),
        ];
            
        $model->insert($data);

        $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        
        return $this->respondCreated($response);
    }

    public function update($id = null) {
        $model = new UserModel();
        $json = $this->request->getJSON();

        if($json){
            $data = [
                'name' => $json->name, 
                'email' => $json->email,
                'gender' => $json->gender,
                'hobbies' => $json->hobbies,
                'country' => $json->country,
                'status' => $json->status
            ]; 
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'name' => $input['name'],
                'email' => $input['email'],
                'gender' => $input['gender'],
                'hobbies' => $input['hobbies'],
                'country' => $input['country'],
                'status' => $input['status'],
            ];
        }

        $model->update($id, $data);

        $response = [
            'status' => 200, 'error' => null, 
            'messages' => [
                'success' => 'Data Updated' 
            ]
        ];
            
        return $this->respondUpdated($response);
    }

    public function delete($id = null) {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user) {
            $model->delete($id);
            $response = [
                'status' => 200, 
                'error' => null, 
                'messages' => [
                    'success' => 'Data terhapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}
