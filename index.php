<?php

require 'connection.php';

?>

<!DOCTYPE HTML>

<html>
	<head>

		<title>To-do list</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/jquery-3.6.3.min.js"></script>
        <script src="js/main.js" defer></script>
        <script src="js/script.js" defer></script>
        
	</head>

	<body>
        <div class="main">

            <div class="header">
                <header>
                    <div class="mainHeader">
                        <h1 class="title">To-do list</h1>
                    </div>
                </header>
            </div>

            <div class="datetime">
                <div class="time"></div>
                <div class="date"></div>
            </div>

            <!-- Forma za unos naslova i opisa --> 
            <div class="add-task">
                <form action="addItem.php" method="POST">

                    <!-- Provjera da li je unesen tekst za naslov i opis-->
                    <?php if(isset($_GET['return']) && $_GET['return'] == 'error') { ?>
                        <input type="text" name="title" style="border-color: #ff6666" placeholder="Add title" id="title" />
                        <input type="text" name="description" style="border-color: #ff6666" placeholder="Add description of task" id="description"/>
                        <button type="submit"  value="Save" class="updateBurtton">Save</button>
                     
                        
                    <?php }else{ ?>
                        <input type="text" name="title" placeholder="Add title" id="title" />
                        <input type="text" name="description" placeholder="Add description of task" id="description" />
                        <button type="submit"  value="Save" class="updateBurtton">Save</button>
                        
                    <?php } ?>
                </form>
            </div>

            <br><br>
            
            <!-- Iz baze se izvlači id, naslov, opis, datum unosa od zadnjeg unijetog podatka --> 
            <?php $toDo_item = $conn->query("SELECT * FROM todo ORDER BY id DESC"); ?>

            <div class="todo-section" class="col">

                <div class="selectedTask-group" role="group">
                     <button class="btn selectedTask" type="button">All</button>
                    <button class="btn selectedTask" type="button">Marked</button> 
                    <input type="text" class="search" id="search" autocomplete="off" placeholder="Search"><br>
                </div>

                <!-- Ispis podataka iz baze-->
                <div class="wrap">
                    <?php while($todo = $toDo_item->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="item-todo">
                            <small> <?php echo $todo['date'] ?></small>  
                            <span id="<?php echo $todo['id']; ?>" class="remove_item"><img src="icon/delete.png" arc="Delete"/></span>
                            <div id="<?php echo $todo['id']; ?>" class="update_item"><a href="update.php?myid=<?php echo $todo['id']; ?>"><img src="icon/pen.png" arc="Pen"/></a></div>
                          
                            <!-- Provjera da li je checkbox označen -->
                            <?php if($todo['checked']) { ?>
                                <input type="checkbox" class="check_box" dataId = "<?php echo $todo['id']; ?>" checked />
                                <h2 class="checked"><?php echo $todo['title'] ?></h2>
                                <h3 class="description task" id="desc"><?php echo $todo['descriptionTask'] ?></h3>
                                <a href="javascript:;" class="readMore">Read More</a>

                            <?php }else { ?>
                                <input type="checkbox" class="check_box" dataId = "<?php echo $todo['id']; ?>">
                                <h2><?php echo $todo['title'] ?></h2>
                                <h3 class="description task" id="desc"><?php echo $todo['descriptionTask'] ?></h3>
                                <a href="javascript:;" class="readMore">Read More</a>
                            <?php } ?>

                            <!-- Provjera da li je kockica za prioritet označena -->
                            <?php if($todo['favoriteCheck']) { ?>
                                <input type="checkbox" class="primaryTask" idData = "<?php echo $todo['id']; ?>" checked/>
                            <?php }else { ?>
                                <input type="checkbox" class="primaryTask" idData = "<?php echo $todo['id']; ?>" />
                            <?php } ?>

                            <br> 
                        </div>
            
                    <?php } ?>
                   
                </div>
        </div>
        </div>       
	</body>
</html>