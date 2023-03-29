    	<?php 
				$select=mysql_query("SELECT idos_id,pess_nome FROM  pessoas a, idosos b WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_ativo = '1')");
				while($registro=mysql_fetch_array($select)){
					$idos_id=$registro['idos_id'];
					$idos_nome=$registro['pess_nome'];
					echo "<option value='$idos_id'>".$idos_nome."</option>";
				}
		?>
