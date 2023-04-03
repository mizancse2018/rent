// back to top
window.addEventListener('scroll', function() {
  var backToTopButton = document.getElementById('back-to-top');
  if (window.pageYOffset > 300) {
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
  }
});
document.getElementById('back-to-top').addEventListener('click', function(event) {
  event.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});
// back to top
