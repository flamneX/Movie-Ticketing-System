document.getElementById('signinForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent default form submission

    const form = event.target;
    const formData = new FormData(form);

    const params = new URLSearchParams(window.location.search);
    const movieId = params.get('movieID');

    // Action 1: Send data via AJAX
    fetch('userValidation.php', {
        'method': 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data !== null) {
            localStorage.setItem('loggedUserID', data);

            if(movieId) {
                window.location.href = `/movie-ticketing-system/purchase/?movieID=${encodeURIComponent(movieId)}`;
            } else {
                window.location.href = '../';
            }
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