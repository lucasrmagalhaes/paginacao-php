<?php 

include_once("conexao.php");

$id_curso = $_GET['id_curso'];

$cursos_by_id = "SELECT * FROM cursos WHERE id='$id_curso'";

$resultado_cursos = mysqli_query($conn, $cursos_by_id);

$cursos = mysqli_fetch_assoc($resultado_cursos);

?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Paginação</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1><?php echo $cursos['nome']; ?></h1>
			</div>

			<div>
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
						Conteúdo
					</a>
				</li>
				
				<li role="presentation">
					<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
						Avaliação
					</a>
				</li>
				
				<li role="presentation">
					<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
						Metodologia
					</a>
				</li>
				
				<li role="presentation">
					<a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
						Restrições
					</a>
				</li>
				
				<li role="presentation">
					<a href="#detalhes" aria-controls="detalhes" role="tab" data-toggle="tab">
						Normatizações
					</a>
				</li>
				
				<li role="presentation">
					<a href="#tutores" aria-controls="tutores" role="tab" data-toggle="tab">
						Tutores
					</a>
				</li>
			  </ul>

			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<?php echo $cursos['conteudo']; ?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="profile">
					<?php echo $cursos['avaliacao']; ?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="messages">
					<?php echo $cursos['metodologia']; ?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="settings">
					<?php echo $cursos['restricoes']; ?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="detalhes">
					<?php echo $cursos['normatizacoes']; ?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="tutores">
					<?php echo $cursos['tutores']; ?>
				</div>
			  </div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>