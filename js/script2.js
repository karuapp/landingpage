// JavaScript to display bubble after 2 seconds
setTimeout(function() {
    document.getElementById('whatsapp-bubble').style.display = 'block';

    // Trigger typing animation after delay
    setTimeout(function() {
        document.getElementById('typing-animation').innerHTML = 'Necesitas ayuda? Contáctanos';
    }, 500); // Delay for typing animation to start after 500ms
}, 2000); // Display bubble after 2 seconds
