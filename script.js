const bannerImages = [
    { url: 'images/banner1.png' },
    //{ url: 'banner_image.webp' },
    // { url: 'banner_image_1.jpg' },
    // { url: 'banner_image_2.webp' },
    // { url: 'banner_image_3.webp' },
    // { url: 'banner_image_4.webp' }

];

// Preload images for smoother transitions
async function preloadImages() {
    const imagePromises = bannerImages.map(imageData => {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.src = imageData.url;
            img.onload = resolve;
            img.onerror = reject;
        });
    });

    try {
        await Promise.all(imagePromises);
        console.log('All banner images preloaded successfully');
    } catch (error) {
        console.error('Error preloading images:', error);
    }
}

// Initialize banner function
async function initBanner() {
    // Preload images first
    await preloadImages();
    
    // Then initialize the banner functionality
    class Banner {
        constructor(containerId, images, interval = 5000) {
            this.container = document.getElementById(containerId);
            this.images = images;
            this.currentIndex = 0;
            this.interval = interval;
            this.timer = null;
            this.isPaused = false;
            
            this.init();
        }

        init(){
            this.images.forEach((image, index) => {
                const slide = document.createElement('div');
                slide.className = `banner-slide ${index === 0 ? 'active' : ''}`;
                slide.style.backgroundImage = `url(${image.url})`;
                this.container.appendChild(slide);
            });
            // Create indicators if container exists
            const indicatorsContainer = document.getElementById('indicators');
            if (indicatorsContainer) {
                this.images.forEach((_, index) => {
                    const dot = document.createElement('div');
                    dot.className = `dot ${index === 0 ? 'active' : ''}`;
                    dot.addEventListener('click', () => {
                        this.setCurrentSlide(index);
                    });
                    indicatorsContainer.appendChild(dot);
                });
            }
            // Set up event listeners for buttons if they exist
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const pauseBtn = document.getElementById('pauseBtn');
            
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    this.prevSlide();
                });
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    this.nextSlide();
                });
            }
            
            if (pauseBtn) {
                pauseBtn.addEventListener('click', () => {
                    this.togglePause();
                });
            }
            
            // Start the auto rotation
            this.startAutoRotation();
        }

        setCurrentSlide(index) {
            // Update current index
            this.currentIndex = index;
            
            // Update slides
            const slides = document.querySelectorAll('.banner-slide');
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            
            // Update indicators if they exist
            const dots = document.querySelectorAll('.dot');
            if (dots.length > 0) {
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }
        }
        nextSlide() {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
            this.setCurrentSlide(this.currentIndex);
        }
        
        prevSlide() {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            this.setCurrentSlide(this.currentIndex);
        }
        
        startAutoRotation() {
            if (this.timer) {
                clearInterval(this.timer);
            }
            
            this.timer = setInterval(() => {
                if (!this.isPaused) {
                    this.nextSlide();
                }
            }, this.interval);
        }
        
        togglePause() {
            this.isPaused = !this.isPaused;
            const pauseBtn = document.getElementById('pauseBtn');
            if (pauseBtn) {
                pauseBtn.innerHTML = this.isPaused ? 
                    '<i class="fas fa-play"></i> Play' : 
                    '<i class="fas fa-pause"></i> Pause';
            }
            
            if (!this.isPaused) {
                this.startAutoRotation();
            }
        }
    }
    // Initialize the banner
    const banner = new Banner('banner', bannerImages, 5000);
}
// Initialize banner when DOM is fully loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBanner);
} else {
    initBanner();
}

//For HomePage Move Shotimes fetch dt
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

// fetch Array of Movie json from IMDB ID
async function fetchMovieArray(url) {
  try {
        const response = await fetch(url);
        const data = await response.json();
        console.log(data);
        return data.titles;

    } 
    catch (error) {
        console.error("Error fetching movie:", error);
        return null;
    }
}

// display the movies
async function displayMovie(containerId) {
    const container = document.getElementById(containerId);

    let counter = 0;
    let rowDiv = document.createElement("div");
    rowDiv.className = "movie-row";

    let url = `https://api.imdbapi.dev/titles?types=MOVIE&genres=Animation&languageCodes=ja&endYear=`
      + (new Date().getFullYear() - 3) + `&sortBy=SORT_BY_RELEASE_DATE&sortOrder=DESC`;
    const NEWEST_SHOWS = await fetchMovieArray(url);

    for (const movieData of NEWEST_SHOWS) {
        if (movieData.primaryImage === undefined || !movieData) {
          continue;
        }

        const movie = await fetchMovieDetail(movieData.id);

        const movieDiv = document.createElement("div");
        movieDiv.className = "movie-card";
        movieDiv.innerHTML = `<img src="${movie.primaryImage.url}" alt="${movie.originalTitle}">`;
        const movieOverlay = document.createElement("div");
        movieOverlay.className = "overlay";

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

        if (counter === 10) {
            container.appendChild(rowDiv);
            return;
        }
    }
}

function scrollMovies(direction) {
    const row = document.getElementById("movieContainer");
    const cardWidth = row.querySelector(".movie-card")?.offsetWidth || 220; 
    row.scrollBy({ left: direction * cardWidth * 2, behavior: "smooth" });
}