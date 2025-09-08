<nav id="topNavigation">
    <ul>
        <li><a id="home" href="/Movie-Ticketing-System/"><button>Home</button></a></li>
        <li><a id="movies" href="/Movie-Ticketing-System/movie/"><button>Movies</button></a></li>
        <li><a id="wishlist" href="/Movie-Ticketing-System/wishlist/"><button>Wishlist</button></a></li>
        <li><a id="contact" href="/Movie-Ticketing-System/contact/"><button>Contact Us</button></a></li>
        <li><a id="profile" href="/Movie-Ticketing-System/signin/"><button style="background-image:linear-gradient(to bottom right, #A76BCE, #7F00FF);">SIGN IN</button></a></li>
    </ul>
    <script>
        if (localStorage.getItem("loggedUserID") !== null) {
            const profileButton = document.getElementById("profile");

            profileButton.lastElementChild.textContent = "PROFILE";
            profileButton.href = "/Movie-Ticketing-System/profile/";
            console.log(localStorage.getItem("loggedUserID"));
        }
    </script>
</nav>