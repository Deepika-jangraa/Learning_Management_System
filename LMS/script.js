document.addEventListener('DOMContentLoaded', () => {
    // Enroll button click handler
    const enrollButton = document.getElementById('enrollButton');
    if (enrollButton) {
        enrollButton.addEventListener('click', () => {
            alert('You have successfully enrolled in the course!');
        });
    }

    // Communication form submission
    const communicationForm = document.querySelector('.communication form');
    if (communicationForm) {
        communicationForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const recipient = communicationForm.recipient.value;
            const message = communicationForm.message.value;
            alert(`Message sent to ${recipient}: ${message}`);
        });
    }
});
