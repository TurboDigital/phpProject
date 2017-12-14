<?php 
include_once "connect.php";
$user_id = '';
if(!empty($_GET['id'])){
    $user_id=$_GET['id'];

    $_SESSION['id_user']=$user_id;
    try{
        $res = $dbh->prepare('SELECT * FROM tbl_users WHERE id='.$user_id.' ');
        $res->execute();
    }catch(Exception $e){
        echo "Erreur:".$e->getMessage()."";
    }
}else header("Location: index.php");
?>
<br>
<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h3>Utilisateur</h3>
    </div>
    <div>
        <div class="col-md-6">
            <table class="table">
                <tr class="success">
<?php
$data = $res->fetch(PDO::FETCH_ASSOC);
                echo "
                    <th>".$data['nom']."</th>
                    <th>".$data['prenom']."</th>
                    <th>".$data['email']."</th>
                    ";
?>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="page-header">
        <h3>Ajouter une tache</h3>
    </div>
        <form action="log.php?action=tasks" method="post" role="form" class="form-inline">
            <div class="form-group">
                <label for="idtask">Tache</label>
                <input type="text" id="idtask" name="task" class="form-control" maxlength="250" placeholder="Task">
            </div>
            <div class="form-group">
                <label for="idstart">Debut</label>
                <input type="date" id="idstart" name="start" class="form-control" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="form-group">
                <label for="idfinish">Fin</label>
                <input type="date" id="idfinish" name="finish" class="form-control" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="form-group">
                <label for="iddegree">Degree</label>
                <select id="iddegree" name="degree">
                    <option value="A">Faible</option>
                    <option value="B">Simple</option>
                    <option value="C">Normal</option>
                    <option value="D">Important</option>
                </select>
            </div>
            <div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Envoyer</button>
            <a href="index.php" class="btn btn-primary">Annuler</a>
        </form>
</div>
