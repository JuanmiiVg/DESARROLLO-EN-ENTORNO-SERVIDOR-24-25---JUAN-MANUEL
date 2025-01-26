<?php
require_once '../../models/Post.php';
require_once '../../models/Comment.php';
require_once '../../models/Image.php';

$postId = $_GET['id'] ?? null;

if ($postId) {
    $post = Post::find($postId);
    $comments = Comment::getByPostId($postId);
    $images = Image::getByPostId($postId);
} else {
    // Handle case where post ID is not provided
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <title>Detalle del Post</title>
</head>
<body>
    <?php include '../templates/header.php'; ?>
    
    <div class="container">
        <h1><?php echo htmlspecialchars($post->title); ?></h1>
        <img src="<?php echo htmlspecialchars($post->image); ?>" alt="Imagen del post" class="img-fluid">
        <p><?php echo nl2br(htmlspecialchars($post->content)); ?></p>

        <h2>Comentarios</h2>
        <ul>
            <?php foreach ($comments as $comment): ?>
                <li><?php echo htmlspecialchars($comment->content); ?> - <em><?php echo htmlspecialchars($comment->author); ?></em></li>
            <?php endforeach; ?>
        </ul>

        <h2>Imágenes Relacionadas</h2>
        <div class="row">
            <?php foreach ($images as $image): ?>
                <div class="col-md-4">
                    <img src="<?php echo htmlspecialchars($image->url); ?>" alt="Imagen relacionada" class="img-thumbnail">
                </div>
            <?php endforeach; ?>
        </div>

        <a href="index.php" class="btn btn-primary">Volver a la lista</a>
    </div>

    <script src="../../public/js/scripts.js"></script>
</body>
</html>