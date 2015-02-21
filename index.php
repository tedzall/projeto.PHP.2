<?php 
	require_once("config.php");
	require_once("functions.php");

	$url = "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$rota = getRota($url,$dataMenu);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    	<title>Projeto PHP 2</title>

    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/standard.css" rel="stylesheet">

	    <script src="js/jquery.js"></script>
   	 	<script src="js/bootstrap.min.js"></script>

		<script>
			$(document).on("click",".btn",function(){
				var nome = $("#nome").val();
				var email = $("#email").val();
				var assunto = $("#assunto").val();
				var mensagem = $("#mensagem").val();
				var html = "<h3>Seus dados foram enviados com sucesso !!!</h3><p>Seque abaixo os dados que você enviou:</p><ul><li>Nome: <b>"+nome+"</b></li><li>Email: <b>"+email+"</b></li><li>Assunto: <b>"+assunto+"</b></li><li>Mensagem: <br/><b>"+mensagem+"</b></li></ul>";
				$("#msg-form").removeClass("hidden").html(html);
				setTimeout(clearAllForm,8000);
			});
			
			function clearAllForm(){
				$("#msg-form").addClass("hidden");
				$("#nome").val('');
				$("#email").val('');
				$("#assunto").val('');
				$("#mensagem").val('');
			}
		</script>

  	</head>

	<body>

		<!-- Header -->
  		<?php require_once('header.php') ?>
		<!-- end.Header -->	

		<!-- Miolo -->
		<div id="miolo"> 

			<!-- Menu -->
			<div id="menu">
        		<ul class="menu-bar">
<?php 
	foreach($dataMenu as $menu){
		echo '<li class="'.( ('home'==$menu)?'home':'' ).( ($conteudo==$menu)?' active':'' ).'"><a href="'.$menu.'">'.ucfirst($menu).'</a></li>';
	}
?>        			
            	</ul>
    	    </div>
			<!-- end.Menu -->

			<!-- Conteudo -->
	        <div id="conteudo"><?php require_once($rota . ".php") ?></div>
			<!-- end.Conteudo -->

    	</div> 
    	<!-- end.Miolo -->

		<!-- Footer -->
		<?php require_once('footer.php') ?>
		<!-- end.Footer -->	

	</body>
</html>