const container = document.getElementById('loginContainer');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Switch Toggle Panel
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Fetch Sign in
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
            sessionStorage.setItem('loggedUserID', data);
            window.location.href = '../';
        }
        else {
            document.getElementById("signinErrorText").textContent = "INVALID USERNAME/PASSWORD!";
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Fetch Sign up
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
        sessionStorage.setItem('loggedUserID', data);
        window.location.href = '../';
        window.alert("Account Registered Successfully");
    })
    .catch(error => {
        document.getElementById("signupErrorText").textContent = "USERNAME ALREADY EXISTS!";
    });
});