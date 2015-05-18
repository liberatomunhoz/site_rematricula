<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE){
		if ($dados != NULL && is_array($condicao)){
			$usuario = $this->usuarios->get_byid($condicao['id'])->row()->login;
			$this->db->update('usuarios', $dados, $condicao);
			//if ($this->db->affected_rows()>0):
				//auditoria('Alteração de usuários', 'Alterado cadastro do usuário "'.$usuario.'"');
				set_msg('msgok', 'Alteração efetuada com sucesso', 'sucesso');
			//else:
				//set_msg('msgerro', 'Erro ao atualizar dados', 'erro');
			//endif;
			if ($redir) redirect(current_url());
		}
	}

	public function do_login($login=NULL, $senha=NULL) {
        if($login != NULL && $senha != NULL):
            $this->db->where('login', $login);
            $this->db->where('senha', $senha);
            $query = $this->db->get('usuarios');

            if($query->num_rows() == 1):
                return TRUE;
            else:
                return FALSE;
            endif;
        else:
            return FALSE;
        endif;
    }

	/*public function do_login($usuario=NULL, $senha=NULL){
		if ($usuario && $senha) {
			$this->db->where('login', $usuario);
			$this->db->where('senha', $senha);
			$this->db->where('ativo', 1);
			$query = $this->db->get('usuarios');
			if ($query->num_rows == 1) {
				return TRUE;
			} else {
				return FALSE;
			}			
		} else {
			return FALSE;
		}	
	} */

	public function get_bylogin($login=NULL, $tipo){
        if($login != NULL):

            if ($tipo > 1) {
                if ($tipo == 2) {
                    $this->db->select('usuarios.cod_usuario, usuarios.tipo, usuarios.admin_sist, alunos.nome');
                    $this->db->from('usuarios, alunos');
                    $this->db->where('usuarios.cod_usuario = alunos.cod_usuario');
                    return $this->db->get();
                } else if ($tipo == 3) {
                    $this->db->select('usuarios.cod_usuario, usuarios.tipo, usuarios.admin_sist, professores.nome');
                    $this->db->from('usuarios, professores');
                    $this->db->where('usuarios.cod_usuario = professores.cod_usuario');
                    return $this->db->get();
                }
            } else {
                $this->db->where('login', $login);
                return $this->db->get('usuarios');
            }
        else:
            return FALSE;
        endif;
    }

	/*public function get_bylogin($login=NULL){
		if ($login != NULL) {
			$this->db->where('login', $login);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		} else {
			return FALSE;
		}		
	}*/

	public function get_byemail($email=NULL){
		if ($email != NULL) {
			$this->db->where('email', $email);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		} else {
			return FALSE;
		}		
	}

	public function get_all(){
		return $this->db->get('usuarios');
	}

	public function get_bycodigo($login=NULL, $senha){
            if($login != NULL) {
                $this->db->select('login, senha');
                $this->db->from('usuarios');
                $this->db->where('login', $login);
                 $this->db->limit(1);
                }
                return $this->db->get();
    }
}


/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */