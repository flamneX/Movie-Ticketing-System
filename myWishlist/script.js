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

// fetch movie preview video json using IMDB ID
async function fetchMoviePreview(imdbId) {
     try {
        const url = `https://api.imdbapi.dev/titles/${imdbId}/videos`;
        const response = await fetch(url);
        const data = await response.json();
        console.log(data);

        return data;
    } catch (error) {
        console.error("Error fetching movie:", error);
        return null;
    }
}

// display movie preview
async function displayPreview(imdbId) {
  const container = document.getElementById("vid");

  const video = await fetchMoviePreview(imdbId);

  if (!video || !video.videos || video.videos.length === 0) {
    container.innerHTML = "Video Preview Not Available";
  } else {
    container.innerHTML = `
      <iframe 
        width="640" 
        height="360" 
        src="https://www.imdb.com/video/imdb/${video.videos[0].id}/imdb/embed"
        frameborder="0" 
        allowfullscreen>
      </iframe>
    `;
  }
}

// display movie detail
async function displayDetails(imdbId) {
  const containerLeft = document.getElementById("movieInfo");
  const containerTitle = document.getElementById("title");

  const movie = await fetchMovieDetail(imdbId); 

  containerTitle.innerHTML = `
    <h2>${movie.primaryTitle} (To Be Released)</h2>
  `;

  containerLeft.innerHTML = `
    <img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">
    <h5><i class="fa-solid fa-tag" style="padding-right: 1%"></i> ${movie.genres?.join(', ') || 'N/A'}</h5>
    <h5><i class="fa-solid fa-clock" style="padding-right: 1%"></i> Duration To Be Announce</h5>
    <h5><i class="fa-solid fa-language" style="padding-right: 1%"></i> ${movie.spokenLanguages?.[0]?.name || 'N/A'}</h5>
  `;

  const synopsis = document.getElementById("syn");
  synopsis.textContent = movie.plot || "No synopsis available.";

  createWikiLinks(document.getElementById("cas"), movie.stars);
  createWikiLinks(document.getElementById("dir"), movie.directors);
  createWikiLinks(document.getElementById("wri"), movie.writers);
}

function createWikiLinks(container, items) {
  container.innerHTML = "";

  if (!items || items.length === 0) {
    container.textContent = "N/A";
    return;
  }

  items.forEach((item, index) => {
    const a = document.createElement("a");
    a.textContent = item.displayName;
    a.href = `https://en.wikipedia.org/wiki/${encodeURIComponent(item.displayName)}`;
    a.target = "_blank";

    container.appendChild(a);

    if (index < items.length - 1) {
      container.appendChild(document.createTextNode(", "));
    }
  });
}

async function displayWishlist() {
    const wishlist = document.getElementById("myWishlistContainer");
    const userID = localStorage.getItem("loggedUserID");

    const response = await fetch(`getWishlist.php?userID=${userID}`);
    const data = await response.json();

    if (data.length === 0) {
        wishlist.innerHTML = "<h3>No Item(s) Found.</h3>";
        return;
    }

    const movieDetails = await Promise.all(
        data.map(wishlist => fetchMovieDetail(wishlist.movieID))
    );

    wishlist.innerHTML = data.map((wishlist, i) => {
        const movie = movieDetails[i];
        return `
            <div class="foreground" style="margin-bottom:5%; border-radius:20px; border-left-width: 15px; display: flex;">
              <div style="flex: 1">
                    <img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">
                </div>
                <div style="flex: 3.5;">
                    <h3>${movie.primaryTitle}</h3>
                    <a href="wish-detail?movieID=${wishlist.movieID}"><button class="viewTicket">View Details</button></a>
                </div>
            </div>
        `;
    }).join('');
}

async function isWishlisted(imdbId) {
  const userID = localStorage.getItem("loggedUserID");

  const response = await fetch(`isWishlisted.php?userID=${userID}&movieID=${imdbId}`);
  const data = await response.json();

  return data.length > 0;
}

async function addWishlist(imdbId) {
  const userID = localStorage.getItem("loggedUserID");
  const response = await fetch('addWishlist.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `userID=${encodeURIComponent(userID)}&movieID=${encodeURIComponent(imdbId)}`
  });
  const result = await response.json();
  return result.success;
}

async function removeWishlist(imdbId) {
  const userID = localStorage.getItem("loggedUserID");
  const response = await fetch('removeWishlist.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `userID=${encodeURIComponent(userID)}&movieID=${encodeURIComponent(imdbId)}`
  });
  const result = await response.json();
  return result.success;
}