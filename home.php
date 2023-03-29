<?php include("verificar_sessao.php");?>
<html>
	<head>
  		<title>Sistema Abrigo Dos Velhos José Lima</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
		<link rel='stylesheet' type='text/css' href='home.css'>
        <script src='html5.js'></script> 
	</head>
	<body background='imagens/fundo.gif'>
		<img src='imagens/cabecalho_1.gif' id='cabecalho' border='0px'/>
        <div id='principal'>
            <div id='esquerda'></div>
            <div id='direita'></div>
            <div id='index'></div>
            <div id='rodape'></div>
		</div>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos'  title='Sair do Sistema'><p></a>
        <?php
			if($_SESSION['UsuarioNivel']==1){
				echo"<nav>
 				           <ul class='menu'>
								<li>Cadastrar
									<ul>	
										<li><a href='cadastrar_idoso.php'>Idoso</a></li>
										<li><a href='cadastrar_voluntario.php'>Voluntário</a></li>
										<li><a href='cadastrar_funcionario.php'>Funcionário</a></li>
				                   		<li><a href='cadastrar_obito.php'>Óbito</a></li>
				                    	<li><a href='cadastrar_espera.php'>Espera</a></li>
                				    	<li><a href='cadastrar_pedido.php'>Pedido de Serviço</a></li>
										<li><a href='cadastrar_atendimento.php'>Atendimento</a></li>
				                    	<li><a href='cadastrar_receita.php'>Receita</a></li>
                				    	<li><a href='cadastrar_evento.php'>Evento</a></li>
				                    	<li><a href='cadastrar_visita.php'>Visita</a></li>
 					                   	<li><a href='reincerir_familia.php'>Volta a Família</a></li>
 				                  		<li><a href='cadastrar_usuario.php'>Usuário</a></li>
							  	    </ul>
								</li>
               					<li>Pesquizar
									<ul>
										<li><a href='listar_idosos.php'>Idosos</a></li>
										<li><a href='listar_voluntarios.php'>Voluntários</a></li>
										<li><a href='listar_funcionarios.php'>Funcionários</a></li>
 				                  		<li><a href='listar_obitos.php'>Óbitos</a></li>
				                    	<li><a href='listar_esperas.php'>Esperas</a></li>
				                   	    <li><a href='listar_pedidos.php'>Pedidos de Serviço</a></li>
										<li><a href='listar_atendimentos.php'>Atendimento</a></li>
				                    	<li><a href='listar_eventos.php'>Eventos</a></li>
				                    	<li><a href='listar_visitas.php'>Visitas</a></li>
				                    	<li><a href='listar_reincersoes.php'>Voltas a Família</a></li>
										<li><a href='listar_responsaveis.php'>Responsáveis</a></li>
										<li><a href='listar_responsaveis_internacao.php'>Responsáveis Int.</a></li>
				                    	<li><a href='listar_usuarios.php'>Usuários</a></li>
							    	</ul>
						  		</li>
							 </ul>
						</nav>"; 
			}
			else if($_SESSION['UsuarioNivel']==2){
				echo"<nav>
 				           <ul class='menu'>
								<li>Cadastrar
									<ul>	
										<li><a href='cadastrar_idoso.php'>Idoso</a></li>
										<li><a href='cadastrar_voluntario.php'>Voluntário</a></li>
										<li><a href='cadastrar_funcionario.php'>Funcionário</a></li>
				                   		<li><a href='cadastrar_obito.php'>Óbito</a></li>
				                    	<li><a href='cadastrar_espera.php'>Espera</a></li>
                				    	<li><a href='cadastrar_pedido.php'>Pedido de Serviço</a></li>
										<li><a href='cadastrar_atendimento.php'>Atendimento</a></li>
				                    	<li><a href='cadastrar_receita.php'>Receita</a></li>
                				    	<li><a href='cadastrar_evento.php'>Evento</a></li>
				                    	<li><a href='cadastrar_visita.php'>Visita</a></li>
 					                   	<li><a href='reincerir_familia.php'>Volta a Família</a></li>
							  	    </ul>
								</li>
               					<li>Pesquizar
									<ul>
										<li><a href='listar_idosos.php'>Idosos</a></li>
										<li><a href='listar_voluntarios.php'>Voluntários</a></li>
										<li><a href='listar_funcionarios.php'>Funcionários</a></li>
 				                  		<li><a href='listar_obitos.php'>Óbitos</a></li>
				                    	<li><a href='listar_esperas.php'>Esperas</a></li>
				                   	    <li><a href='listar_pedidos.php'>Pedidos de Serviço</a></li>
										<li><a href='listar_atendimentos.php'>Atendimento</a></li>
				                    	<li><a href='listar_eventos.php'>Eventos</a></li>
				                    	<li><a href='listar_visitas.php'>Visitas</a></li>
				                    	<li><a href='listar_reincersoes.php'>Voltas a Família</a></li>
										<li><a href='listar_responsaveis.php'>Responsáveis</a></li>
										<li><a href='listar_responsaveis_internacao.php'>Responsáveis Int.</a></li>
							    	</ul>
						  		</li>
							 </ul>
						</nav>"; 
			}
			else if($_SESSION['UsuarioNivel']==3){ 
				echo"<nav>
 				           <ul class='menu'>
               					<li>Pesquizar
									<ul>
										<li><a href='listar_idosos.php'>Idosos</a></li>
										<li><a href='listar_voluntarios.php'>Voluntários</a></li>
										<li><a href='listar_funcionarios.php'>Funcionários</a></li>
 				                  		<li><a href='listar_obitos.php'>Óbitos</a></li>
				                    	<li><a href='listar_esperas.php'>Esperas</a></li>
				                   	    <li><a href='listar_pedidos.php'>Pedidos de Serviço</a></li>
										<li><a href='listar_atendimentos.php'>Atendimento</a></li>
				                    	<li><a href='listar_eventos.php'>Eventos</a></li>
				                    	<li><a href='listar_visitas.php'>Visitas</a></li>
				                    	<li><a href='listar_reincersoes.php'>Voltas a Família</a></li>
							    	</ul>
						  		</li>
							 </ul>
						</nav>";  
			}
			else{
				echo "Voçê não tem permissão pra acessar está página.";
			}
?>
    