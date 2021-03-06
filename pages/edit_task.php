<?php 
include_once "connect.php";
$user_id = '';
$task_id = '';
if(!empty($_GET['id'])){
    $user_id=$_GET['id'];
    if(!empty($_GET['id_task']))$task_id = $_GET['id_task'];
    $_SESSION['id_user']=$user_id;
    $_SESSION['id_task']=$task_id;
    try{
        $res = $dbh->prepare('SELECT * FROM tbl_users WHERE id='.$user_id.' ');
        $res->execute();
    }catch(Exception $e){
        echo "Erreur:".$e->getMessage()."";
    }
    try{
        $res_que = $dbh->prepare('SELECT * FROM tbl_tasks WHERE id_task=:get_id_task && id_user=:get_id_user');
        $res_que->execute(
        array(':get_id_task' => $task_id, ':get_id_user' => $user_id)
        );
    }catch(Exception $e){
        echo "Erreur:".$e->getMessage();
    }
}else header("Location: index.php");
?>
<br>
<div class="container theme-showcase" role="main">
    <div class="page-header">
            <h4>Editer une tache</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th colspan="3">Utilisateur</th>
                </tr>
                <tr class="success">
<?php
$data = $res->fetch(PDO::FETCH_ASSOC);
                echo "
                    <th>".$data['nom']."</th>
                    <th>".$data['prenom']."</th>
                    <th>".$data['email']."</th>
                </tr>
                    ";
$task_data = $res_que->fetch(PDO::FETCH_ASSOC);

                echo "
                <tr>
                    <th colspan=\"3\">Tache</th>
                </tr>
                <tr class=\"info\">
                    <th>".$task_data['task']."</th>
                    <th>".$task_data['created']."</th>
                    <th>".$task_data['finish']."</th>
                </tr>
                ";        
?>
            </table>
        </div>
        <div class="col-md-6">
        <form action="log.php?action=edit_task" method="post" role="form" class="form-horisontal">
            <div class="form-group">
                <label for="idtask">Tache</label>
                <input type="text" id="idtask" name="task" class="form-control" maxlength="250" value="<?php echo $task_data['task'] ?>">
            </div>
            <div class="form-group">
                <label for="idstart">Debut</label>
                <input type="date" id="idstart" name="start" class="form-control" value="<?php echo $task_data['created'] ?>">
            </div>
            <div class="form-group">
                <label for="idfinish">Fin</label>
                <input type="date" id="idfinish" name="finish" class="form-control" value="<?php echo $task_data['finish'] ?>">
            </div>
            <div class="form-group">
                <label for="iddegree">Degre</label>
                <select id="iddegree" name="degree">
                    <option value="A" <?php if($task_data['degree']=="A")echo "selected"; ?>>Faible</option>
                    <option value="B" <?php if($task_data['degree']=="B")echo "selected"; ?>>Simple</option>
                    <option value="C" <?php if($task_data['degree']=="C")echo "selected"; ?>>Normal</option>
                    <option value="D" <?php if($task_data['degree']=="D")echo "selected"; ?>>Important</option>
                </select>
            </div>
            <div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Envoyer</button>
            <a href="index.php" class="btn btn-primary">Annuler</a>
            <a href="log.php?action=delete_task" class="btn btn-danger">Supprimer</a>
        </form>
        </div>  
    </div>
</div>
