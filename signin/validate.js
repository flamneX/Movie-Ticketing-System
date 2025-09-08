document.getElementById('signinForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent default form submission

    const form = event.target;
    const formData = new FormData(form);

    // Action 1: Send data via AJAX
    fetch('userValidation.php', {
        'method': 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data !== null) {
            localStorage.setItem('loggedUserID', data);
            window.location.href = '../';
        }
        else {
            document.getElementById("userNameError").textContent = "INVALID USER NAME";
            document.getElementById("passwordError").textContent = "INVALID PASSWORD";
        }
    })
    .catch(error => {
        console.error('Error during action 1:', error);
    });
});