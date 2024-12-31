<button id="newNoteButton">
    New Note
</button>

<?php if($dog): ?>
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