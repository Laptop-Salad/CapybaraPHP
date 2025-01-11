<?php

namespace Controllers;

use Base\Controller;
use function CapyView\view;

require "CapyView/Compiler.php";

class IndexController extends Controller {
    public $current_note_text;

    public function mount() {
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

        $this->current_note_text = $_SESSION['current_note_text'] ?? null;
    }

    public function render() {
        return view('note/static/views/index.capyview.php', [
            'current_note_text' => $this->current_note_text
        ]);
    }
}


