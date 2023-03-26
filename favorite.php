<?php
// Postavljanje prioriteta
// Ako je desni checkbox označen postaje prioritet
require 'connection.php';
$pageNumber = 5;
$page = '';

if(isset($_POST['buttonValue'])){
    $markedTask = $_POST['buttonValue'];
}

if(empty($markedTask)){
    header("Location: index.php?return=error");
}
else{
  
    if($markedTask == 'All'){
        $toDo_item = $conn->query("SELECT * FROM todo ORDER BY id DESC"); 
            while($todo = $toDo_item->fetch(PDO::FETCH_ASSOC)) {  ?>
                <div class="item-todo">

                    <small> <?php echo $todo['date'] ?></small>  
                    <span id="<?php echo $todo['id']; ?>" class="remove_item"><img src="icon/delete.png" arc="Delete"/></span>
                    <div id="<?php echo $todo['id']; ?>" class="update_item"><a href="update.php?myid=<?php echo $todo['id']; ?>"><img src="icon/pen.png" arc="Pen"/></a></div>
                    
                    <?php if($todo['checked']) { ?>
                        <input type="checkbox" class="check_box" dataId = "<?php echo $todo['id']; ?>" checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                        <h3 class="description task" id="desc"><?php echo $todo['descriptionTask'] ?></h3>
                        <a href="javascript:;" class="readMore">Read More</a>
                        

                    <?php } else { ?>
                        <input type="checkbox" class="check_box" dataId = "<?php echo $todo['id']; ?>">
                        <h2><?php echo $todo['title'] ?></h2>
                        <h3 class="description task" id="desc"><?php echo $todo['descriptionTask'] ?></h3>
                        <a href="javascript:;" class="readMore">Read More</a>
                    
                    <?php } ?>

                    <?php if($todo['favoriteCheck']) { ?>
                        <input type="checkbox" class="primaryTask" idData = "<?php echo $todo['id']; ?>" checked/>

                    <?php }else { ?>
                        <input type="checkbox" class="primaryTask" idData = "<?php echo $todo['id']; ?>" />

                    <?php } ?>

                    <br>  
                        
                </div>
            <?php } ?>
            
           
        <?php }
        else if($markedTask == 'Marked') { 
            $toDoItem = $conn->query("SELECT * FROM todo WHERE favoriteCheck = 1 ORDER BY id DESC"); 
            while($todoFavorite = $toDoItem->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="item-todo">
                    <small> <?php echo $todoFavorite['date'] ?></small>  
                    <span id="<?php echo $todoFavorite['id']; ?>" class="remove_item"><img src="icon/delete.png" arc="Delete"/></span>
                    <div id="<?php echo $todoFavorite['id']; ?>" class="update_item"><a href="update.php?myid=<?php echo $todoFavorite['id']; ?>"><img src="icon/pen.png" arc="Pen"/></a></div>
                    
                    <?php if($todoFavorite['checked']) { ?>
                        <input type="checkbox" class="check_box" dataId = "<?php echo $todoFavorite['id']; ?>" checked />
                        <h2 class="checked"><?php echo $todoFavorite['title'] ?></h2>
                        <h3 class="description task" id="desc"><?php echo $todoFavorite['descriptionTask'] ?></h3>
                        <a href="javascript:;" class="readMore">Read More</a>
                    
                    <?php }else { ?>
                        <input type="checkbox" class="check_box" dataId = "<?php echo $todoFavorite['id']; ?>">
                        <h2><?php echo $todoFavorite['title'] ?></h2>
                        <h3 class="description task" id="desc"><?php echo $todoFavorite['descriptionTask'] ?></h3>
                        <a href="javascript:;" class="readMore">Read More</a>

                    <?php } ?>
        
                    <?php if($todoFavorite['favoriteCheck']) { ?>
                        <input type="checkbox" class="primaryTask" idData = "<?php echo $todoFavorite['id']; ?>" checked/>
                    <?php }else { ?>
                        <input type="checkbox" class="primaryTask" idData = "<?php echo $todoFavorite['id']; ?>" />
                    <?php } ?>

                    <br>   
                </div>
            <?php } ?>
        
    <?php } }?>

    <script src="js/script.js" defer></script>