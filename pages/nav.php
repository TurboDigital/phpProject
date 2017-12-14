<?php
session_start();
$logged = "";
if(!empty($_SESSION['logged']))$logged = $_SESSION['logged'];
?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Accueil</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<?php 
                        if($logged == "true"){
                            echo "<li><a href=\"index.php?page=admin\">Administrateur</a></li>
                            <li><a href=\"index.php?page=adduser\">Ajouter utilisateur</a></li>
                            <li><a href=\"log.php?action=logout\">Deconnection</a></li>
                            ";
                        }else{
                        echo "
						<li><a href=\"index.php?page=search\">Rechercher taches</a></li>
						<li><a href=\"index.php?page=login\">Connexion</a></li>
                        ";
                        }
                        ?>
					</ul>
				</div>
			</div>
		</nav>
