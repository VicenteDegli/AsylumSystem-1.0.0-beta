    	<?php 
			
				$select=mysql_query("SELECT visi_id,visi_nome FROM  visitantes");
				while($registro=mysql_fetch_array($select)){
					$visi_id=$registro['visi_id'];
					$visi_nome=$registro['visi_nome'];
					echo "<option value='$visi_id'>".$visi_nome."</option>";
				}
			
		?>
