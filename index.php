<?php

	include("classes/monitor.class.php");
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	
/**
	Vetor de objetos na SESSÃO. Instanciando DOIS objetos, passando como parâmetro os valores que queremos setar no momento da criação.
	O vetor só é inicializado caso não tenha sido setado
*/	
	
	
	if (!isset($_SESSION["MONITORES"][0])){
		$_SESSION["MONITORES"][0] = new MONITOR("S4msung", "Preta", "1600", "900", "", "");
		$_SESSION["MONITORES"][1] = new MONITOR("Appl3", "Branca", "1920", "1080", "", "");
	}
	

	
	if ($_GET["setaValor"] == 1){
		$_NOVA_MARCA = $_POST["marca"];
		$_NOVA_COR = $_POST["cor"];
		$_NOVA_LARGURA = $_POST["largura"];
		$_NOVA_ALTURA = $_POST["altura"];

/**
	INICIALIZA a variável controladora de criação de itens
*/
		
	if (!isset($_SESSION["NEXT_ITEM"]))
		$_SESSION["NEXT_ITEM"] = 2;
		

	if ($_POST["btns"] == "reset"){	

/**
	Caso botão reset seja acionado, apaga dados inseridos na sessão.
	A rotina ignora os dois resultados de exemplo. Estes não são destruidos e seguem preenchidos
*/

		unset($_SESSION["NEXT_ITEM"]);
		$z=0;
		while(isset($_SESSION["MONITORES"][$z])){
			unset($_SESSION["MONITORES"][$z]);
			$z++;
		}
		$_SESSION["MONITORES"][0] = new MONITOR("S4msung", "Preta", "1600", "900", "", "");
		$_SESSION["MONITORES"][1] = new MONITOR("Appl3", "Branca", "1920", "1080", "", "");
	
	
	}else{	
	

		
/**
	CRIA NOVO MONITOR NA SESSÃO
*/	
		
		if($_POST["qualMonit"] == 3){
			
			$_SESSION["MONITORES"][$_SESSION["NEXT_ITEM"]] = new MONITOR($_NOVA_MARCA, $_NOVA_COR, $_NOVA_LARGURA, $_NOVA_ALTURA, date("d/m/y"), date('H:i:s', time()));
			$_SESSION["NEXT_ITEM"]++;
/**
	SETA os atributos dos itens padrão através do médoto SET
*/			
		}else{
			$_SESSION["MONITORES"][$_POST["qualMonit"]]->set('_MARCA', $_NOVA_MARCA);
			$_SESSION["MONITORES"][$_POST["qualMonit"]]->set('_COR', $_NOVA_COR);
			$_SESSION["MONITORES"][$_POST["qualMonit"]]->set('_ALTURA_PX', $_NOVA_LARGURA);
			$_SESSION["MONITORES"][$_POST["qualMonit"]]->set('_LARGURA_PX', $_NOVA_ALTURA);
		}
		
		
		
	}
}

?>

<html>


	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/main.css" async>
		<title>Meu primeiro projeto orientado a objetos :)</title>
		
	</head>
	
	<body>
		
		<section id="mainTop">
			<div>
				<h2 style="text-align:left;">Monitor 1:</h2>
				<ul>
					<li><strong>Marca:</strong><? echo $_SESSION["MONITORES"][0]->get('_MARCA'); ?></li>
					<li><strong>Cor:</strong><? echo $_SESSION["MONITORES"][0]->get('_COR'); ?></li>
					<li><strong>Largura(px):</strong><? echo $_SESSION["MONITORES"][0]->get('_LARGURA_PX'); ?></li>
					<li><strong>Altura(px):</strong><? echo $_SESSION["MONITORES"][0]->get('_ALTURA_PX'); ?></li>
				</ul>
			</div>
			
			<div style="margin-left:5px;">
				<h2>Monitor 2:</h2>
				<ul>
					<li><strong>Marca:</strong><? echo $_SESSION["MONITORES"][1]->get('_MARCA'); ?></li>
					<li><strong>Cor:</strong><? echo $_SESSION["MONITORES"][1]->get('_COR'); ?></li>
					<li><strong>Largura(px):</strong><? echo $_SESSION["MONITORES"][1]->get('_LARGURA_PX'); ?></li>
					<li><strong>Altura(px):</strong><? echo $_SESSION["MONITORES"][1]->get('_ALTURA_PX'); ?></li>
				</ul>
			</div>
				</section>
			<?php 
			
			if ($_SESSION["NEXT_ITEM"]>2){
				
				$q=2;
				
				while(isset($_SESSION["MONITORES"][$q])){ ?>
					<section id="mainItems">
						<div style="width:100%">
							<h2>Monitor <?php echo $q+1; ?>:</h2>
							<ul>
								<li><strong>Marca:</strong><? echo $_SESSION["MONITORES"][$q]->get('_MARCA'); ?></li>
								<li><strong>Cor:</strong><? echo $_SESSION["MONITORES"][$q]->get('_COR'); ?></li>
								<li><strong>Largura(px):</strong><? echo $_SESSION["MONITORES"][$q]->get('_LARGURA_PX'); ?></li>
								<li><strong>Altura(px):</strong><? echo $_SESSION["MONITORES"][$q]->get('_ALTURA_PX'); ?></li>
								<li><strong>Data:</strong><? echo $_SESSION["MONITORES"][$q]->get('_DATA_INSERIDO'); ?></li>
								<li><strong>Hora:</strong><? echo $_SESSION["MONITORES"][$q]->get('_HORA_INSERIDO'); ?></li>
							</ul>
						</div>
					</section>
				<?php
					$q++;
				}
			}
			?>
			
		
				<section id="mainMiddle">
			<div style="width:100%;">
				<h2>Alterar/Inserir:</h2>
				<form action="?setaValor=1#mainMiddle" method="POST">
					<ul>
						<li>
							<label>1</label>
							<input type="radio" value="1" name="qualMonit" >
							<label>2</label>
							<input type="radio" value="2" name="qualMonit">		
							<label>add</label>
							<input type="radio" value="3" name="qualMonit" checked>
						</li>
						<li><input type="text" placeholder="Marca" name="marca" ></li>
						<li><input type="text" placeholder="Cor" name="cor" ></li>
						<li><input type="text" placeholder="Largura (em px)" name="largura" ></li>
						<li><input type="text" placeholder="Altura (em px)" name="altura" ></li>
						<li><input type="submit" name="btns"></li>
						<li><input type="submit" value="reset" name="btns"></li>
					</ul>
				</form>
			</div>
			
			
			
		</section>
	</body>
</html>