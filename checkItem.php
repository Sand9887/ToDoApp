<?php
// Provjera da li je checkbox označen
if(isset($_POST['id'])){

    require 'connection.php';

    $id = $_POST['id'];
   
    if(empty($id)){
        echo 'error';
    }

    else{

        $checkItem = $conn->prepare("SELECT id,checked FROM todo WHERE id=?");
        $checkItem->execute([$id]);

        $check = $checkItem->fetch();
        $idItem = $check['id'];
        $checked = $check['checked'];

        $checkedItem = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todo SET checked= $checkedItem WHERE id=$idItem");

        if($res){
            echo $checked;

        }
        else{
           echo 'error';
        }

        $conn = null;
        exit();
    }
}

else{
    header("Location: index.php?return=error");
}

if(isset($_POST['idCheck'])){

    require 'connection.php';
    $idCheck = $_POST['idCheck'];
  
    if(empty($idCheck)){
        echo 'error';
    }

    else{
        $checkFavorite = $conn->prepare("SELECT id,favoriteCheck FROM todo WHERE id=?");
        $checkFavorite->execute([$idCheck]);

        $check = $checkFavorite->fetch();
        $idFavorite = $check['id'];
        $checked = $check['favoriteCheck'];

        $checkedFavorite = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todo SET favoriteCheck= $checkedFavorite WHERE id=$idFavorite");

        if($res){
            echo $checkedFavorite;

        }
        else{
           echo 'error';
        }

        $conn = null;
        exit();
    }
}

else{
    header("Location: index.php?return=error");
}

?>