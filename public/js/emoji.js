// public/js/emoji.js

import 'https://unpkg.com/emoji-mart@5.5.2/dist/emoji-mart.css';
import { EmojiButton } from 'emoji-mart';
document.addEventListener('DOMContentLoaded', function () {
    const emojiButton = new EmojiButton();

    // Check if the elements exist before interacting with them
    const commentInput = document.getElementById('content');
    const emojiButtonElement = document.getElementById('emoji-button');
    const emojiPickerElement = document.getElementById('emoji-picker');

    if (commentInput && emojiButtonElement && emojiPickerElement) {
        emojiButton.on('emoji', selection => {
            commentInput.value += selection.emoji;
        });

        emojiButtonElement.addEventListener('click', () => {
            emojiButton.togglePicker(emojiPickerElement);
        });

        // Initialize the emoji picker
        emojiButton.picker(emojiPickerElement);
    } else {
        console.error('One or more elements not found in the DOM.');
    }
});
