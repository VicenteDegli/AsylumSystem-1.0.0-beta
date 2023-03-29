    	<?php 
			include 'conexao.php';
				$select=mysql_query("SELECT idos_id,pess_nome,pess_sexo,idos_ativo FROM  pessoas a, idosos b WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_ativo = '1')");
				
				while($registro=mysql_fetch_array($select)){
					$idos_id=$registro['idos_id'];
					$idos_nome=$registro['pess_nome'];
					$pess_sexo=$registro['pess_sexo'];
					if($pess_sexo=='f'){
						echo "<br><input type='checkbox' name='idoso[]' value='$idos_id'>".$idos_nome."</option>";
						echo "<input type='hidden' name='pess_sexo' value='$pess_sexo'></option>";
					}
				}
			mysql_close($conexao);
		?>
