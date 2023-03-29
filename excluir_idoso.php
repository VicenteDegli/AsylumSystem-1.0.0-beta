<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']!=1){
		echo "<script>alert('Você não tem permissão para assessar esta página!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>
    	<?php
			include 'conexao.php'; 
				$idos_id=$_GET['idos_id'];
				
				/*$select=mysql_query("SELECT * 
										FROM 
										    pessoas a,
											idosos b,
											exames c,
											documentos d,
											responsaveis e,
											idosos_responsaveis f,
											responsaveis_internacoes g
											
									    WHERE (a.pess_id = b.idos_pess_id) AND 
											  (c.exam_idoso_id = b.idos_id) AND
											  (d.docu_idoso_id = b.idos_id) AND			  										  
											  (b.idos_id = f.idos_resp_idos_id) AND
											  (f.idos_resp_resp_id = e.resp_id) AND
											  (b.idos_resp_inte_id = g.resp_inte_id) AND
											  (b.idos_id = '$idos_id')");	
				
					$registro=mysql_fetch_array($select);
					$idos_pess_id=$registro['idos_pess_id'];
					$resp_pess_id=$registro['resp_pess_id'];
					$resp_id=$registro['resp_id'];
					$resp_inte_pess_id=$registro['resp_inte_pess_id'];
					$resp_inte_id=$registro['resp_inte_id'];
					$docu_id=$registro['docu_id'];
					$exam_id=$registro['exam_id'];
					//Deletar o idoso e todos os dados ligados a ele.
					$delete=true;
					/*$delete=mysql_query("DELETE FROM identidades WHERE iden_docu_id='$docu_id'");
								
					$delete=mysql_query("DELETE FROM carteiras WHERE cart_docu_id='$docu_id'");
					$delete=mysql_query("DELETE FROM titulos WHERE titu_docu_id='$docu_id'");
			
					$delete=mysql_query("DELETE FROM documentos WHERE docu_id='$docu_id'");
					$delete=mysql_query("DELETE FROM exames WHERE exam_id='$exam_id'");			
					$delete=mysql_query("DELETE FROM obitos WHERE obit_idoso_id='$idos_id'");
					
					$delete=mysql_query("DELETE FROM idosos_responsaveis WHERE idos_resp_idos_id='$idos_id'");			
					$delete=mysql_query("DELETE FROM responsaveis WHERE resp_id='$resp_id'");
					$delete=mysql_query("DELETE FROM pessoas WHERE pess_id='$resp_pess_id'");
					
					//apagando visitas do idoso.
					$delete=mysql_query("DELETE FROM idosos_visitantes WHERE idos_visi_idos_id='$idos_id'");
					
					//apagando eventos do idoso.
					$delete=mysql_query("DELETE FROM idosos_eventos WHERE idos_even_idos_id='$idos_id'");				
					//apagando doenças do idoso.
					$delete=mysql_query("DELETE FROM idosos_doencas WHERE idos_doen_idos_id='$idos_id'");				
					$delete=mysql_query("DELETE FROM receitas WHERE rece_idos_id='$idos_id'");
					
					$delete=mysql_query("DELETE FROM atendimentos WHERE aten_idos_id='$idos_id'");*/
					$select=mysql_query("SELECT * FROM pessoas a,idosos b WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_id = '$idos_id')") or die (mysql_error());
					$registro=mysql_fetch_array($select);
					$idos_pess_id=$registro['idos_pess_id'];
					$delete=mysql_query("DELETE FROM idosos WHERE idos_id='$idos_id'") or die (mysql_error());
					
					$delete=mysql_query("DELETE FROM pessoas WHERE pess_id='$idos_pess_id'") or die (mysql_error());
					
				mysql_close($conexao);
			if($delete){
				?>
                	<script>
						alert('Idoso Excluido com Sucesso!');
						window.location.href='listar_idosos.php';
                    </script>
				<?php 
			}
			else{
				?>
                	<script>
						alert('Erro ao excluir idoso!');
						window.location.href='listar_idosos.php';
                    </script>
				<?php
			}
		?>
	</body>
</html>