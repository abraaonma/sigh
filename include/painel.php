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
		
				
		<?php
			
			require_once('conect.php');
			
			//------------- Sql's de consultas -------------

			// 1. Buscando total de professores demandados ao DHS
			$sql_s = $conn->prepare("select SIAPE_PROF, COUNT(*) AS siape FROM prof");
			$sql_s->execute();
			$result_s = $sql_s->fetch();
			// ** Total de professores demandados: $result_s['siape'] -- ** Comentário
			
			// 2. Buscando total de disciplinas ofertadas de forma individual pelo DHS
			$sql_d = $conn->prepare("select NOM_DISC, COUNT(*) AS disc FROM disc");
			$sql_d->execute();
			$result_d = $sql_d->fetch();
			// ** Total de disciplinas: $result_d['disc'] -- ** Comentário
			
			// 3. Buscando total de disciplinas ofertadas agrupadas por quantidade total
			$sql_c = $conn->prepare("select FK_SIGL_DISC, COUNT(*) AS sigl FROM reltab");
			$sql_c->execute();
			$result_c = $sql_c->fetch();
			// ** Total de disciplinas ofertadas por curso: $result_c['sigl'] -- ** Comenttário
			
			// 4. Buscando total de disciplinas por disciplina (pelo nome)
			$sql_disc = $conn->prepare("select FK_NOM_DISC, COUNT(*) AS count_disc FROM reltab GROUP BY FK_NOM_DISC");
			$sql_disc->execute();
			
			// 5. Buscando total de disciplinas por professor para construção da tabela abaixo
			$sql_a = $conn->prepare("select FK_NOM_PROF, FK_SIGL_DISC, COUNT(*) AS count FROM reltab GROUP BY FK_NOM_PROF, FK_SIGL_DISC");
			$sql_a->execute();

			
		?>
			<!------------- Itens 1, 2, 3 das Sql's acima ------------->
			<div class="google-fonts">DADOS GERAIS</div>

			<table>
				
				<tr>
					<td style="text-align: left">Total de professores demandados: </td>
					<td><?php echo $result_s['siape']; ?></td>
				</tr>
				<tr>
					<td style="text-align: left">Total de disciplinas por ementa: </td>
					<td><?php echo $result_d['disc']; ?></td>
				</tr>
				<tr>
					<td style="text-align: left">Total de disciplinas ofertadas por curso: </td>
					<td><?php echo $result_c['sigl']; ?></td>
				</tr>
				
			</table>

		</div>

		<div style="background-color: #f2f2f2; padding: 20px; font-size: 12pt; color: #000; margin-top: 10px; text-align: center; border-radius: 5px;">

		<!------------- Iten 4 das Sql's acima ------------->
		
		<div class="google-fonts">RELAÇÃO DE DISCIPLINAS / QUANTIDADE</div>
		
		<table>
		
		<?php
			
			while($result_disc = $sql_disc->fetch())
			
			{
				echo 
				"
				<tr>
					<td style='text-align: left'>". $result_disc['FK_NOM_DISC'] ."</td>
					<td>". $result_disc['count_disc'] ."</td>
				</tr>
				";
			}

		?>

			
			
		</table>

		</div>

		
		<div style="background-color: #f2f2f2; padding: 20px; font-size: 12pt; color: #000; margin-top: 10px; text-align: center; border-radius: 5px;">
	

		<!------------- Item 5 das Sql's acima ------------->

		<div class="google-fonts">RELAÇÃO PROFESSOR / DISCIPLINAS</div>

		
		<!--Tabela com quantidade de disciplina por professor-->	
		
		<table>
			<tr>
				<th>Nome</th>
				<th>Disciplina</th>
				<th>Quantidade</th>
			</tr>
			
		<?php
			
			// Tabela relacional - Professor/Disciplina/Quantidade com "While"

			while($result_a = $sql_a->fetch())
			{
				
				echo "
				<tr>
					<td>". $result_a['FK_NOM_PROF'] ."</td><td>" . $result_a['FK_SIGL_DISC'] . "</td><td>" . $result_a['count'] ."</td>
				</tr>
				";
				
				
			}
			
			
		?>
			
			<!--****** Total de disciplinas/curso atendidas ******-->
			
			<tr>
				<td><b>Total de disciplinas</b></td>
				<td> - </td>
				<td><?php echo "<b>".$result_c['sigl']."</b>"; ?></td>
			</tr>
			
		</table>
	</div>

</body>
</html>
