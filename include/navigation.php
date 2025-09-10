<nav id="topNavigation">
    <ul>
        <li><a id="home" href="/Movie-Ticketing-System/"><button>Home</button></a></li>
        <li><a id="movies" href="/Movie-Ticketing-System/movie/"><button>Movies</button></a></li>
        <li><a id="myWishlist" href="/Movie-Ticketing-System/myWishlist/"><button>My Wishlist</button></a></li>
        <li><a id="myTicket" href="/Movie-Ticketing-System/myTicket/"><button>My Tickets</button></a></li>
        <li><a id="user" href="/Movie-Ticketing-System/userAuthentication/">
            <button style="background-image:linear-gradient(to bottom right, #A76BCE, #7F00FF);">SIGN IN</button></a>
        </li>
    </ul>
    <script>
        let loggedUser = localStorage.getItem("loggedUserID");
        let wishlistBtn = document.getElementById('myWishlist');
        let ticketBtn = document.getElementById('myTicket');

        if (loggedUser !== null) {
            const profileButton = document.getElementById("user");

            // Change SIGN IN to PROFILE
            profileButton.lastElementChild.textContent = "PROFILE";
            profileButton.href = "/Movie-Ticketing-System/profile/";
        }
        else {
            wishlistBtn.parentElement.removeChild(wishlistBtn);
            ticketBtn.parentElement.removeChild(ticketBtn);
        }
    </script>
   
</nav>