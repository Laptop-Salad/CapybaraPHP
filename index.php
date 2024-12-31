<?php
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
?>

<button id="newNoteButton">
    New Note
</button>

<?php if($current_note_text): ?>
<button id="clearNoteButton">
    Clear Note
</button>

<form action="index.php" method="POST">
    <textarea name="note" id="note" cols="30" rows="10"><?php echo ($current_note_text); ?></textarea>

    <button type="submit">
        Save Note
    </button>
</form>

<script>
    function clearNote() {
        xhttp = new XMLHttpRequest();

        xhttp.onload = function() {
            window.location.reload();
        }

        xhttp.open("POST", window.location.href, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("clear=1");
    }

    document.getElementById("clearNoteButton").addEventListener("click", clearNote);
</script>
<?php else: ?>
Create a new note by clicking on "New Note"
<?php endif; ?>

<script>
    function newNote() {
        xhttp = new XMLHttpRequest();

        xhttp.onload = function() {
            window.location.reload();
        }

        xhttp.open("POST", window.location.href, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("new=1");
    }

    document.getElementById("newNoteButton").addEventListener("click", newNote);
</script>

