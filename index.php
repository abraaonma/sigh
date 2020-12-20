<!--
Data: 23 de fevereiro de 2020
Autor: By Neiver 
Tipo: Dashboard para PET Creche - Tela de Administrador
*Criar tela de Caixa
*Criar tela de funcionários com recepção e entrega de cachorros
*Fazer revisão de "name" do menu
-->
<!DOCTYPE html>
<html>
<head>
	<title>HORÁRIOS DHS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" media="all and (orientation:landscape)" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>

	<div class="top">
		<div class="logo">
			
			<!-- OCULTANDO IMAGEM -------<a href="index.php"><img src="icon/score.png" width="30"><br>HORÁRIOS DHS</a>----- OCULTANDO IMAGEM --------->
		</div>
	</div>
	<div class="content-geral">		
		<div class="content-left">
			<form method="post">
				<!--------------------------RETIRADA DE BOTÃO "PAINEL DE CONTROLE"-------------------->
				<button class="<?php if(isset($_POST['painel']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="painel"><img src="icon/dashboard50.png" class="icon-dash"><div class="text-dash">PAINEL DE CONTROLE</div></button>
				<!--------------------------RETIRADA DE BOTÃO "PAINEL DE CONTROLE"-------------------->

				<button class="<?php if(isset($_POST['cv']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="cv"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">COMUNICAÇÃO VISUAL</div></button>
				
				<button class="<?php if(isset($_POST['dm']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="dm"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">DESIGN DE MÓVEIS</div></button>
				
				<button class="<?php if(isset($_POST['ed']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="ed"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">EDIFICAÇÕES</div></button>
				
				<button class="<?php if(isset($_POST['em']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="em"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">ELETROMECÂNICA</div></button>
				
				<button class="<?php if(isset($_POST['el']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="el"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">ELETRÔNICA</div></button>

				<button class="<?php if(isset($_POST['et']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="et"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">ELETROTECNICA</div></button>

				<button class="<?php if(isset($_POST['aut']))	{echo 'nav-active';}else{echo 
				'nav';} ?>" name="aut"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">AUTOMACAO INDUSTRIAL</div></button>

				<button class="<?php if(isset($_POST['inf']))	{echo 'nav-active';}else{echo 
				'nav';} ?>" name="inf"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">INFORMATICA</div></button>

				<button class="<?php if(isset($_POST['mec']))	{echo 'nav-active';}else{echo 
				'nav';} ?>" name="mec"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">MECANICA</div></button>

				<button class="<?php if(isset($_POST['met']))	{echo 'nav-active';}else{echo 
				'nav';} ?>" name="met"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">METALURGIA</div></button>

				<button class="<?php if(isset($_POST['qui']))	{echo 'nav-active';}else{echo 
				'nav';} ?>" name="qui"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">QUIMICA</div></button>

				<button class="<?php if(isset($_POST['st']))	{echo 'nav-active';}else{echo 
				'nav';} ?>" name="st"><img src="icon/check50.png" class="icon-dash"><div class="text-dash">SEGURANCA DO TRABALHO</div></button>					

				<!--<button class="<?php if(isset($_POST['sair']))	{echo 'nav-active';}else{echo 
					'nav';} ?>" name="sair"><img src="icon/logout50.png" class="icon-dash"><div class="text-dash">SAIR</div></button>-->
			
			</form>
		</div>
		<div class="content-right">
			<div class="content-box">
				<?php 
					
					if(isset($_POST['painel']))
					{
						include_once('include/painel.php');
					}
					elseif(isset($_POST['cv']))
					{
						include_once('include/cv.php');
					}
					elseif(isset($_POST['dm']))
					{
						include_once('include/dm.php');
					}
					elseif(isset($_POST['ed']))
					{
						include_once('include/ed.php');
					}
					elseif(isset($_POST['em']))
					{
						include_once('include/em.php');
					}
					elseif(isset($_POST['el']))
					{
						include_once('include/el.php');
					}
					elseif(isset($_POST['et']))
					{
						include_once('include/et.php');
					}
					elseif(isset($_POST['aut']))
					{
						include_once('include/aut.php');
					}					
					elseif(isset($_POST['inf']))
					{
						include_once('include/inf.php');
					}					
					elseif(isset($_POST['mec']))
					{
						include_once('include/mec.php');
					}					
					elseif(isset($_POST['met']))
					{
						include_once('include/met.php');
					}
					elseif(isset($_POST['qui']))
					{
						include_once('include/qui.php');
					}
					elseif(isset($_POST['st']))
					{
						include_once('include/st.php');
					}
					elseif(isset($_POST['sair']))
					{
						header('Location: index.php');
					}
					else
					{
						include_once('include/painel.php');
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>