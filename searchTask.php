<?php

//Datoteka za pretraživanje naslova i opisa iz baze
if(isset($_POST['input'])){
    require 'connection.php';

    $inputSearch = $_POST['input'];
    
    if(empty($inputSearch)){
        $toDo_item = $conn->query("SELECT * FROM todo ORDER BY id DESC"); 
        while($todo = $toDo_item->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="item-todo">
                <small> <?php echo $todo['date'] ?></small>  
                <span id="<?php echo $todo['id']; ?>" class="remove_item"><img src="icon/delete.png" arc="Delete"/></span>
                <div id="<?php echo $todo['id']; ?>" class="update_item"><a href="update.php?myid=<?php echo $todo['id']; ?>"><img src="icon/pen.png" arc="Pen"/></a></div>
    
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

                <?php if($todo['favoriteCheck']) { ?>
                    <input type="checkbox" class="primaryTask" idData = "<?php echo $todo['id']; ?>" checked/>
                <?php }else { ?>
                    <input type="checkbox" class="primaryTask" idData = "<?php echo $todo['id']; ?>" />
                <?php } ?>

                <br> 
            </div>

        <?php } 
    }
    else{
        $stmt = $conn->query("SELECT * FROM todo WHERE title LIKE '%{$inputSearch}%' OR descriptionTask LIKE '%{$inputSearch}%' ");
            while($search = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="item-todo">
                    <small> <?php echo $search['date'] ?></small>  
                    <span id="<?php echo $search['id']; ?>" class="remove_item"><img src="icon/delete.png" arc="Delete"/></span>
                    <div id="<?php echo $search['id']; ?>" class="update_item"><a href="update.php?myid=<?php echo $search['id']; ?>"><img src="icon/pen.png" arc="Pen"/></a></div>
        
                    <?php if($search['checked']) { ?>
                        <input type="checkbox" class="check_box" dataId = "<?php echo $search['id']; ?>" checked />
                        <h2 class="checked"><?php echo $search['title'] ?></h2>
                        <h3 class="description task" id="desc"><?php echo $search['descriptionTask'] ?></h3>
                        <a href="javascript:;" class="readMore">Read More</a>

                    <?php }else { ?>
                        <input type="checkbox" class="check_box" dataId = "<?php echo $search['id']; ?>">
                        <h2><?php echo $search['title'] ?></h2>
                        <h3 class="description task" id="desc"><?php echo $search['descriptionTask'] ?></h3>
                        <a href="javascript:;" class="readMore">Read More</a>
                    <?php } ?>

                    <?php if($search['favoriteCheck']) { ?>
                        <input type="checkbox" class="primaryTask" idData = "<?php echo $search['id']; ?>" checked/>
                    <?php }else { ?>
                        <input type="checkbox" class="primaryTask" idData = "<?php echo $search['id']; ?>" />
                    <?php } ?>

                    <br> 
                </div>

            <?php } 
     
        }
    }

else{
    header("Location: index.php?return=error");
}

?>

<script src="js/script.js" defer></script>