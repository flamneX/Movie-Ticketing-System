// Log Out From Current User
function logout() {
    localStorage.removeItem("loggedUserID");
    window.location.href = "../userAuthentication/";
}

// Return To Main Page
function back() {
    window.location.href = "../profile";
}

// Fetch User
function fetchUser() {
    let userID = localStorage.getItem("loggedUserID");
    fetch('dbFunction.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            type: "fetchByID",
            userID: userID,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data !== null) {
            document.getElementById('userID').value = userID;
            document.getElementById('userName').value = data.userName ?? "undefined";
            document.getElementById("userEmail").value = data.userEmail ?? "undefined";
            document.getElementById("userPhoneNo").value = data.userPhoneNo ?? "undefined";
        }
        else {
            document.getElementById("errorText").innerHTML = "ERROR: NO ACCOUNTS FOUND!";
        }
    })
    .catch(error => {
        console.log(error);
    });
}

// Update User Info
function setUpdateForm() {
    document.getElementById('updateForm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Prevent default form submission

        // Send Data in Form
        const form = event.target;
        const formData = new FormData(form);

        fetch('dbFunction.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            window.location.href = "../profile/"
            window.alert("Account Updated Successfully");
        })
        .catch(error => {
            document.getElementById("errorText").textContent = "ERROR: USER NAME ALREADY EXISTS!";
            console.log(error);
        });
    });
}

// Update User Password
function setPasswordForm() {
    document.getElementById('userID').value = localStorage.getItem("loggedUserID");
    document.getElementById('passwordForm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Prevent default form submission

        // Send Data in Form
        const form = event.target;
        const formData = new FormData(form);

        fetch('dbFunction.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data !== null) {
                document.getElementById("errorText").textContent = 'ERROR: ' + data;
            }
            else {
                window.location.href = "../profile/"
                window.alert("Password Updated Successfully");
            }
        })
        .catch(error => {
            console.log(error);
        });
    });
}