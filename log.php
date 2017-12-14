<?php
include_once "connect.php";
$fname = "";
$lname = "";
$email = "";
$pass = "";
$action = "";
if(!empty($_POST["firstname"]))$fname = $_POST["firstname"];
if(!empty($_POST["lastname"]))$lname = $_POST["lastname"];
if(!empty($_POST["email"]))$email = $_POST["email"];
if(!empty($_POST["password"]))$pass = $_POST["password"];
if(!empty($_GET["action"]))$action = $_GET["action"];
switch($action){
	case 'edit':
		try{
			session_start();
			$usr_id = $_SESSION["usr_id"];
			$dbh->beginTransaction();
			$dbh->query("UPDATE tbl_users SET nom='".$fname."' ,prenom='".$lname."' ,email='".$email."' ,password='".$pass."' WHERE id='".$usr_id."' ");
			$dbh->commit();
            header("Location: index.php");
		}catch(Exception $e){
			$dbh->rollback();
			echo "Error:".$e->getMessage()."<br>";
			echo "No:".$e->getCode();
			exit();
		}
		break;
	case 'add':
		try{
			if(!empty($_POST["firstname"])&&!empty($_POST["lastname"])&&!empty($_POST["email"])){
				$dbh->beginTransaction();
				$dbh->query("INSERT INTO tbl_users SET nom='".$fname."' ,prenom='".$lname."',email='".$email."' ,password='".$pass."'");
				$dbh->commit();
                header("Location: index.php");
			}
		}catch(Exception $e){
			$dbh->rollback();
			echo "Error:".$e->getMessage()."<br />";
			echo "No:".$e->getCode();
			exit();
		}
		break;
	case 'delete':
		try{
			session_start();
			$usr_id = $_SESSION["usr_id"];
			$res = $dbh->prepare("DELETE FROM tbl_users WHERE id=:id_to_delete");
			$res->execute(array(':id_to_delete' => $usr_id));
            header("Location: index.php");
		}catch(Exception $e){
			$dbh->rollback();
			echo "Error:".$e->getMessage()."<br />";
			echo "No:".$e->getCode();
			exit();
		}
		break;
    case 'tasks':
        try{
            session_start();
            $user_id = $_SESSION["id_user"];
            $task = $_POST['task'];
            $start = $_POST['start'];
            $finish = $_POST['finish'];
            $degree = $_POST['degree'];
            $dbh->beginTransaction();
            $dbh->query("INSERT INTO tbl_tasks SET id_user='".$user_id."' ,task='".$task."' ,created='".$start."' ,finish='".$finish."' ,degree='".$degree."' ");
            $dbh->commit();
            header("Location: index.php?q=tasks&id=".$_SESSION['id_user']."");
        }catch(Exception $e){
            $dbh->rollback();
            echo "Erreur: ".$e->getMessage()."";
            exit();
        }
        break;
    case 'edit_task':
        try{
            session_start();
            $task_id = $_SESSION["id_task"];
            $res = $dbh->prepare("UPDATE tbl_tasks SET task=:task_update, created=:start_update, finish=:finish_update, degree=:degree_update WHERE id_task=:id_task_update");
            $res->execute(
            array(':task_update' => $_POST['task'], ':start_update' => $_POST['start'], ':finish_update' => $_POST['finish'], ':degree_update' => $_POST['degree'], ':id_task_update' => $task_id)
            );
            header("Location: index.php?q=tasks&id=".$_SESSION['id_user']."");
        }catch(Exception $e){
            $dbh->rollback();
            echo "Error:".$e->getMessage();
        }
        break;
    case 'delete_task':
        try{
            session_start();
            $task_id = $_SESSION["id_task"];
            $res = $dbh->prepare('DELETE FROM tbl_tasks WHERE id_task=:id_update');
            $res->execute(array(':id_update' => $task_id));
            //echo print_r($dbh->errorInfo());
            //echo print_r($res->errorInfo());
            header("Location: index.php?q=tasks&id=".$_SESSION['id_user']."");
        }catch(PDOException $e){
            $dbh->rollback();
            echo "Error:".$e->getMessage();
            exit();
        }
        break;
    case 'add_work':
        if(!empty($_FILES['file'])){
            $name = $_FILES['file']['name'];
            $type = $_FILES['file']['type'];
            session_start();
            $id_task = $_SESSION['id_task'];    

            $dir = "work/".$id_task."_".$name;
            //if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
                 try{
                    $res = $dbh->prepare('INSERT INTO tbl_work SET id_task=:task_id, file=:file_name, date=:date_in, type=:type_in');
                    $res->execute(array(
                        ':task_id' => $id_task,
                        ':file_name' => $id_task."_".$name,
                        ':date_in' => date("Y-m-d"),
                        ':type_in' => $type
                    ));
                    echo print_r($dbh->errorInfo());
                    echo print_r($res->errorInfo());
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }catch(PDOException $e){
                    echo "Error:".$e;
                }   
                //}else{
                  //  echo "Error file atack";
                //}
        }
        header("Location:".$_SERVER['HTTP_REFERER']);
        break;
    case 'deletework':
        if(!empty($_GET['id_work']))$id_work = $_GET['id_work'];
        try{
            $res = $dbh->prepare('SELECT * FROM tbl_work WHERE id_work=:work');
            $res->execute(array('work' => $id_work));
            $data = $res->fetch(PDO::FETCH_ASSOC);
            unlink("work/".$data['file']);
            
            $que = $dbh->prepare('DELETE FROM tbl_work WHERE id_work=:work');
            $que->execute(array(':work' => $id_work));
            
            header("Location:".$_SERVER['HTTP_REFERER']);
        }catch(PDOException $e){
            echo "Error:".$e->getMessage();
        }
        break;
    case 'logout':
        session_start();
        $_SESSION['logged'] = "false";
        $_SESSION['id'] = "";
        header("Location: index.php");
        break;
}
?>
