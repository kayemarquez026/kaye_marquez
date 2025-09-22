<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {
    protected $table = 'users'; // your actual DB table
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // Pagination + search
    public function page($q = '', $records_per_page = null, $page = null)
    {
        $query = $this->db->table($this->table);

        if (!empty($q)) {
            $query->like('id', '%'.$q.'%')
                  ->or_like('first_name', '%'.$q.'%')
                  ->or_like('last_name', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');
        }

        // Count total rows
        $countQuery = clone $query;
        $total_rows = $countQuery->select_count('*', 'count')->get()['count'];

        // Pagination
        if ($page !== null && $records_per_page !== null) {
            $query->pagination($records_per_page, $page);
        }

        $records = $query->get_all();

        return [
            'total_rows' => $total_rows,
            'records'    => $records
        ];
    }

    // Match parent signature
    public function find($id, $with_deleted = false)
    {
        $query = $this->db->table($this->table)->where($this->primary_key, $id);

        if (!$with_deleted && property_exists($this, 'deleted_at')) {
            $query->where('deleted_at', null);
        }

        return $query->get();
    }

    // Insert new user
    public function insert($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    // Update user
    public function update($id, $data)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->update($data);
    }

    // Delete user
    public function delete($id)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->delete();
    }
}
