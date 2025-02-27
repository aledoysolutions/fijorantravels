const mainImg = document.querySelector('.right img');
const images = [
  "IMAGES/Group-42.png",
  "IMAGES/Group-15 (1).png",

];

let currentIndex = 0;

setInterval(() => {
  mainImg.src = images[currentIndex];
  currentIndex = (currentIndex + 1) % images.length; 
}, 5000);

// Function to check if an element is in the viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0
    );
}

// Select article three element img
const artThreeImg = document.querySelectorAll('.art-three-right-img');

// Function to add the slide-in class when elements are in viewport
function slideInElements() {
    // Handle h2 elements
    artThreeImg.forEach(function(cont) {
        if (isInViewport(cont)) {
            cont.classList.add('slideInForArtThreeImg');
        }
    });
    
}
// Check for scrolling and initial page load
window.addEventListener('scroll', slideInElements);
window.addEventListener('DOMContentLoaded', slideInElements);

// Initial numbers for the elements
const initialNumbers = {
    explorers: 2000,
    destinations: 100,
    years: 20
  };
  
  // Function to shuffle numbers randomly
  function shuffleNumbers() {
    const explorerElement = document.getElementById("explorers-num");
    const destinationsElement = document.getElementById("destinations-num");
    const yearsElement = document.getElementById("years-num");
  
    // Helper function to generate a random number
    function randomNumber(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }
  
    // Function to simulate the shuffle animation
    function startShuffling() {
      let shuffleCount = 0;
      const maxShuffles = 30;//Number of times the numbers will change before final value
  
      const shuffleInterval = setInterval(() => {
        // Set random numbers
        explorerElement.innerText = randomNumber(1500, 3000) + '+';
        destinationsElement.innerText = randomNumber(50, 150) + '+';
        yearsElement.innerText = randomNumber(10, 30) + '+';
  
        shuffleCount++;
  
        // After max shuffles, stop and set the numbers to their final values
        if (shuffleCount >= maxShuffles) {
          clearInterval(shuffleInterval);
          // Reset to the initial values after the last shuffle
          setTimeout(() => {
            explorerElement.innerText = initialNumbers.explorers + '+';
            destinationsElement.innerText = initialNumbers.destinations + '+';
            yearsElement.innerText = initialNumbers.years + '+';
          }, 1000); // Time before settling (in milliseconds)
        }
      }, 200); // Interval between each shuffle (in milliseconds)
    }
  
    // Start the shuffle animation
    startShuffling();
  }
  
  // Intersection Observer to trigger shuffle when in view
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Trigger shuffle animation when in view
        shuffleNumbers();
        // Stop observing after triggering once
        observer.disconnect();
      }
    });
  }, { threshold: 0.5 }); // Trigger when 50% of the element is in view
  
  // Select the section to observe
  const target = document.querySelector('.sec-one-art');
  observer.observe(target);
  

    // Get the button
const backToTopButton = document.getElementById("backToTop");

// Show the button when the user scrolls down 100px
window.onscroll = function () {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopButton.style.display = "block";
    } else {
        backToTopButton.style.display = "none";
    }
};

// Scroll to top when the button is clicked
backToTopButton.onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};
