// fetch movie detail json using IMDB ID
async function fetchMovieDetail(imdbId) {
    try {
        const url = `https://api.imdbapi.dev/titles/${imdbId}`;
        const response = await fetch(url);
        const data = await response.json();
        console.log(data);

        return data;
    } catch (error) {
        console.error("Error fetching movie:", error);
        return null;
    }
}

async function displayTransactions() {
    const tickets = document.getElementById("myTickets");
    const userID = localStorage.getItem("loggedUserID");

    const response = await fetch(`getTransactions.php?userID=${userID}`);
    const data = await response.json();

    if (data.length === 0) {
        tickets.innerHTML = "<h3>No tickets found.</h3>";
        return;
    }

    const movieDetails = await Promise.all(
        data.map(ticket => fetchMovieDetail(ticket.movieID))
    );

    tickets.innerHTML = data.map((transaction, i) => {
        const movie = movieDetails[i];
        return `
            <div class="foreground" style="margin-bottom:5%; border-radius:20px; border-left-width: 15px; display: flex;">
                <div>
                    <img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">
                </div>
                <div class="ticketDetail">
                    <h3>${movie.primaryTitle}</h3>
                    <h4>Transaction ID: ${transaction.transactionID}</h4>
                    <h4>Total Price: RM ${Number(transaction.totalPrice).toFixed(2)}</h4>
                    <a href="ticketInfo?movieID=${transaction.movieID}&transactionID=${transaction.transactionID}"><button class="viewTicket">View Details</button></a>
                </div>
            </div>
        `;
    }).join('');
}

async function displayTickets() {
    const container = document.getElementById("ticketInfo");
    const params = new URLSearchParams(window.location.search);
    const transactionID = params.get("transactionID");

    const response = await fetch(`getTickets.php?transactionID=${transactionID}`);
    const data = await response.json();

    const movie = await fetchMovieDetail(params.get("movieID"))

    ticketInfo.innerHTML = data.map(ticket => {
        return `
            <div class="foreground" style="margin-bottom:5%; border-radius:20px; border-left-width: 15px; display: flex;">
                <div style="flex: 1">
                    <img src="qr-code.png" alt="QR code" style="width: 90%; height: auto;">
                </div>
                <div style="flex: 4;">
                    <h3>${movie.primaryTitle}</h3>
                    <h4>Ticket ID: ${ticket.ticketID}</h4>
                </div>
            </div>
        `;
    }).join('');
}