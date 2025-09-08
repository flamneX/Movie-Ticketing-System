// Function to load wishlist items when the page loads
function loadWishlist() {
    fetch('wishlist.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('wishlistContainer');
            container.innerHTML = '';
            data.forEach(movie => {
                const movieElement = document.createElement('div');
                movieElement.classList.add('wishlist-item');
                movieElement.innerHTML = `
                    <div class="movie-info">
                        <h3>${movie.title}</h3>
                        <p>${movie.year}</p>
                        <p><strong>Price: </strong>${movie.price}</p>
                        <button onclick="removeFromWishlist(${movie.movieID})">Remove</button>
                    </div>
                `;
                container.appendChild(movieElement);
            });
        });
}

// Function to remove a movie from the wishlist
function removeFromWishlist(movieID) {
    fetch(`removeFromWishlist.php?id=${movieID}`, {
        method: 'GET'
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadWishlist(); // Reload wishlist after removing an item
      });
}
