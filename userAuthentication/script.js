const container = document.getElementById('loginContainer');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.getElementById('signinForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent default form submission

    const form = event.target;
    const formData = new FormData(form);

    fetch('dbFunction.php', {
            method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data !== null) {
            localStorage.setItem('loggedUserID', data);
            window.location.href = '../';
        }
        else {
            document.getElementById("signinErrorText").textContent = "INVALID USER NAME/PASSWORD";
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

document.getElementById('signupForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent default form submission

    const form = event.target;
    const formData = new FormData(form);

    fetch('dbFunction.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        localStorage.setItem('loggedUserID', data);
        window.location.href = '../';
        window.alert("Account Registered Succeddfully");
    })
    .catch(error => {
        document.getElementById("signupErrorText").textContent = "USER NAME ALREADY EXISTS";
    });
});