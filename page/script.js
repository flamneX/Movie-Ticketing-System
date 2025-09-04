// fetch movie json using IMDB ID
async function fetchMovie(imdbId) {
    try {
        const url = `https://imdb.iamidiotareyoutoo.com/search?q=${imdbId}`; // public api key
        const response = await fetch(url);
        const data = await response.json();

        return data;
    } catch (error) {
        console.error("Error fetching movie:", error);
        return null;
    }
}

// list of movies to display
const SERIES_IDs = [
  "tt1773185", // Madoka Magica
  "tt7078180", // Violet Evergarden
];

// display the movie
async function displayMovie(containerId) {
    const container = document.getElementById(containerId);

    // display each item in the series
    for (const id of SERIES_IDs) {
    const data = await fetchMovie(id);
    if (!data || !data.description || !data.description.length) continue;
    const movie = data.description[0];
    const movieDiv = document.createElement("div");
    movieDiv.className = "movie-card";
    movieDiv.innerHTML = `
      <h2>${movie["#TITLE"]}</h2>
      <img src="${movie["#IMG_POSTER"]}" alt="${movie["#TITLE"]}" width="200">
      <p><b>Year:</b> ${movie["#YEAR"]}</p>
      <p><b>Actors:</b> ${movie["#ACTORS"]}</p>
    `;
    container.appendChild(movieDiv);
  }
}