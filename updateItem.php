<?php
//Datotek za ažuriranje naslova i opisa
if(isset($_POST['title']) && isset($_POST['description'])){
    require 'connection.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    

    if(empty($title) || empty($description)){
        header("Location: index.php?return=error");
    }
    
    else{
        $sql = 'UPDATE todo SET title = :title, descriptionTask = :descriptionTask WHERE id = :id';
        $statement = $conn->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':descriptionTask', $description);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        

        if ($statement->execute()) {
            echo 'Updated successfully!';
        }

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