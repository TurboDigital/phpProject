<?php
$nom = '';
$pre = '';
$pwd = '';
if(!empty($_POST['nom']))$nom = $_POST['nom'];
if(!empty($_POST['prenom']))$pre = $_POST['prenom'];
if(!empty($_POST['password']))$pwd = $_POST['password'];
try{
    $usr_que = $dbh->prepare("SELECT * FROM tbl_users WHERE nom=:u_nom && prenom=:u_prenom && password=:u_pass && type='admin'");
    $usr_que->execute(array(':u_nom' => $nom, ':u_prenom' => $pre, ':u_pass' => $pwd));
}catch(Exception $e){
    $use_que->rollbacl();
    echo "Error:".$e->getMessage();
}
try{
    if($usr_que->fetchColumn()){
        $_SESSION['logged'] = "true";
        header("Location: index.php");
    }
}catch(Exception $e){   
    echo "Error:".$e->getMessage();
}

?>
<div class="container theme-showcase" role="main">
    <br>
    <div class="page-header">
        <h1>Connexion</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form role="form" action="index.php?page=login" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <label class="sr-only" for="idnom">Nom</label>
                        <input type="text" class="form-control" name="nom" id="idnom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="idprenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom" id="idprenom" placeholder="Prenom">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="idpass">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="idpass" placeholder="Mot de passe">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Se connecter</button>
            </form>
        </div>
    </div>
</div>
