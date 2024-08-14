<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $file = "posts.txt";
    $post = "\n---\n$title\n$content\n";
    file_put_contents($file, $post, FILE_APPEND | LOCK_EX);

    header("Location: homePage.php");
    exit();
}
?>
