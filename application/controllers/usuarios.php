<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        init_painel();
    }

    public function index()
    {
        $this->load->view('nomeview'); 
    }

    public function login()
    {
        //carregar o modulo usuarios e mostrar a tela de login
        set_tema('titulo', 'Login');
        set_tema('conteudo', load_modulo('usuarios', 'login'));
        set_tema('rodape', '');
        load_template(); 
    }


}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */