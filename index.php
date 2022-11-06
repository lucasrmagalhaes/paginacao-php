<?php 

include_once("conexao.php");

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$cursos = "SELECT * FROM cursos";

$resultado_cursos = mysqli_query($conn, $cursos);

$total_cursos = mysqli_num_rows($resultado_cursos);

$qtd_pagina = 6;

$num_pagina = ceil($total_cursos / $qtd_pagina);

$incio = ($qtd_pagina * $pagina) - $qtd_pagina;

$resultado = "SELECT * FROM cursos limit $incio, $qtd_pagina";

$resultado_cursos = mysqli_query($conn, $resultado);
$total_cursos = mysqli_num_rows($resultado_cursos);

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
				<h1>Cursos</h1>
			</div>

			<div class="row">
				<?php while ($curso = mysqli_fetch_assoc($resultado_cursos)) { ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="imagens/produto.jpg" alt="Produto">

							<div class="caption text-center">
								<a 
									href="detalhes.php?id_curso=<?php echo $curso['id']; ?>"
								>
									<h3>
										<?php echo $curso['nome']; ?>
									</h3>
								</a>
								
								<p>
									<a href="#" class="btn btn-primary" role="button">
										Comprar
									</a>
								</p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<?php
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>

			<nav class="text-center">
				<ul class="pagination">
					<li>
						<?php if ($pagina_anterior != 0) { ?>
							<a href="index.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php } else { ?>
							<span aria-hidden="true">&laquo;</span>
						<?php } ?>
					</li>
					
					<?php for ($i = 1; $i < $num_pagina + 1; $i++) { ?>
						<li>
							<a href="index.php?pagina=<?php echo $i; ?>">
								<?php echo $i; ?>
							</a>
						</li>
					<?php } ?>
					
					<li>
						<?php if ($pagina_posterior <= $num_pagina) { ?>
							<a href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php } else { ?>
							<span aria-hidden="true">
								&raquo;
							</span>
						<?php } ?>
					</li>

					<li>
						<p>Total: <?= $total_cursos ?></p> 
					</li>
				</ul>
			</nav>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>