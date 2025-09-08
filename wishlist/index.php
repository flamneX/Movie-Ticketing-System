<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema</title>
    <link rel="stylesheet" href="../styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="headContainer">
        <?php
            include("../include/header.php");
            include("../include/navigation.php");
        ?>
    </div>

    <main>
        <h1>Your Wishlist/Cart</h1>
        <div id="wishlistContainer">
          
        </div>
        <div style="text-align: center;">
            <button id="checkoutBtn">Proceed to Checkout</button>
        </div>
    </main>

    <?php
        include("../include/footer.php");
    ?>

    <script src="script.js"></script>
    <script>
        window.onload = () => {
            loadWishlist(); // Load wishlist items when the page is loaded
        }

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
                                <button onclick="removeFromWishlist(${movie.id})">Remove</button>
                            </div>
                        `;
                        container.appendChild(movieElement);
                    });
                });
        }

        function removeFromWishlist(movieID) {
            // Make a PHP call to remove the movie from the wishlist
            fetch(`removeFromWishlist.php?id=${movieID}`, {
                method: 'GET'
            }).then(response => response.text())
              .then(data => {
                  alert(data);
                  loadWishlist(); // Reload wishlist after removing an item
              });
        }
    </script>
</body>
</html>
