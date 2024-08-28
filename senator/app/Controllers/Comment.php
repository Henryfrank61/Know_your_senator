<?php

namespace App\Controllers;

use App\Models\CommentModel;

class Comment extends BaseController
{
    private $commentModel;

    public function __construct()
    {
        helper(['url']);
        $this->commentModel = new CommentModel();
    }

    
    public function add($post_id)
    {
        helper(['form']);
        $commentModel = $this->commentModel;

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'comment' => 'required',
                'user_id' => 'required'
            ];

            if ($this->validate($rules)) {
                $data = [
                    'post_id' => $post_id,
                    'user_id' => session()->get('user_id'),
                    'comment' => $this->request->getPost('comment')
                ];

                $commentModel->save($data);

                session()->setFlashdata('success', 'Comment added Successfully.');
                return redirect()->to('/post/view/' . $post_id);
            }
            
            $validation = \Config\Services::validation();
            session()->setFlashdata('validation_errors', $validation->getErrors());

            //session()->setFlashdata('error', 'Validation failed.');
            return redirect()->to('/post/view/'.$post_id);
            
        }

    }

}
