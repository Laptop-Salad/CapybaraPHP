{% if ($current_note_text) %}
    <form id="form" action="" method="POST">
        <textarea name="note" id="note" cols="30" rows="10"><?php echo ($current_note_text); ?></textarea>

        <button type="submit" style="display: block">
            Save Note
        </button>
    </form>

    <button id="clearNoteButton">
        Clear Note
    </button>

    <script>
        function clearNote() {
            xhttp = new XMLHttpRequest();

            xhttp.onload = function() { window.location.reload(); }

            xhttp.open("POST", window.location.href, true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("clear=1");
        }

        document.getElementById("clearNoteButton").addEventListener("click", clearNote);
    </script>
{% else %}
    <button id="newNoteButton">
        New Note
    </button>

    Create a new note by clicking on "New Note"

    <script>
        function newNote() {
            xhttp = new XMLHttpRequest();

            xhttp.onload = function() { window.location.reload(); }

            xhttp.open("POST", window.location.href, true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("new=1");
        }

        document.getElementById("newNoteButton").addEventListener("click", newNote);
    </script>
{% endif %}