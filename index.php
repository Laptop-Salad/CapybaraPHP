<?php
    require "CapyView/Compiler.php";

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['new'])) {
            $_SESSION['current_note_text'] = "Start typing";
        } else if (isset($_POST['clear'])) {
            $_SESSION['current_note_text'] = null;
        } else {
            $_SESSION['current_note_text'] = $_POST['note'];
        }
    }

    $current_note_text = $_SESSION['current_note_text'] ?? null;

    $compiler = new \CapyView\Compiler('note/static/views/index.capyview.php');

    echo $compiler->compile();
?>

