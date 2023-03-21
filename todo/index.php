<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 class="top-heading">TODO List Application</h1>
    <div class="container">
        <form action="handleAction.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox" placeholder="Enter a Text">
                <button type="submit" name="add" id="add" >ADD</button>
            </div>

            <ul class="list">
                <?php
                    $itemList = get_items();

                    while($row = $itemList->fetch_assoc()){

                ?>
                <li class="item">
                    <p><?php echo $row["item"]; ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-circle-check fas"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-trash fas"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <hr>
            <ul class="list">
                <?php
                    $itemList = get_items_checked();

                    while($row = $itemList->fetch_assoc()){

                ?>
                <li class="item fade">
                    <p class="deleted-text"><span><?php echo $row["item"]; ?></span></p>
                    <div class="icon-container">
                        <button type="submit" name="" id="check"><i class="fa-solid fa-circle-check fas hidden"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-trash fas"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/5d2d3d9d78.js" crossorigin="anonymous"></script>
</body>
</html>