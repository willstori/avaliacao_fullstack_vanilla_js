<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo para gerenciar as informações de Contact junto a Base de dados
 * 
 * @author Willian Stori <wstori2@gmail.com> 
 */
class Contact_model extends CI_Model
{

    private $table = "contacts";

    private $filelds = array("name", "email");

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Método para listar todos os contacts da base de dados 
     *
     * @param  string $sort Coluna da tabela para realizar a ordenação
     * @param  string $order Sentido da Ordenação
     * @return array
     */
    function getAll($sort, $order)
    {

        $sort = !in_array(strtolower($sort), $this->filelds) ? "id" : $sort;
        
        $order = !in_array(strtolower($order), array("asc", "desc")) ? "asc" : $order;

        $this->db->select("*");

        $this->db->from($this->table);

        $this->db->order_by($sort . ' ' . $order);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return array();
        }

    }

    /**
     * Método para inserir um novo contact na base de dados
     *
     * @param  string $name Nome que será registrado
     * @param  string $email E-mail que será registrado
     * @return bool Informa se foi realizado com sucesso a operação
     */
    public function add($name, $email)
    {

        if (!empty($name) && !empty($email)) {

            $this->db->insert($this->table, array('name' => $name, 'email' => $email));

            return true;

        }

        return false;

    }

}
