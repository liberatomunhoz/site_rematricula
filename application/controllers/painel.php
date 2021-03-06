<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller {

    public function __construct(){
        parent::__construct();
        init_painel();
    }

	public function index()
	{
		$this->inicio();
	}

	public function inicio(){
        if(esta_logado(FALSE)):
            set_tema('titulo', 'Início');

            $user_tipe = $this->session->userdata('user_tipe');
            if ($user_tipe == 1) {
                set_tema('conteudo', '<div class="twelve columns"><p>Escolha um menu para iniciar</p></div>');
            } else if ($user_tipe == 2) {
                set_tema('conteudo', load_modulo('inicio', 'aluno'));
            } else if ($user_tipe == 3) {
                set_tema('conteudo', load_modulo('inicio', 'professor'));
            }
            
            load_template();
        else:
            redirect('usuarios/login');
        endif;
    }

	/*public function inicio()
	{
		if (esta_logado(FALSE)) {
			set_tema('titulo', 'Adminitrador');
			set_tema('conteudo', '<div class="twelve columns"><p>Escolha um menu para iniciar</p></div>');
			load_template();
		} else {
			redirect('usuarios/login');
		}	
	}*/
}

/* End of file painel.php */
/* Location: ./application/controllers/painel.php */