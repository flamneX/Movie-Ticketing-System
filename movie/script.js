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

// list of movies to display
const CURRENT_SERIES = [
  "tt2457282",
  "tt30648377",
  "tt8091892",
  "tt4054952",
  "tt1587156",
  "tt8092118",
  "tt1909796",
  "tt12007484",
  "tt9534948",
  "tt13997358",
];

const UPCOMING_SERIES = [
  "tt0245429",
  "tt0347149",
  "tt0119698",
  "tt6587046",
  "tt0097814",
  "tt0876563",
  "tt2013293",
  "tt0087544",
];

// display the movies selection
async function displayCurrentMovie() {
    const container = document.getElementById("movieContainer");
    container.innerHTML = '';
    
    let counter = 0;
    let rowDiv = document.createElement("div");
    rowDiv.className = "movie-row";
    rowDiv.classList.add("hidden");

    for (const id of CURRENT_SERIES) {
        const movie = await fetchMovieDetail(id);
        if(!movie) continue;

        const movieDiv = document.createElement("div");
        movieDiv.className = "movie-card";
        movieDiv.innerHTML = `<img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">`;
        const movieOverlay = document.createElement("div");
        movieOverlay.className = "movie-overlay";

        movieOverlay.innerHTML = `
        <div style="height: 365px">
          <h3>${movie.primaryTitle}</h3>
          <h5><i class="fa-solid fa-tag" style="color: #A76BCE; padding-right: 1%"></i> ${movie.genres?.slice(0,3).join(', ') || 'N/A'}</h5>
          <h5><i class="fa-solid fa-clock" style="color: #A76BCE; padding-right: 1%"></i> ${movie.runtimeSeconds ? movie.runtimeSeconds / 60 : 'N/A'} mins</h5>
          <h5><i class="fa-solid fa-language" style="color: #A76BCE; padding-right: 1%"></i> ${movie.spokenLanguages && movie.spokenLanguages.length > 0 ? movie.spokenLanguages[0].name : 'N/A'}</h5>
        </div>
        <div style="display: flex; justify-content: center;">
          <a href="movie-detail.php?movieID=${movie.id}"><button>BUY TICKET</button><a>
        </div>
        `;
        movieDiv.appendChild(movieOverlay);

        rowDiv.appendChild(movieDiv);
        counter++;

        if (counter === 4) {
          container.appendChild(rowDiv);

          void rowDiv.offsetWidth;
          rowDiv.classList.remove("hidden");
          rowDiv.classList.add("fade-in");

          rowDiv = document.createElement("div");
          rowDiv.className = "movie-row hidden";
          counter = 0;
        }
    }

    // Append any remaining movies in the last row
    if (counter > 0) {
        container.appendChild(rowDiv);

        void rowDiv.offsetWidth;
        rowDiv.classList.remove("hidden");
        rowDiv.classList.add("fade-in");
    }
}

// display the movies selection
async function displayUpcomingMovie() {
    const container = document.getElementById("movieContainer");
    container.innerHTML = '';

    let counter = 0;
    let rowDiv = document.createElement("div");
    rowDiv.className = "movie-row";
    rowDiv.classList.add("hidden");

    for (const id of UPCOMING_SERIES) {
        const movie = await fetchMovieDetail(id);
        if(!movie) continue;

        const movieDiv = document.createElement("div");
        movieDiv.className = "movie-card";
        movieDiv.innerHTML = `<img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">`;
        const movieOverlay = document.createElement("div");
        movieOverlay.className = "movie-overlay";

        movieOverlay.innerHTML = `
        <div style="height: 365px">
          <h3>${movie.primaryTitle}</h3>
          <h5><i class="fa-solid fa-tag" style="color: #A76BCE; padding-right: 1%"></i> ${movie.genres?.slice(0,3).join(', ') || 'N/A'}</h5>
          <h5><i class="fa-solid fa-clock" style="color: #A76BCE; padding-right: 1%"></i> ${movie.runtimeSeconds ? movie.runtimeSeconds / 60 : 'N/A'} mins</h5>
          <h5><i class="fa-solid fa-language" style="color: #A76BCE; padding-right: 1%"></i> ${movie.spokenLanguages && movie.spokenLanguages.length > 0 ? movie.spokenLanguages[0].name : 'N/A'}</h5>
        </div>
        <div style="display: flex; justify-content: center;">
          <a href="/Movie-Ticketing-System/myWishlist/wish-detail.php?movieID=${movie.id}"><button>VIEW INFO</button><a>
        </div>
        `;
        movieDiv.appendChild(movieOverlay);

        rowDiv.appendChild(movieDiv);
        counter++;

        if (counter === 4) {
          container.appendChild(rowDiv);

          void rowDiv.offsetWidth;
          rowDiv.classList.remove("hidden");
          rowDiv.classList.add("fade-in");

          rowDiv = document.createElement("div");
          rowDiv.className = "movie-row hidden";
          counter = 0;
        }
    }

    // Append any remaining movies in the last row
    if (counter > 0) {
        container.appendChild(rowDiv);

        void rowDiv.offsetWidth;
        rowDiv.classList.remove("hidden");
        rowDiv.classList.add("fade-in");
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
    <h2>${movie.primaryTitle}</h2>
  `;

  containerLeft.innerHTML = `
    <img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">
    <h5><i class="fa-solid fa-tag" style="padding-right: 1%"></i> ${movie.genres?.join(', ') || 'N/A'}</h5>
    <h5><i class="fa-solid fa-clock" style="padding-right: 1%"></i> ${movie.runtimeSeconds ? Math.floor(movie.runtimeSeconds / 60) : 'N/A'} mins</h5>
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

async function handleButtonClick(asyncMethod) {
    // Disable both buttons
    const buttons = document.querySelectorAll('button');
    buttons.forEach(b => b.disabled = true);

    try {
        await asyncMethod();
    } finally {
        buttons.forEach(b => b.disabled = false);
    }
}