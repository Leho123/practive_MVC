<?php
require_once dirname(dirname(__DIR__)) . '/database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['title']) and !empty($_POST['description'])) {
        $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
        $statement->execute([
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':id' => $_POST['id']

        ]);

        header('location: /start-code/post');
    }
}
?>
<?php


require dirname(__DIR__) . "/partials/head.php";
require_once
    dirname(dirname(__DIR__)) . "/functions.php";
require dirname(__DIR__) . "/partials/nav.php";

$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) :

    $statement = $connection->prepare('select * from posts where id = :id');
    $statement->execute([':id' => $id]);
    $post = $statement->fetch();

?>
    <div class="card mt-5">
        <div class="card-body">
            <form action="/start-code/post/edit?id=<?= $post['id'] ?>" method="post">
                <input type="hidden" value="<?= $post['id'] ?>" name="id">
                <div class="form-group">
                    <input type="text" placeholder="title" class="form-control" name="title" value="<?= $post['title'] ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Description" name="description"><?= $post['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary">Add Post</button>
                </div>
            </form>
        </div>
    </div>s

<?php

endif;
require dirname(__DIR__) . "/partials/footer.php" ?>