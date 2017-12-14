<?php
$q='';
$user_id='';
if(!empty($_GET['q']))$q = $_GET['q'];
if(!empty($_GET['id']))$user_id = $_GET['id'];

$l_user_id='';
if(!empty($_SESSION['q']))$q = $_SESSION['q'];
if(!empty($_SESSION['id_usr']))$user_id = $_SESSION['id_usr'];

if($q=='tasks'&&!empty($user_id)){
    try{
        //$result = $dbh->prepare('SELECT * FROM tbl_tasks WHERE id_user='.$user_id.' ');
        //$result->execute();
        $result1 = $dbh->prepare("SELECT t1.id_task,t1.id_user,t1.task,t1.created,t1.finish,t1.degree,count(t2.file) as `nr` FROM tbl_tasks as t1
left join tbl_work as t2
on t1.id_task = t2.id_task WHERE t1.id_user=:user group by t1.id_task");
        $result1->execute(
        array(':user' => $user_id)
        );
    }catch(Exception $e){
        echo "Erreur:".$e->getMessage()."<br />";
    }
}

if(!empty($user_id)&&!empty($q)){
?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Taches</th>
                        <th>Debut</th>
                        <th>Fin</th>
                        <th>Temps ecoule</th>
                        <th>Editer</th>
                    </tr>
                </thead>
                <tbody>
<?php
while($task_data=$result1->fetch()){
    $array = array(
        "A" => "success",
        "B" => "info",
        "C" => "warning",
        "D" => "danger",
    );
$cr = new DateTime($task_data['created']);
$fi = new DateTime($task_data['finish']);
$a = date_format($cr,'z');
$b = date_format($fi,'z');
$dRes = (((date('z')-$a)+2)*100)/(($b-$a)+1);
$type = "progress-bar-success";
if($dRes>10&&$dRes<=20)$type = "progress-bar-info";
elseif($dRes<=60)$type = "progress-bar-warning";
elseif($dRes>80)$type = "progress-bar-danger";
echo "
                    <tr class=\"".$array[$task_data['degree']]."\">
                        <td>".$task_data['task']."</td>
                        <td>".date_format($cr,'d M')."</td>
                        <td>".date_format($fi,'d M')."</td>
                        <td><div class=\"progress\" style=\"margin-bottom:0px;\">
<div class=\"progress-bar ".$type."\" role=\"progressbar\" aria-valuenow=\"".$dRes."\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ".$dRes."%;\">
</div>
</div>
                        </td>
                        <td>";
    if(isset($_SESSION['logged'])&&$_SESSION['logged']=='true'){ echo "<a href=\"index.php?page=edittask&id=".$user_id."&id_task=".$task_data['id_task']."\" class=\"btn btn-info btn-xs\">Editer</a>";
                                   }
        echo "
                        <a href=\"index.php?page=addwork&id=".$user_id."&id_task=".$task_data['id_task']."\" class=\"btn btn-info btn-xs\">Travail <span class=\"badge\">".$task_data['nr']."</span></a></td>
                    </tr>
        ";
}
$result1->closeCursor();
}
?>
                </tbody>
            </table>
