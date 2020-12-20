<form method="post">
<div class="btn-inline">
	<ul>
		
		<li><button name="cv" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>CV</button></li>
				
		<li><button name="dm" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>DM</button></li>
		
		<li><button name="ed" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>ED</button></li>

		<li><button name="em" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>EM</button></li>
				
		<li><button name="el" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>EL</button></li>

		<li><button name="et" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>ET</button></li>				

		<li><button name="aut" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>AUT</button></li>				

		<li><button name="inf" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>INF</button></li>				

		<li><button name="mec" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>MEC</button></li>				

		<li><button name="met" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>MET</button></li>				

		<li><button name="qui" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>QUI</button></li>				

		<li><button name="st" class="btn-painel"><img src="icon/check50.png" class="icon-painel"><br>ST</button></li>				


		<li><button name="sair" class="btn-painel"><img src="icon/logout50.png" class="icon-painel"><br>SAIR</button></li>
	</ul>
</div>
</form>

	<div style="background-color: #f2f2f2; padding: 20px; font-size: 12pt; color: #000; margin-top: 10px; text-align: center; border-radius: 5px;">
		
		<h4 style="padding: 10px; text-align: left;">Total de disciplinas ministradas por professor:</h4>
		
		<?php
			
			require_once('conect.php');
			
			$sql_a = $conn->prepare("select FK_NOM_PROF, COUNT(*) AS count FROM reltab GROUP BY FK_NOM_PROF");
			$sql_a->execute();
			
			
		?>
		
		
		<!--Tabela com quantidade de disciplina por professor-->	
		
		<table>
			<tr>
				<th>Nome</th>
				<th>Quant.</th>
			</tr>
			
		<?php
			
			while($result_a = $sql_a->fetch())
			{
				
				echo "<tr><td>". $result_a['FK_NOM_PROF'] ."</td>
				<td>". $result_a['count'] ."</td></tr>";
			
			}
			
			
		?>
		</table>
	</div>

</body>
</html>
