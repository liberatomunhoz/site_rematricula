<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
switch ($tela) {
    case 'login':
        echo '<div class="row">';
        echo '<div class="small-5 columns small-centered">';
        echo form_open('usuarios/login', array('class'=>'custom loginform'));
        echo form_fieldset('Identifique-se');
        erros_validacao();
        get_msg('logoffok');
        get_msg('errologin');
        echo form_label('Usuário');
        echo form_input(array('name'=>'login'), set_value('login'), 'autofocus');
        echo form_label('Senha');
        echo form_password(array('name'=>'senha'), set_value('senha'));
        echo form_hidden('redirect', $this->session->userdata('redir_para'));
        echo form_submit(array('name'=>'logar', 'class'=>'button radius right'), 'Login');
        echo '<p>'.anchor('usuarios/nova_senha', 'Esqueci minha senha').'</p>';
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        echo '</div>';
        break;
   /* case 'login':
        echo '<div class="row">';
        echo '<div class="small-5 columns small-centered">';
        echo form_open('usuarios/login', array('class'=>'custom loginform'));
        echo form_fieldset('Identifique-se');
        get_msg('errologin');
        erros_validacao();
        get_msg('logoffok');
        echo form_label('Usuário');
        echo form_input(array('name'=>'usuario'), set_value('usuario'), 'autofocus');
        echo form_label('Senha');
        echo form_password(array('name'=>'senha'), set_value('senha'));
        echo form_submit(array('name'=>'logar', 'class'=>'button radius right'), 'Login');
        echo '<p>'.anchor('usuarios/nova_senha', 'Esqueci minha senha').'<p>';
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break; */
    case 'nova_senha':
        echo '<div class="small-5 columns small-centered">';
        echo form_open('usuarios/nova_Senha', array('class'=>'custom loginform'));
        echo form_fieldset('Recuperação de senha');
        get_msg('msgok');
        get_msg('msgerro');
        erros_validacao();
        echo form_label('Seu email');
        echo form_input(array('name'=>'email'), set_value('email'), 'autofocus');
        echo form_submit(array('name'=>'novasenha', 'class'=>'button radius right'), 'Enviar nova senha');
        echo '<p>'.anchor('usuarios/login', 'Fazer login').'<p>';
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break;
    case 'cadastrar_aluno':
        echo '<div class="small-5 columns small-centered">';
        erros_validacao();
        get_msg('msgok');
        echo form_open('usuarios/cadastrar_aluno', array('class'=>'custom'));
        echo form_fieldset('Cadastrar novo aluno(a)');
        echo form_label('Matrícula');
        echo form_input(array('name'=>'matricula', 'class'=>'five'), set_value('matricula'), 'autofocus');
        echo form_label('CPF');
        echo form_input(array('name'=>'cpf', 'class'=>'five'), set_value('cpf'), 'autofocus');
        echo form_label('Nome');
        echo form_input(array('name'=>'nome', 'class'=>'five'), set_value('nome'), 'autofocus');
        echo form_label('Sobrenome');
        echo form_input(array('name'=>'sobrenome', 'class'=>'five'), set_value('sobrenome'), 'autofocus');
        echo form_label('Data de Nascimento');
        echo form_input(array('name'=>'cpf', 'class'=>'five'), set_value('data_nasc'), 'autofocus');     
        echo form_label('Email');
        echo form_input(array('name'=>'email', 'class'=>'five'), set_value('email'));
        echo form_label('Senha');
        echo form_password(array('name'=>'senha', 'class'=>'three'), set_value('senha'));
        echo form_label('Repita a senha');
        echo form_password(array('name'=>'senha2', 'class'=>'three'), set_value('senha2'));
        echo anchor('painel', 'Cancelar', array('class'=>'button radius alert espaco'));
        echo form_submit(array('name'=>'cadastrar', 'class'=>'button radius'), 'Salvar Dados');
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break;
    case 'cadastrar_curso':
        echo '<div class="small-5 columns small-centered">';
        erros_validacao();
        get_msg('msgok');
        echo form_open('usuarios/cadastrar_curso', array('class'=>'custom'));
        echo form_fieldset('Cadastrar novo curso');
        echo form_label('Nome do Curso');
        echo form_input(array('name'=>'nome_curso', 'class'=>'five'), set_value('nome_curso'), 'autofocus');
        echo anchor('painel', 'Cancelar', array('class'=>'button radius alert espaco'));
        echo form_submit(array('name'=>'cadastrar', 'class'=>'button radius'), 'Salvar Dados');
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break; 
    case 'cadastrar_disciplina':
        echo '<div class="small-5 columns small-centered">';
        erros_validacao();
        get_msg('msgok');
        echo form_open('usuarios/cadastrar_disciplina', array('class'=>'custom'));
        echo form_fieldset('Cadastrar nova disciplina');
        echo form_label('Nome da Disciplina');
        echo form_input(array('name'=>'nome_disc', 'class'=>'five'), set_value('nome_disc'), 'autofocus');
        echo form_label('Código do Curso');
        echo form_input(array('name'=>'cod_curso', 'class'=>'five'), set_value('cod_curso'), 'autofocus');
        echo form_label('Pré-Requisito(s)');
        echo form_input(array('name'=>'disc_pre', 'class'=>'five'), set_value('disc_pre'), 'autofocus');
        echo anchor('painel', 'Cancelar', array('class'=>'button radius alert espaco'));
        echo form_submit(array('name'=>'cadastrar', 'class'=>'button radius'), 'Salvar Dados');
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break;
    case 'cadastrar_professor':
        echo '<div class="small-5 columns small-centered">';
        erros_validacao();
        get_msg('msgok');
        echo form_open('usuarios/cadastrar_aluno', array('class'=>'custom'));
        echo form_fieldset('Cadastrar novo professor(s)');
        echo form_label('Login');
        echo form_input(array('name'=>'login', 'class'=>'five'), set_value('login'), 'autofocus');
        echo form_label('CPF');
        echo form_input(array('name'=>'cpf', 'class'=>'five'), set_value('cpf'), 'autofocus');
        echo form_label('Nome');
        echo form_input(array('name'=>'nome', 'class'=>'five'), set_value('nome'), 'autofocus');
        echo form_label('Sobrenome');
        echo form_input(array('name'=>'sobrenome', 'class'=>'five'), set_value('sobrenome'), 'autofocus');
        echo form_label('Data de Nascimento');
        echo form_input(array('name'=>'cpf', 'class'=>'five'), set_value('data_nasc'), 'autofocus');     
        echo form_label('Email');
        echo form_input(array('name'=>'email', 'class'=>'five'), set_value('email'));
        echo form_label('Senha');
        echo form_password(array('name'=>'senha', 'class'=>'three'), set_value('senha'));
        echo form_label('Repita a senha');
        echo form_password(array('name'=>'senha2', 'class'=>'three'), set_value('senha2'));
        echo anchor('painel', 'Cancelar', array('class'=>'button radius alert espaco'));
        echo form_submit(array('name'=>'cadastrar', 'class'=>'button radius'), 'Salvar Dados');
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break; 
    case 'cadastrar_turma':
        echo '<div class="small-5 columns small-centered">';
        erros_validacao();
        get_msg('msgok');
        echo form_open('usuarios/cadastrar_turma', array('class'=>'custom'));
        echo form_fieldset('Cadastrar nova disciplina(s)');
        echo form_label('Número da Turma');
        echo form_input(array('name'=>'cod_turma', 'class'=>'five'), set_value('cod_turma'), 'autofocus');
        echo form_label('Código da Disciplina');
        echo form_input(array('name'=>'cod_disc', 'class'=>'five'), set_value('cod_disc'), 'autofocus');
        echo anchor('painel', 'Cancelar', array('class'=>'button radius alert espaco'));
        echo form_submit(array('name'=>'cadastrar', 'class'=>'button radius'), 'Salvar Dados');
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break;
    case 'gerenciar_curso':
        ?>
        <div class="twelve columns ">
            <?php
            get_msg('msgok');
            get_msg('msgerro');
            ?>
            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Nome do Curso</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$query = $this->usuarios->get_all()->result();
                    //foreach ($query as $linha):
                        echo '<tr>';
                        printf('<td>%s</td>', 'Técnico em informática para Internet');
                        printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')), anchor("usuarios/alterar_senha/", ' ', array('class'=>'table-actions table-pass', 'title'=>'Alterar Senha')), anchor("usuarios/excluir/", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
                        echo '</tr>';
                    //endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        break;
        case 'gerenciar_disciplina':
        ?>
        <div class="twelve columns ">
            <?php
            get_msg('msgok');
            get_msg('msgerro');
            ?>
            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Nome da Disciplina</th>
                        <th>Nome do Curso</th>
                        <th>Pré-Requisito(s)</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$query = $this->usuarios->get_all()->result();
                    //foreach ($query as $linha):
                        echo '<tr>';
                        printf('<td>%s</td>', 'Banco de dados I');
                        printf('<td>%s</td>', 'Tec. Informática p/ Internet');
                        printf('<td>%s</td>', 'Algoritmos de Programação');
                        printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')), anchor("usuarios/alterar_senha/", ' ', array('class'=>'table-actions table-pass', 'title'=>'Alterar Senha')), anchor("usuarios/excluir/", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
                        echo '</tr>';
                    //endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        break;
        case 'gerenciar_professor':
        ?>
        <div class="twelve columns ">
            <?php
            get_msg('msgok');
            get_msg('msgerro');
            ?>
            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Nome do Professor</th>
                        <th>Login</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>E-Mail</th>
                        <th>Senha</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$query = $this->usuarios->get_all()->result();
                    //foreach ($query as $linha):
                        echo '<tr>';
                        printf('<td>%s</td>', 'Raul');
                        printf('<td>%s</td>', 'raul');
                        printf('<td>%s</td>', '044.556.789-09');
                        printf('<td>%s</td>', '23/08/2015');
                        printf('<td>%s</td>', 'raul@liberato.com.br');
                        printf('<td>%s</td>', '123456');
                        printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')), anchor("usuarios/alterar_senha/", ' ', array('class'=>'table-actions table-pass', 'title'=>'Alterar Senha')), anchor("usuarios/excluir/", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
                        echo '</tr>';
                    //endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        break;
        case 'gerenciar_aluno':
        ?>
        <div class="twelve columns ">
            <?php
            get_msg('msgok');
            get_msg('msgerro');
            ?>
            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Nome do Aluno</th>
                        <th>Matrícula</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>E-Mail</th>
                        <th>Senha</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$query = $this->usuarios->get_all()->result();
                    //foreach ($query as $linha):
                        echo '<tr>';
                        printf('<td>%s</td>', 'Rodrigo Molina Munhoz');
                        printf('<td>%s</td>', '13102595');
                        printf('<td>%s</td>', '022.733.190-70');
                        printf('<td>%s</td>', '01/08/1995');
                        printf('<td>%s</td>', 'rodrigomunhoz1995@gmail.com');
                        printf('<td>%s</td>', '123456');
                        printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')), anchor("usuarios/alterar_senha/", ' ', array('class'=>'table-actions table-pass', 'title'=>'Alterar Senha')), anchor("usuarios/excluir/", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
                        echo '</tr>';
                    //endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        break;
        case 'gerenciar_turma':
        ?>
        <div class="twelve columns ">
            <?php
            get_msg('msgok');
            get_msg('msgerro');
            ?>
            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Número da Turma</th>
                        <th>Nome da Disciplina</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$query = $this->usuarios->get_all()->result();
                    //foreach ($query as $linha):
                        echo '<tr>';
                        printf('<td>%s</td>', '11131');
                        printf('<td>%s</td>', 'Algoritmos de Programação');
                        printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')), anchor("usuarios/alterar_senha/", ' ', array('class'=>'table-actions table-pass', 'title'=>'Alterar Senha')), anchor("usuarios/excluir/", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
                        echo '</tr>';
                    //endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        break;
    case 'alterar_senha':
        $iduser = $this->uri->segment(3);
        if ($iduser==NULL):
            set_msg('msgerro', 'Escolha um usuário para alterar', 'erro');
            redirect('painel');
        endif; ?>
        <div class="small-5 columns small-centered">
            <?php
                erros_validacao();
                get_msg('msgok'); 
                echo form_open();
                echo form_fieldset('Alterar senha');
                echo form_label('Nova Senha');
                echo form_password(array('name'=>'senha', 'class'=>'three'), set_value('senha'), 'autofocus');
                echo form_label('Repita a senha');
                echo form_password(array('name'=>'senha2', 'class'=>'three'), set_value('senha2'));
                echo anchor('painel', 'Cancelar', array('class'=>'button radius alert espaco'));
                echo form_submit(array('name'=>'alterarsenha', 'class'=>'button radius'), 'Salvar Dados');
                echo form_hidden('idusuario', $iduser);
                echo form_fieldset_close();
                echo form_close();
            ?>
        </div>      
        <?php
        break;
    default:
        echo '<div class="alert-box alert"><p>Tela solicitada não existe!!</p></div>';
        break;
}