const bannerImages = [
    { url: 'images.jpeg' },
    //{ url: 'banner_image.webp' },
    //{ url: 'banner_image_1.jpg' },
    { url: 'banner_image_2.webp' },
    { url: 'banner_image_3.webp' },
    { url: 'banner_image_4.webp' }
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