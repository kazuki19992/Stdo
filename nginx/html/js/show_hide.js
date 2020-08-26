window.onload = function show_hide() {
    document.getElementById("complete-task").onclick = function complete_task () {
        if (this.checked) {
            document.getElementById("edit-task").style.display = "none";
        } else {
            document.getElementById("edit-task").style.display = "block";
        }
    }

    document.getElementById("cancel-check").onclick = function canceled () {
        if (this.checked) {
            document.getElementById("substitute").style.display = "block";
        } else {
            document.getElementById("substitute").style.display = "none";
        }
    }
}