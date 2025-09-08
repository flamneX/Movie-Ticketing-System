function logout() {
    localStorage.removeItem("loggedUserID");
    window.location.href = "../";
}

    const userID = localStorage.getItem("loggedUserID");
    fetch('getUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            userID: userID,
        }),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('userImage').src = data.userImage ?? "";
        document.getElementById("userName").innerHTML = data.userName;
        document.getElementById("userEmail").innerHTML = data.userEmail;
        document.getElementById("userPhoneNo").innerHTML = data.userPhoneNo;
    })
    .catch(error => {
        console.error('Error during action 1:', error);
    });