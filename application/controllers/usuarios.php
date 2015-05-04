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
        $this->form_validation->set_rules('usuario','USUÁRIO','trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
        if ($this->form_validation->run()==TRUE) {
            $usuario = $this->input->post('usuario', TRUE);
            $senha = md5($this->input->post('senha', TRUE));
            if ($this->usuarios->do_login($usuario, $senha) == TRUE) {
                $query = $this->usuarios->get_bylogin($usuario)->row();
                $dados = array(
                    'user_id' => $query->id,
                    'user_nome' => $query->nome,
                    'user_admin' => $query->adm,
                    'user_logado' => TRUE,  
                );
                $this->session->set_userdata($dados);
                redirect('painel');
            } else {
                $query = $this->usuarios->get_bylogin($usuario)->row();
                if (empty($query)) {         
                    set_msg('errologin', 'Usuário inexistente', 'erro');
                 } elseif ($query->senha != $senha) {   
                    set_msg('errologin', 'Senha incorreta', 'erro');
                } elseif ($query->ativo == 0) {
                    set_msg('errologin', 'Este usuário está inativo', 'erro');
                } else {
                    set_msg('errologin', 'Erro desconhecido, contate o desenvolvedor', 'erro');
                }
                redirect('usuarios/login'); 
            }   
        }
        set_tema('titulo', 'Login');
        set_tema('conteudo', load_modulo('usuarios', 'login'));
        set_tema('rodape', '');
        load_template(); 
    }

    public function logoff(){
        //auditoria('Logoff no sistema', 'O usuário "'.$this->usuarios->get_byid($this->session->userdata('user_id'))->row()->login.'" fez logoff do sistema', FALSE);
        $this->session->unset_userdata(array('user_id'=>'', 'user_nome'=>'', 'user_admin'=>'', 'user_logado'=>''));
        $this->session->sess_destroy();
        set_msg('logoffok', 'Logoff efetuado com sucesso', 'sucesso');
        redirect('usuarios/login');
    }


}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */