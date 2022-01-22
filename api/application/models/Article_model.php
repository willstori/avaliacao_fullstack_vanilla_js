<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo para gerenciar as informações de Article junto a Base de dados
 * 
 * @author Willian Stori <wstori2@gmail.com> 
 */
class Article_model extends CI_Model
{
    
    private $table = "articles";

    private $filelds = array("title","content","url", "big", "hot", "createdAt");

    function __construct()
    {
        parent::__construct();
    }
        
    /**
     * Método para listar todos os articles da base de dados 
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

}
