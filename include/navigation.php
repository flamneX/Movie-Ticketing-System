<nav id="topNavigation">
    <ul>
        <li><a id="home" href="/Movie-Ticketing-System/"><button>Home</button></a></li>
        <li><a id="movies" href="/Movie-Ticketing-System/movie/"><button>Movies</button></a></li>
        <li id="wishlistItem" style="visibility: hidden;">
            <a id="wishlist" href="/Movie-Ticketing-System/myWishlist/"><button>My Wishlist</button></a>
        </li>
        <li id="ticketsItem" style="visibility: hidden;">
            <a id="ticket" href="/Movie-Ticketing-System/myTicket/"><button>My Tickets</button></a>
        </li>
        <li><a id="profile" href="/Movie-Ticketing-System/signin/">
            <button style="background-image:linear-gradient(to bottom right, #A76BCE, #7F00FF);">SIGN IN</button>
        </a></li>
    </ul>
    <script>
        const loggedUser = localStorage.getItem("loggedUserID");

        if (loggedUser !== null) {
            const profileButton = document.getElementById("profile");

            // Change SIGN IN to PROFILE
            profileButton.lastElementChild.textContent = "PROFILE";
            profileButton.href = "/Movie-Ticketing-System/profile/";

            // Show Wishlist and Tickets
            document.getElementById("wishlistItem").style.visibility = "visible";
            document.getElementById("ticketsItem").style.visibility = "visible";
        }
    </script>
</nav>