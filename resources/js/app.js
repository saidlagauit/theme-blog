require("./bootstrap");

import "bootstrap/dist/js/bootstrap.bundle.min.js";

document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("meta_description");
    const charCount = document.getElementById("char-count");
    const maxChars = 160;

    textarea.addEventListener("input", function () {
        const currentChars = textarea.value.length;
        charCount.textContent = currentChars;

        // Check if character count exceeds the limit
        if (currentChars > maxChars) {
            charCount.classList.add("text-danger");
            textarea.classList.add("border-danger");

            // Trim the text to the maximum allowed characters
            textarea.value = textarea.value.slice(0, maxChars);
        } else {
            charCount.classList.remove("text-danger");
            textarea.classList.remove("border-danger");
        }
    });

    setTimeout(function () {
        document.getElementById("msg-alert")?.remove();
    }, 2000);

    var simplemde = new SimpleMDE({
        element: document.getElementById("content"),
    });
});
