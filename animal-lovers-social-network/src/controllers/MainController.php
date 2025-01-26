<?php

class MainController {
    private $postModel;
    private $userModel;

    public function __construct($postModel, $userModel) {
        $this->postModel = $postModel;
        $this->userModel = $userModel;
    }

    public function index() {
        $posts = $this->postModel->getAllPosts();
        require_once '../views/main/index.php';
    }

    public function detail($postId) {
        $post = $this->postModel->getPostById($postId);
        $comments = $this->postModel->getCommentsByPostId($postId);
        require_once '../views/main/detail.php';
    }

    public function create() {
        require_once '../views/main/create.php';
    }

    public function store($data) {
        $this->postModel->createPost($data);
        header('Location: /index.php');
    }

    public function edit($postId) {
        $post = $this->postModel->getPostById($postId);
        require_once '../views/main/edit.php';
    }

    public function update($postId, $data) {
        $this->postModel->updatePost($postId, $data);
        header('Location: /index.php');
    }

    public function delete($postId) {
        $this->postModel->deletePost($postId);
        header('Location: /index.php');
    }

    public function ajaxRequest() {
        // Handle AJAX requests here
        // Example: return JSON data for posts
        $posts = $this->postModel->getAllPosts();
        echo json_encode($posts);
    }
}