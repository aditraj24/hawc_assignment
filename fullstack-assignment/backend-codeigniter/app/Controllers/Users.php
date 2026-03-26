<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Users extends BaseController
{
    use ResponseTrait;

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        try {
            $users = $this->userModel->findAll();
            return $this->respond([
                'status' => 'success',
                'data' => $users
            ]);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userModel->find($id);
            
            if (!$user) {
                return $this->failNotFound('User not found');
            }

            return $this->respond([
                'status' => 'success',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $rules = [
                'name' => 'required|string',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]'
            ];

            if (!$this->validate($rules)) {
                return $this->fail($this->validator->getErrors());
            }

            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ];

            $id = $this->userModel->insert($data);

            return $this->respondCreated([
                'status' => 'success',
                'message' => 'User created successfully',
                'id' => $id
            ]);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $user = $this->userModel->find($id);

            if (!$user) {
                return $this->failNotFound('User not found');
            }

            $rules = [
                'name' => 'string',
                'email' => 'valid_email'
            ];

            if (!$this->validate($rules)) {
                return $this->fail($this->validator->getErrors());
            }

            $data = [];
            if ($this->request->getVar('name')) {
                $data['name'] = $this->request->getVar('name');
            }
            if ($this->request->getVar('email')) {
                $data['email'] = $this->request->getVar('email');
            }

            $this->userModel->update($id, $data);

            return $this->respond([
                'status' => 'success',
                'message' => 'User updated successfully'
            ]);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->userModel->find($id);

            if (!$user) {
                return $this->failNotFound('User not found');
            }

            $this->userModel->delete($id);

            return $this->respondDeleted([
                'status' => 'success',
                'message' => 'User deleted successfully'
            ]);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }
}
