<?php
//Datoteka za dodavanje naslova i opisa u bazu
if(isset($_POST['title']) && isset($_POST['description'])){

    require 'connection.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    if(empty($title) || empty($description)){
        header("Location: index.php?return=error");
    }
    
    else{
        $stmt = $conn->prepare("INSERT INTO todo(title,descriptionTask) VALUE (?,?)");
        $stmt->execute([$title, $description]);

        if($res){
            header("Location: index.php?return=succes");

        }
        else{
            header("Location: index.php");
        }

        $conn = null;
        exit();
    }
}

else{
    header("Location: index.php?return=error");
}
?>