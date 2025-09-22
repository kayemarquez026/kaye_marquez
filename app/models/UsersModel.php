<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UsersModel
 * 
 * Automatically generated via CLI.
 */
class UsersModel extends Model {
    protected $table = 'information';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

        public function page($q = '', $records_per_page = null, $page = null)
    {
        $query = $this->db->table($this->table);

        // Apply search filters if $q is not empty
        if (!empty($q)) {
            $query->like('id', '%'.$q.'%')
                  ->or_like('first_name', '%'.$q.'%')
                  ->or_like('last_name', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');
        }

        // If no pagination requested, return all records
        if (is_null($page)) {
            return [
                'total_rows' => $query->select_count('*', 'count')->get()['count'],
                'records'    => $query->get_all()
            ];
        }

        // Clone query for counting total rows
        $countQuery = clone $query;
        $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

        // Apply pagination
        $data['records'] = $query->pagination($records_per_page, $page)->get_all();

        return $data;
    }
    
}
