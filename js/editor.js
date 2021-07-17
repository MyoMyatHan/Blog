function checkTitle ( event ) {
    var title = document.querySelector("input[name='title']");
    var warning = document.querySelector("form #title-warning");

    if (title.value === "") {
        event.preventDefault();
        warning.innerHTML = "*You must write a title for the entry";
    }
}

function updateEditorMessage() {
    var p = document.querySelector("#editor-message");
    p.innerHTML = "Changes not saved ! ";
    // console.log( " editor changes not save yet !");
}

function init(){
    var editorForm = document.querySelector("form#editor");
    var title = document.querySelector("input[name='title']");
    title.required = false ;

    var textarea = document.querySelector("form textarea");
    textarea.addEventListener("keyup", updateEditorMessage, false);

    title.addEventListener("keyup", updateEditorMessage, false);
    editorForm.addEventListener("submit", checkTitle, false);
}


document.addEventListener("DOMContentLoaded", init, false );