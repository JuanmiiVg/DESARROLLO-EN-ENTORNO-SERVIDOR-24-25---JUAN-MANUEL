<?php
require_once '../../lib/Database.php';
require_once '../../lib/Validator.php';
require_once '../../models/Post.php';

$db = new Database();
$validator = new Validator();
$postModel = new Post($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $animal_id = $_POST['animal_id'] ?? '';

    $errors = [];

    if (!$validator->validateTitle($title)) {
        $errors[] = 'Title is required and must be at least 3 characters.';
    }

    if (!$validator->validateContent($content)) {
        $errors[] = 'Content is required and must be at least 10 characters.';
    }

    if (empty($errors)) {
        $postModel->createPost($title, $content, $animal_id);
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Create Post</title>
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h2>Create New Post</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="animal_id">Animal ID</label>
                <input type="number" name="animal_id" id="animal_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
    <script src="../../public/js/scripts.js"></script>
</body>
</html>