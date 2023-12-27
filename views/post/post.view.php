<?php

$heading = "Post Page";

$statement = $connection->prepare("select * from posts");
$statement->execute();
$posts = $statement->fetchAll();

require   dirname(__DIR__) . "/partials/head.php";
require dirname(__DIR__) . "/partials/nav.php"
?>

<a href="/start-code/post/create" class="btn btn-primary mt-2">Add Post</a>
<main>
    <div class="p-3">
        <?php foreach ($posts as $post) : ?>
            <li>
                <?= $post['title'] ?> |
                <span><?= $post['description'] ?></span> |
                <a href="/start-code/post/detele?id=<?= $post['id'] ?>">Delete</a> |
                <a href="/start-code/post/edit?id=<?= $post['id'] ?>">Edit</a>
            </li>

        <?php endforeach; ?>
    </div>
</main>

<?php require dirname(__DIR__) .  "/partials/footer.php" ?>