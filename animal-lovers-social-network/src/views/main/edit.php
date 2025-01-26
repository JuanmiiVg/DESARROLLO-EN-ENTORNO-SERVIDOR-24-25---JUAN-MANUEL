<?php
require_once '../../models/Post.php';

$postId = $_GET['id'] ?? null;
$post = null;

if ($postId) {
    $postModel = new Post();
    $post = $postModel->find($postId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    $postModel = new Post();
    $postModel->update($postId, $title, $content);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Edit Post</title>
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h2>Edit Post</h2>
        <form action="edit.php?id=<?php echo $postId; ?>" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($post->title); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required><?php echo htmlspecialchars($post->content); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
</body>
</html>