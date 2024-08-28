<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['post_id', 'user_id', 'comment'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // public function getCommentsByPostId($post_id)
    // {
    //     return $this->where('post_id', $post_id)->get($this->table)->result();
    // }

    public function getCommentsByPostId($post_id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('comments.*, users.username as user_name');
        $builder->join('users', 'comments.user_id = users.id');
        $builder->where('comments.post_id', $post_id);
        $query = $builder->get();
        // $result = $query->getResult();
        $result = $query->getResultArray();
        return $result;
    }
}
