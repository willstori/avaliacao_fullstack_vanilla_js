<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller para tratamento das requisições da Api
 */
class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
    }
    
    /**
     * Método para atender a solicitação de hero do Cliente
     *
     * @return json
     */
    public function heros()
    {

        $sort = $this->input->get('_sort', true);

        $order = $this->input->get('_order', true);

        $this->load->model('hero_model', 'modelhero');

        $heros = $this->modelhero->getAll($sort, $order);

        echo json_encode($heros);
    }
    
    /**
     * Método para atender a solicitação de articles do Cliente
     *
     * @return json
     */
    public function articles()
    {

        $sort = $this->input->get('_sort', true);

        $order = $this->input->get('_order', true);

        $this->load->model('article_model', 'modelarticle');

        $articles = $this->modelarticle->getAll($sort, $order);

        echo json_encode($articles);
    }
    
    /**
     * Método para registro de novos contacts do Cliente
     * ou para listagem de todos os contacts quando não 
     * recebe nenhum parametro na solicitação
     *
     * @return json
     */
    public function contacts()
    {
        
        $name = $this->input->post('name', true);

        $email = $this->input->post('email', true);

        $this->load->model('contact_model', 'modelcontact');       

        if(empty($name) && empty($email)){

            $sort = $this->input->get('_sort', true);

            $order = $this->input->get('_order', true);

            $contacts = $this->modelcontact->getAll($sort, $order);

            echo json_encode($contacts);

        }else{
            
            if (!validaEmail($email) || !$this->modelcontact->add($name, $email)) {

                echo json_encode(array('type' => "error", 'message' => "Não foram enviados os campos nome ou e-mail."));

            }else{

                echo json_encode(array('type' => "success", 'message' => "Mensagem enviada com sucesso!"));

            }
            
        }

    }

}
