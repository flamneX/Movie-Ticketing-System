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
const SERIES_IDs = [
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

// display the movies
async function displayMovie(containerId) {
    const container = document.getElementById(containerId);

    let counter = 0;
    let rowDiv = document.createElement("div");
    rowDiv.className = "movie-row";

    for (const id of SERIES_IDs) {
        const movie = await fetchMovieDetail(id);
        if(!movie) continue;

        const movieDiv = document.createElement("div");
        movieDiv.className = "movie-card";
        movieDiv.innerHTML = `<img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">`;
        const movieOverlay = document.createElement("div");
        movieOverlay.className = "overlay";

        movieOverlay.innerHTML = `
        <div style="height: 410px">
          <h3>${movie.primaryTitle}</h3>
          <h5><i class="fa-solid fa-tag" style="color: #A76BCE; padding-right: 1%"></i> ${movie.genres?.slice(0,3).join(', ') || 'N/A'}</h5>
          <h5><i class="fa-solid fa-clock" style="color: #A76BCE; padding-right: 1%"></i> ${movie.runtimeSeconds ? movie.runtimeSeconds / 60 : 'N/A'} mins</h5>
          <h5><i class="fa-solid fa-language" style="color: #A76BCE; padding-right: 1%"></i> ${movie.spokenLanguages && movie.spokenLanguages.length > 0 ? movie.spokenLanguages[0].name : 'N/A'}</h5>
        </div>
        <div style="display: flex; justify-content: center;">
          <button><a href="movie-detail.php?id=${movie.id}">BUY TICKET<a></button>
        </div>
        `;
        movieDiv.appendChild(movieOverlay);

        rowDiv.appendChild(movieDiv);
        counter++;

        if (counter === 4) {
            container.appendChild(rowDiv);
            rowDiv = document.createElement("div");
            rowDiv.className = "movie-row";
            counter = 0;
        }
    }

    // Append any remaining movies in the last row
    if (counter > 0) {
        container.appendChild(rowDiv);
    }
}


// display movie detail
async function displayPreview(imdbId) {
  const container = document.getElementById("vid");

  const video = await fetchMoviePreview(imdbId);

  if(Object.keys(video).length === 0 && video.constructor === Object) {
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

async function displayDetails(imdbId) {
  const containerLeft = document.getElementById("movieInfo")
  const containerRight = document.getElementById("moviePlot")
  const containerTitle = document.getElementById("title")

  const movie = await fetchMovieDetail(imdbId); 

  containerTitle.innerHTML = `
    <h2>${movie.primaryTitle}</h2>
  `;

  containerLeft.innerHTML = `
    <img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">
    <h5><i class="fa-solid fa-tag" style="padding-right: 1%"></i> ${movie.genres?.slice().join(', ') || 'N/A'}</h5>
    <h5><i class="fa-solid fa-clock" style="padding-right: 1%"></i> ${movie.runtimeSeconds ? movie.runtimeSeconds / 60 : 'N/A'} mins</h5>
    <h5><i class="fa-solid fa-language" style="padding-right: 1%"></i> ${movie.spokenLanguages && movie.spokenLanguages.length > 0 ? movie.spokenLanguages[0].name : 'N/A'}</h5>
  `;

  const synopsis = document.getElementById("syn");
  synopsis.textContent = movie.plot || "No synopsis available.";

  const cast = document.getElementById("cas");
  cast.textContent = movie.stars?.map(s => s.displayName).join(", ") || "N/A";

  const directors = document.getElementById("dir");
  directors.textContent = movie.directors?.map(d => d.displayName).join(", ") || "N/A";

  const writers = document.getElementById("wri");
  writers.textContent = movie.writers?.map(w => w.displayName).join(", ") || "N/A";
}