    	<?php 
			include 'conexao.php';
				$select=mysql_query("SELECT visi_id,visi_nome FROM  visitantes");
				while($registro=mysql_fetch_array($select)){
					$visi_id=$registro['visi_id'];
					$visi_nome=$registro['visi_nome'];
					echo "<option value='$visi_id'";if($visi_id==$visi_atual_id){echo "selected='selected'";}echo ">".$visi_nome."</option>";
				}
			mysql_close($conexao);
		?>
