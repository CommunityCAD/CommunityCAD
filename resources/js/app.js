import "./bootstrap";

import Editor from "@toast-ui/editor";
// import 'codemirror/lib/codemirror.css';
import "@toast-ui/editor/dist/toastui-editor.css";

const editor = new Editor({
    el: document.querySelector("#editor"),
    height: "400px",
    initialEditType: "markdown",
    placeholder: "",
    initialValue: document.querySelector("#mdcontent").value,
    toolbarItems: [
        ["heading", "bold", "italic", "strike"],
        ["hr", "quote"],
        ["ul", "ol"],
    ],
});

document.querySelector("#mdeditor").addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector("#mdcontent").value = editor.getMarkdown();
    e.target.submit();
});
