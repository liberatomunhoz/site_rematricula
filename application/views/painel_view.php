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
	  					<a href="<?php echo base_url('painel'); ?>"><h3>Liberato - ADMINISTRADOR</h3></a>
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
	  				<nav class="top-bar" data-topbar role="navigation">
					  	<section class="top-bar-section">
					    	<!-- Left Nav Section -->
					    	<ul class="left">
					    		<li><?php echo anchor('painel', 'Início'); ?></li>
					      		<li class="has-dropdown">
					        		<?php echo anchor('usuarios/gerenciar', 'Cursos'); ?>
					        		<ul class="dropdown">
					          			<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
										<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
					        		</ul>
					      		</li>
					      		<li class="has-dropdown">
					        		<?php echo anchor('usuarios/gerenciar', 'Disciplinas'); ?>
					        		<ul class="dropdown">
					          			<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
										<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
					        		</ul>
					      		</li>
					      		<li class="has-dropdown">
					        		<?php echo anchor('usuarios/gerenciar', 'Professor'); ?>
					        		<ul class="dropdown">
					          			<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
										<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
					        		</ul>
					      		</li>
					      		<li class="has-dropdown">
					        		<?php echo anchor('usuarios/gerenciar', 'Aluno'); ?>
					        		<ul class="dropdown">
					          			<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
										<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
					        		</ul>
					      		</li>
					      		<li class="has-dropdown">
					        		<?php echo anchor('usuarios/gerenciar', 'Turmas'); ?>
					        		<ul class="dropdown">
					          			<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
										<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
					        		</ul>
					      		</li>
					    	</ul>
					  	</section>
					</nav> 
	  			<!--	<section class="top-bar-section">
                    	<ul class="left">
                        	<li class="divider show-for-small-only"></li>
                        	<li class="has-dropdown">
	  						<li><?php echo anchor('painel', 'Início'); ?></li>
							<?php echo anchor('usuarios/gerenciar', 'Usuários'); ?>
								<ul class="dropdown">
									<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
									<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
								</ul>
							</li>
	  					</ul> 
					</section> -->
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