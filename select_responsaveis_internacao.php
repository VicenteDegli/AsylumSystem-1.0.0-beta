<?php
		include 'conexao.php';
			$select=mysql_query("SELECT * FROM responsaveis_internacoes a, pessoas b WHERE (a.resp_inte_pess_id = b.pess_id)");
			$cont=0;
				while($linha=mysql_fetch_array($select)){
					$pess_id=$linha["pess_id"];
					$pess_nome=$linha["pess_nome"];
					$pess_data_nasc=$linha["pess_data_nasc"];
					$pess_cpf=$linha["pess_cpf"];
					$pess_sexo=$linha["pess_sexo"];
					$resp_inte_id=$linha['resp_inte_id'];
					$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));	
					
					echo "<option value='$resp_inte_id'>".$pess_nome."</option>";		
				}
					
		mysql_close($conexao);
?>
