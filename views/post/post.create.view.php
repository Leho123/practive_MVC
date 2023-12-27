<?php
require_once dirname(dirname(__DIR__)) . '/database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['title']) && !empty($_POST['description'])) {

        $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
        $statement->execute([
            ':title' => $_POST['title'],
            ':description' =>  $_POST['description']
        ]);

        header('location: /start-code/post');
    }
}

require dirname(__DIR__) . "/partials/head.php";
require_once
    dirname(dirname(__DIR__)) . "/functions.php";
require dirname(__DIR__) . "/partials/nav.php" ?>

<div class="card mt-5">
    <div class="card-body">
        <form action="/start-code/post/create" method="post">
            <div class="form-group">
                <input type="text" placeholder="title" class="form-control" name="title">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description" name="description"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary">Add Post</button>
            </div>
        </form>
    </div>
</div>

<?php require dirname(__DIR__) . "/partials/footer.php" ?>