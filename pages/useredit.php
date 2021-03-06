<?php
$usr_id = $_GET['id'];
try{
	$response = $dbh->query('SELECT * FROM tbl_users WHERE id='.$usr_id.'');
	$_SESSION["usr_id"] = $usr_id;
}catch(PDOException $e){
	echo "Erreur:".$e->getMessage()."<br />";
}
?>
<div class="container theme-showcase" role="main">
    <br>
    <div class="page-header">
        <h1>Editer utilisateur</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
    <?php while($donnee=$response->fetch()){ ?>
        <form action="log.php?action=edit" method="post" role="form">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="firstname" class="form-control" value="<?php echo $donnee['nom'];?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="lastname" class="form-control" value="<?php echo $donnee['prenom'];?>">
            </div>
            <div class="form-group">
                <label for="e-mail">E-mail</label>
                <input type="email" id="e-mail" name="email" class="form-control" value="<?php echo $donnee['email'];?>">
            </div>
            <div class="form-group">
                <label for="ipaswd">Password</label>
                <input type="password" id="ipaswd" name="password" class="form-control" placeholder="Password" maxlength="9">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="index.php" class="btn btn-success">Annuler</a>
        </form>
        <br>
        <form action="log.php?action=delete" method="post" role="form">
            <button type="subbmit" class="btn btn-danger">Supprimer</button>
        </form>
    <?php 
    }
    $response->closeCursor();
    ?>
        </div>
    </div>
</div>
