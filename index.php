<?php
$db = new mysqli('localhost','root', '123456789','test');
if(!$db){
    die('cannot connect to database!');
}
if (isset($_GET['action']) && $_GET['action']== 'delete' && isset($_GET['id'])){
    $sql = 'DELETE FROM todo where id =?';
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i',$_GET['id']);
    $stmt->execute();
}



    if (isset($_GET['action']) && $_GET['action']== 'done'){
        $completed = 1;

        $sql = 'UPDATE todo SET completed=? where id = ?';
        $stmt = $db->prepare($sql);
        $stmt->bind_param('ii',$completed ,$_GET['id']);
         $stmt->execute();

     }


if ($_POST) {

    $sql = 'INSERT INTO todo (task) values (?)';

    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_POST['task']);

    $stmt->execute();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>TodoApp</title>
</head>

<body>

<div class="container">
    <div>
        <header>
            <h1>My To-do's List</h1>
        </header>


            <form method="post" action="index.php">
            <div class="title d-flex">
                <input type="text" name="task" id="input" class="form-control" placeholder="New Task...">
                <button type="submit" id="add" class="btn btn-primary">Add to List</button>
            </div>
            </form>
        <main id="myUL">
            <?php
            $sql = 'SELECT * FROM todo order by id ASC  ';
            $result = $db->query($sql);
            while (($row = $result->fetch_assoc()) != false):

            ?>
            <div class="LHTML position">
                <?php if  ($row['completed'] == 1):?>

                <h3 id="content" style="color: green"><?= $row['task']; ?></h3>
                <div class="status absolute">

                    <!-- <span class="done" name="done"><a style="color:green" href="index.php?action=done&id=--><?//=$row['id']?><!--"> Mark as Done</span> |-->
                    <span class="delete"><a style="color:red" href="index.php?action=delete&id=<?=$row['id']?>"> Delete</a></span>

                </div>

                    <hr>
                  <?php else:?>


                <h3 id="content"><?= $row['task']; ?></h3>
                <div class="status absolute">
                        <span class="done" name="done"><a style="color:green" href="index.php?action=done&id=<?=$row['id']?>"> Mark as Done</span> |
                        <span class="delete"><a style="color:red" href="index.php?action=delete&id=<?=$row['id']?>"> Delete</a></span>
                </div>

                <hr>

                <?php endif;?>
            </div>

            <?php endwhile ?>


<!--
            <div class="LCSS position">
                <h3 id="content">Learn CSS</h3>

                <div class="status absolute">
                    <span class="done"> Mark as Done</span> |
                    <span class="delete"> Delete</span>
                </div>
                <hr>
            </div>

            <div class="ml-3 mt-4 font-size-16 LJAVA position">
                <h3 id="content">Learn JavaScript </h3>
                <div class="status absolute">
                    <span class="done"> Mark as Done</span> |
                    <span class="delete"> Delete</span>
                </div>
                <hr>
            </div>

            <div class="ml-3 mt-4 font-size-16 LPHP position">
                <h3 id="content">Learn PHP</h3>
                <div class="status absolute">
                    <span class="done"> Mark as Done</span> |
                    <span class="delete"> Delete</span>
                </div>
                <hr>

            </div>
-->
        </main>
    </div>
</div>

<!--<script src="javascript.js"></script> -->


</body>

</html>
