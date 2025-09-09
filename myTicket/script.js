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

    const response = await fetch(`getTickets.php?userID=${userID}`);
    const data = await response.json();

    if (data.length === 0) {
        tickets.textContent = "No tickets found.";
        return;
    }

    const movieDetails = await Promise.all(
        data.map(ticket => fetchMovieDetail(ticket.movieID))
    );

    tickets.innerHTML = data.map((ticket, i) => {
        const movie = movieDetails[i];
        return `
            <div class="foreground" style="margin-bottom:5%; border-radius:20px; border-left-width: 15px;">
                <div style="flex: 1">
                    <img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">
                </div>
                <div style="flex: 4;">
                    <h2>${movie.primaryTitle}</h2>
                    <h4>Transaction ID: ${ticket.transactionID}</h4>
                    <h4>Total Price: RM ${ticket.totalPrice}</h4>
                </div>
            </div>
        `;
    }).join('');
}