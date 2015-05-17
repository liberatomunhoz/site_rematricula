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
        $this->session->sess_create();
        set_msg('logoffok', 'Logoff efetuado com sucesso', 'sucesso');
        redirect('usuarios/login');
    }

    public function nova_senha(){
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|strtolower');
        if ($this->form_validation->run()==TRUE){
            $email = $this->input->post('email');
            $query = $this->usuarios->get_byemail($email);
            if ($query->num_rows()==1){
                $novasenha = substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm0123456789'), 0, 6);
                $mensagem = "<p>Você solicitou uma nova senha para acesso ao sistema de rematrícula do site, a
                partir de agora use a seguinte senha para acesso: <strong>$novasenha</strong></p><p>Troque esta
                senha para uma senha segura e de sua preferência o quanto antes.</p>";
                if ($this->sistema->enviar_email($email, 'Nova senha de acesso', $mensagem)){
                    $dados['senha'] = md5($novasenha);
                    $this->usuarios->do_update($dados, array('email'=>$email), FALSE);
                    //auditoria('Redefinição de senha', 'O usuário solicitou uma nova senha por email');
                    set_msg('msgok', 'Uma nova senha foi enviada para seu email', 'sucesso');
                    redirect('usuarios/nova_senha');
            } else {
                    set_msg('msgerro', 'Erro ao enviar nova senha, contate o administrador', 'erro');
                    redirect('usuarios/nova_senha');
                }
             } else {
                set_msg('msgerro', 'Este email não possui cadastro no sistema', 'erro');
                redirect('usuarios/nova_senha');
            }
        }      
        set_tema('titulo', 'Recuperar senha');
        set_tema('conteudo', load_modulo('usuarios', 'nova_senha'));
        set_tema('rodape', '');
        load_template();
    }

    public function cadastrar_aluno(){
        esta_logado();
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('matricula', 'MATRICULA', 'trim|required|min_length[4]|is_unique[usuarios.login]|strtolower');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('nome', 'NOME', 'trim|required|ucwords');
        $this->form_validation->set_rules('sobrenome', 'SOBRENOME', 'trim|required|ucwords');
        $this->form_validation->set_rules('data_nasc', 'DATA DE NASCIMENTO', 'trim|required');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[usuarios.email]|strtolower');
        //$this->form_validation->set_rules('login', 'LOGIN', 'trim|required|min_length[4]|is_unique[usuarios.login]|strtolower');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[4]|strtolower|matches[senha]');
        if ($this->form_validation->run()==TRUE){
        }
        set_tema('titulo', 'Cadastro de Aluno(a)');
        set_tema('conteudo', load_modulo('usuarios', 'cadastrar_aluno'));
        load_template();
    }

    public function cadastrar_curso(){
        esta_logado();
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('nome_curso', 'CURSO', 'trim|required|ucwords');
        if ($this->form_validation->run()==TRUE){
        }
        set_tema('titulo', 'Cadastro de Curso');
        set_tema('conteudo', load_modulo('usuarios', 'cadastrar_curso'));
        load_template();
    }

    public function cadastrar_disciplina(){
        esta_logado();
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('nome_disc', 'NOME DA DISCIPLINA', 'trim|required|ucwords');
        $this->form_validation->set_rules('cod_curso', 'CÓDIGO DO CURSO', 'trim|required|ucwords');
        $this->form_validation->set_rules('disc_pre', 'PRÉ-REQUISITO(S)', 'trim|required|ucwords');
        if ($this->form_validation->run()==TRUE){
        }
        set_tema('titulo', 'Cadastro de Disciplina(s)');
        set_tema('conteudo', load_modulo('usuarios', 'cadastrar_disciplina'));
        load_template();
    }

     public function cadastrar_professor(){
        esta_logado();
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('login', 'LOGIN', 'trim|required');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('nome', 'NOME', 'trim|required|ucwords');
        $this->form_validation->set_rules('sobrenome', 'SOBRENOME', 'trim|required|ucwords');
        $this->form_validation->set_rules('data_nasc', 'DATA DE NASCIMENTO', 'trim|required');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[usuarios.email]|strtolower');
        //$this->form_validation->set_rules('login', 'LOGIN', 'trim|required|min_length[4]|is_unique[usuarios.login]|strtolower');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[4]|strtolower|matches[senha]');
        if ($this->form_validation->run()==TRUE){
        }
        set_tema('titulo', 'Cadastro de Professor(s)');
        set_tema('conteudo', load_modulo('usuarios', 'cadastrar_professor'));
        load_template();
    }

    public function cadastrar_turma(){
        esta_logado();
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('cod_turma', 'NÚMERO DA TURMA', 'trim|required');
        $this->form_validation->set_rules('cod_disc', 'CÓDIGO DA DISCIPLINA', 'trim|required');
        if ($this->form_validation->run()==TRUE){
        }
        set_tema('titulo', 'Cadastro de Turma(s)');
        set_tema('conteudo', load_modulo('usuarios', 'cadastrar_turma'));
        load_template();
    }

    public function gerenciar(){
        esta_logado();
        set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
        set_tema('titulo', 'Listagem de usuários');

        set_tema('conteudo', load_modulo('usuarios', 'gerenciar'));
        load_template();
    }


}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */