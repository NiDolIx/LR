<?php require 'database.php' ?>

<?php

$offset = htmlspecialchars($_GET["offset"]);

$query = "SELECT * FROM posts ORDER BY `date` LIMIT 2 OFFSET " . $offset;
$result = $conn->query($query);

?>


<?php foreach ($result as $row) : ?>
<div id = "ellips">
    <a href="detailed.php?id=<?=$row['id']?>">
        <h1><?=$row['title']?></h1>
        <p><?=$row['date']?></p>
    </a>
</div>
<?php
endforeach;
?>