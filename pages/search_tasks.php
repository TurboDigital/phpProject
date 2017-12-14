<?php
$nom = '';
$pre = '';
$pwd = '';
if(!empty($_POST['nom']))$nom = $_POST['nom'];
if(!empty($_POST['prenom']))$pre = $_POST['prenom'];
if(!empty($_POST['password']))$pwd = $_POST['password'];
try{
    $usr_que = $dbh->prepare("SELECT * FROM tbl_users WHERE nom=:u_nom && prenom=:u_prenom && password=:u_pass");
    $usr_que->execute(array(':u_nom' => $nom, ':u_prenom' => $pre, ':u_pass' => $pwd));
}catch(Exception $e){
    echo "Error:".$e->getMessage();
}
try{
    $data = $usr_que->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id_usr'] = $data['id'];
    $_SESSION['q'] = 'tasks';
}catch(Exception $e){   
    echo "Error:".$e->getMessage();
}

?>
<div class="container theme-showcase" role="main">
    <br>
    <div class="page-header">
        <h1>Rechercher Taches</h1>
    </div>
    <div class="row">
        <div class="col-mod-8">
            <form class="form-inline" role="form" action="index.php?page=search" method="post">
                <div class="form-group">
                    <div class="input-group">
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
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>
    <?php
    if(isset($_SESSION['id_usr'])){
        echo "
        <div class=\"page-header\">
            <h1>Tasks</h1>
        </div>
        <div class=\"row\">
            <div class=\"col-md-8\">
            ";
        include_once "get_tasks.php";    
        echo "    
            </div>
        </div>
        ";
    }
    ?>
</div>
