<?php
//Datoteka za ažuriranje naslova i opisa
require 'connection.php';

$idUpdate = $_GET['myid'];
$toDo_item = $conn->query("SELECT * FROM todo WHERE ID = $idUpdate"); ?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>To-do list</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/main.js" defer></script>
        <script src="js/script.js" defer></script>
	
	</head>

	<body>
        <div class="main">

            <div class="header">
                <header>
                    <div class="mainHeader">
                        <h1 class="updateList">Update list</h1>
                    </div>
                </header>
            </div>

            <div class="datetime">
                <div class="time"></div>
                <div class="date"></div>
            </div>

            <div class="add-task">

                <?php while($todo = $toDo_item->fetch(PDO::FETCH_ASSOC)) { ?>
                
                    <form action="updateItem.php" method="POST">
                        <?php if(isset($_GET['return']) && $_GET['return'] == 'error') { ?>
                            <label for="title" class="updateTitle">Title</label><br>
                            <input type="text" name="title" value="<?php echo $todo['title']; ?>"  /> <br>

                            <label for="description" class="updateDescription">Description</label><br>
                            <input type="text" name="description" id="description" value="<?php echo $todo['descriptionTask']; ?>" />

                            <input type="submit" value="Save" id="<?php echo $idUpdate; ?>" name="id" class="updateBurtton">
                            <input type="hidden" value="<?php echo $idUpdate; ?>" name="id"/> 
                        
                        <?php }else{ ?>
                            <label for="title" class="updateTitle">Title</label><br>
                            <input type="text" name="title" value="<?php echo $todo['title']; ?>"  /><br>

                            <label for="description" class="updateDescription">Description</label><br>
                            <input type="text" name="description" id="description" value="<?php echo $todo['descriptionTask']; ?>" />

                            <input type="submit" value="Save" id="<?php echo $idUpdate; ?>" name="id" class="updateBurtton">
                            <input type="hidden" value="<?php echo $idUpdate; ?>" name="id"/>
                        
                        <?php } ?>

                    </form>

                <?php } ?>
                
            </div>
	</body>
</html>