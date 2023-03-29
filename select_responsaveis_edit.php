<?php
		include 'conexao.php';
			$select=mysql_query("SELECT pess_nome,resp_id FROM responsaveis a, pessoas b WHERE (a.resp_pess_id = b.pess_id)");
			$cont=0;
				while($linha=mysql_fetch_array($select)){
					$pess_nome=$linha["pess_nome"];
					$this_resp_id=$linha['resp_id'];				
					echo "<option value='$this_resp_id'"; if($this_resp_id==$resp_id){echo "selected='selected'";} echo"> $pess_nome</option>";		
				}				
		mysql_close($conexao);
		
?>