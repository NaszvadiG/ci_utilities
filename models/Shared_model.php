<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Shared_model
 * @author Nicolas Ormeno <ni.ormeno@gmail.com>
 * @version 1.0
 */
class Shared_model extends CI_Model
{
    /**
     * Table Name
     *
     * @var string
     */
    var $table;

    /**
     * Name of the primary key
     *
     * @var string
     */
    var $pk;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Setter Table Name
     *
     * @param $table
     */
    public function set_table($table)
    {
        $this->table    =   $table;
    }

    /**
     * Setter primary key
     *
     * @param $pk
     */
    public function set_pk($pk)
    {
        $this->pk       =   $pk;
    }

    /**
     * Find record by ID
     *
     * @param $id
     * @return bool
     */
    public function find($id)
    {
        if(is_null($id))
            return false;

        $query = $this->db->where($this->pk, $id)->get($this->table);
        return (count($query->result()) > 0) ? $query->result() : false;
    }

    /**
     * Return all records
     *
     * @return mixed
     */
    public function get_all()
    {
        $query = $this->db->get($this->table);
        return (count($query->result()) > 0) ? $query->result() : false;
    }

    /**
     * Create a new record
     * @param $new
     * @return mixed
     */
    public function new_record($new)
    {
        $this->db->insert($this->table, $new);
        return (count($this->db->insert_id()) > 0) ? $this->db->insert_id() : false;
    }

    /**
     * Update a record
     *
     * @param null $id
     * @param null $update
     * @return bool
     */
    public function update_record($id = null, $update = null)
    {
        if(is_null($id) || is_null($update))
            return false;

        if(!$this->find($id))
            return false;

        $this->db->where($this->pk, $id);
        $this->db->update($this->table, $update);

        return (count($this->db->affected_rows()) > 0) ? $this->db->affected_rows() : false;
    }

    /**
     * Delete a record
     *
     * @param null $id
     * @return bool
     */
    public function delete_record($id = null)
    {
        if(is_null($id))
            return false;

        if(!$this->find($id))
            return false;

        $this->db->delete($this->table, array($this->pk => $id));
        return (count($this->db->affected_rows()) > 0) ? $this->db->affected_rows() : false;
    }

    /**
     * Get all records indicating limit and offset
     *
     * @param null $limit
     * @param null $offset
     * @return bool
     */
    public function get_with_offset($limit = null, $offset = null)
    {
        if(is_null($limit) || is_null($offset))
            return false;

        $this->db->order_by($this->pk, 'ASC');

        if($offset == 1)
            $query = $this->db->limit($limit)->get($this->table);
        else
            $query = $this->db->get($this->table, $limit, $offset);

        return (count($query->result()) > 0) ? $query->result() : false;
    }

    /**
     * Count all records
     *
     * @return mixed
     */
    public function count_records()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Get record between ID
     *
     * @param $data
     * @return mixed
     */
    public function get_between_id($data)
    {
        $query = $this->db
                        ->where("$this->pk >=", $data[0])
                        ->where("$this->pk <=", $data[1])
                        ->get($this->table);

        return $query->result();
    }

    /**
     * Truncate table
     *
     * @return bool
     */
    public function truncate_table()
    {
        if(ENVIRONMENT === 'production')
            return false;

        return ($this->db->truncate($this->table)) ? true : false;
    }

    /**
     * Empty Table
     *
     * @return bool
     */
    public function empty_table()
    {
        if(ENVIRONMENT === 'production')
            return false;

        return ($this->db->empty_table($this->table)) ? true : false;
    }
}