<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CommentModel;
use App\Models\UserModel;
use App\Controllers\Shared;

class Post extends BaseController
{
    private $postModel, $commentModel, $shared, $userModel;

    public function __construct()
    {
        helper(['url']);
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->userModel = new UserModel();
        $this->shared = new Shared();
    }

    public function index()
    {
        $postModel = $this->postModel;

        // $data['posts'] = $postModel->getPosts();
        $data['posts'] = $postModel->orderBy('id', 'DESC')->paginate(6, 'group1');
        $data['pager'] = $postModel->pager;

        // Check if user is logged in
        $data["isLoggedIn"] = $this->shared->isLoggedIn();

        $data["title"] = "Home";

        return view('blog', $data);
    }

    public function view($id)
    {
        // Gets Post
        $data['post'] = $this->postModel->where('id', $id)->first();

        if(!isset($data['post']))
        {
            return redirect()->to(base_url('post'));
        }

        // Gets comments
        $data['comments'] = $this->commentModel->getCommentsByPostId($id);
     
        // Check if user is logged in
        $data["isLoggedIn"] = $this->shared->isLoggedIn();

        $data["title"] = "Post View";
        
        return view('postview', $data);
    }

    public function managePost()
    {
        $postModel = $this->postModel;

        $data['posts'] = $postModel->orderBy('id', 'DESC')->paginate(10, 'group1');
        $data['pager'] = $postModel->pager;

        // Check if user is logged in
        $isLoggedIn = $this->shared->isLoggedIn();
        if(!$isLoggedIn)
        {
            return redirect()->route('login');
        }

        $data["isAdmin"] = session()->get('isAdmin');

        $data["isLoggedIn"] = $isLoggedIn;
        $data["title"] = "Manage Post";

        return view('managePost/posts', $data);
    }

    public function create()
    {
        helper(['form']);
        $postModel = $this->postModel;

        $rules = [
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'uploaded[image]|max_size[image,123200]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];
    
        if ($this->request->getMethod() === 'POST') {
            if ($this->validate($rules)) {
                $imageFile = $this->request->getFile('image');
    
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                    $imageName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH  . 'public/uploads', $imageName);

                    $data = [
                        'title'   => $this->request->getPost('title'),
                        'content' => $this->request->getPost('content'),
                        'image'   => $imageName,
                        'user_id' => session()->get('user_id')
                    ];
    
                    if ($postModel->save($data))
                    {
                        session()->setFlashdata('success', 'Post created successfully.');
                        return redirect()->to(base_url('managePost'));
                    }

                    session()->setFlashdata('error', 'Failed to save post data.');
                    return redirect()->to(base_url('managePost'));

                }
                
                session()->setFlashdata('error', 'Failed to upload file.');
                return redirect()->to(base_url('managePost'));
            }

            // Print validation errors
            $validation = \Config\Services::validation();
            session()->setFlashdata('validation_errors', $validation->getErrors());
        }
    
        return redirect()->to(base_url('managePost'));
    }

    public function getPost($id)
    {
        $data = $this->postModel->where('id', $id)->first();

        echo json_encode($data);
    }

    public function edit()
    {
        helper(['form']);

        $postModel = $this->postModel;

        $id = $this->request->getPost('editId');

        // Fetch the post data by ID
        $data['post'] = $postModel->find($id);

        if ($this->request->getMethod() === 'POST')
        {
            $rules = [
                'title'   => 'required',
                'content' => 'required',
                'image'   => 'mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,5120]' // Validation rules for image
            ];

            if ($this->validate($rules)) {
                $updatedData = [
                    'title'   => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content')
                ];

                $imageFile = $this->request->getFile('image');
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                    // Generate a random name for the new image and move it to the public/uploads directory
                    $imageName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/uploads', $imageName);
                    
                    // Delete the old image if a new image is uploaded
                    if (!empty($data['post']['image'])) {
                        unlink(ROOTPATH . 'public/uploads/' . $data['post']['image']);
                    }

                    // Update the image field in the database
                    $updatedData['image'] = $imageName;
                }

                // Update the post in the database
                if($postModel->update($id, $updatedData))
                {
                    session()->setFlashdata('success', 'Post updated successfully.');
                    return redirect()->to(base_url('managePost'));
                }

                session()->setFlashdata('error', 'Unable to update Post.');
                return redirect()->to(base_url('managePost'));
            }
            
            $validation = \Config\Services::validation();
            session()->setFlashdata('validation_errors', $validation->getErrors());

        }

        return redirect()->to(base_url('managePost'));
    }

    public function changeStatus($id, $status)
    {
        if($status == 1)
            $statusmsg = "Publised";
        else if($status == 0)
            $statusmsg = "Unpublised";
        else {
            session()->setFlashdata('error', 'Invalid Status to Set');
            return redirect()->to(base_url('managePost'));
        }

        if($this->postModel->update($id, ['status' => $status]))
        {
            session()->setFlashdata('success', 'Post Status Updated successfully to '.$statusmsg);
            return redirect()->to(base_url('managePost'));
        }

        session()->setFlashdata('error', 'Unable to Update Post Status.');
        return redirect()->to(base_url('managePost'));
    }


    public function delete($id)
    {   
        if($this->postModel->delete($id))
        {
            session()->setFlashdata('success', 'Post Deleted successfully.');
            return redirect()->to(base_url('managePost'));
        }

        session()->setFlashdata('error', 'Unable to Delete Post.');
        return redirect()->to(base_url('managePost'));
    }

    public function deleteMultiPost()
    {
        $ids = $this->request->getVar('ids');
       
        for($count = 0; $count < count($ids); $count++ )
        {
            $this->postModel->delete($ids[$count]);
        }

        echo 1;
    }

}
