<!DOCTYPE html>
<html class="no-js" lang="pt-br">
	  <head>
		    <meta charset="utf-8" />
		    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		    <title><?php if (isset($titulo)): ?>{titulo} | <?php endif; ?>{titulo_padrao}</title>
		    
		    {headerinc}
	  </head>
	  <body>
	  		<?php if (esta_logado(FALSE)) { ?>
	  			<div class="row header">
	  				<div class="eight columns">
	  					<a href="<?php echo base_url('painel'); ?>">
	  						<img class="img-logo" src="<?php echo base_url('images/logo.png'); ?>" alt="Logo Liberato">
	  					</a>
	  				</div>
	  				<div class="four columns">
	  					<p class="text-right">Logado como <strong><?php echo $this->session->userdata('user_nome'); ?></strong></p>
	  					<p class="text-right">
	  						<?php echo anchor('usuarios/alterar_senha/'.$this->session->userdata('user_id'), 'Alterar senha', 'class="button radius tiny"'); ?>
	  						<?php echo anchor('usuarios/logoff', 'Sair', 'class="button radius tiny alert"'); ?>
	  					</p>
	  				</div>
	  			</div>
	  			<div class="row">
		  			<div class="menu-wrap">
					    <nav class="menu">
					        <ul class="clearfix">
					            <li><?php echo anchor('painel', 'Início'); ?></li>
					            <li>
					                <a href="#">Cursos<span class="arrow">&#9660;</span></a>
					                <ul class="sub-menu">
					                    <li><?php echo anchor('usuarios/cadastrar_curso', 'Cadastrar'); ?></li>
					                    <li><?php echo anchor('usuarios/gerenciar_curso', 'Gerenciar'); ?></li>
					                </ul>
					            </li>
					            <li>
					                <a href="#">Disciplinas<span class="arrow">&#9660;</span></a>
					                <ul class="sub-menu">
					                    <li><?php echo anchor('usuarios/cadastrar_disciplina', 'Cadastrar'); ?></li>
					                    <li><?php echo anchor('usuarios/gerenciar_disciplina', 'Gerenciar'); ?></li>
					                </ul>
					            </li>
					            <li>
					                <a href="#">Professores<span class="arrow">&#9660;</span></a>
					                <ul class="sub-menu">
					                    <li><?php echo anchor('usuarios/cadastrar_professor', 'Cadastrar'); ?></li>
					                    <li><?php echo anchor('usuarios/gerenciar_professor', 'Gerenciar'); ?></li>
					                </ul>
					            </li>
					            <li>
					                <a href="#">Alunos<span class="arrow">&#9660;</span></a>
					                <ul class="sub-menu">
					                    <li><?php echo anchor('usuarios/cadastrar_aluno', 'Cadastrar'); ?></li>
					                    <li><?php echo anchor('usuarios/gerenciar_aluno', 'Gerenciar'); ?></li>
					                </ul>
					            </li>
					            <li>
					                <a href="#">Turmas<span class="arrow">&#9660;</span></a>
					                <ul class="sub-menu">
					                    <li><?php echo anchor('usuarios/cadastrar_turma', 'Cadastrar'); ?></li>
					                    <li><?php echo anchor('usuarios/gerenciar_turma', 'Gerenciar'); ?></li>
					                </ul>
					            </li>
					            
					        </ul>
					    </nav>
					</div>
				</div>	
	  		<?php } ?>
	  		<div class="row paineladm">
				{conteudo}
			</div>
	  		<div class="row rodape">
	  			<div class="twelve columns text-center">
	  				{rodape}
	  			</div>
	  		</div>
	  		{footerinc}
	  </body>
</html>