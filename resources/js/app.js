require("./bootstrap");

import "bootstrap/dist/js/bootstrap.bundle.min.js";

document.addEventListener("DOMContentLoaded", function () {
    //
    const textarea = document.getElementById("meta_description");
    const charCount = document.getElementById("char-count");
    const maxChars = 160;

    textarea.addEventListener("input", function () {
        const currentChars = textarea.value.length;
        charCount.textContent = currentChars;
        if (currentChars > maxChars) {
            charCount.classList.add("text-danger");
            textarea.classList.add("border-danger");
            textarea.value = textarea.value.slice(0, maxChars);
        } else {
            charCount.classList.remove("text-danger");
            textarea.classList.remove("border-danger");
        }
    });

    //
    setTimeout(function () {
        document.getElementById("msg-alert")?.remove();
    }, 3000);

    //
    const textareaIds = ["content", "bio"];
    textareaIds.forEach(function (id) {
        new SimpleMDE({ element: document.getElementById(id) });
    });

});
