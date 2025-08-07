<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'links';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'original_url',
        'alias_url',
        'shortened_url',
        'encryption',
        'password',
        'is_encrypted',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function getLinksByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
    public function getLinksByUserIdAndDate($userId, $start_date = null, $end_date = null)
    {
        $this->where('user_id', $userId);

        if ($start_date) {
            $this->where('DATE(created_at) >=', $start_date);
        }
        if ($end_date) {
            $this->where('DATE(created_at) <=', $end_date);
        }

        return $this->findAll();
    }
    public function getEncryptedLinksByUserIdAndDate($userId, $startDate = null, $endDate = null)
    {
        $this->where('user_id', $userId)
            ->where('password IS NOT NULL', null, false);

        if ($startDate) {
            $this->where('DATE(created_at) >=', $startDate);
        }
        if ($endDate) {
            $this->where('DATE(created_at) <=', $endDate);
        }

        return $this->findAll();
    }
}