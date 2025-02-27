// Function to check if an element is in the viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0
    );
}

// Select all h2 and img elements
const secTwoImg = document.querySelectorAll('.two-img');

// Function to add the slide-in class when elements are in viewport
function slideInElements() {
    // Handle h2 elements
    secTwoImg.forEach(function(cont) {
        if (isInViewport(cont)) {
            cont.classList.add('slideInForSectionTwo');
        }
    });
    
}
// Check for scrolling and initial page load
window.addEventListener('scroll', slideInElements);
window.addEventListener('DOMContentLoaded', slideInElements);

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
