/*** Sidebar toggle ***/
const select = (el, all = false) => {
  el = el.trim()
  if (all) {
    return [...document.querySelectorAll(el)]
  } else {
    return document.querySelector(el)
  }
}
const on = (type, el, listener, all = false) => {
  if (all) {
    select(el, all).forEach(e => e.addEventListener(type, listener))
  } else {
    select(el, all).addEventListener(type, listener)
  }
}
if (select('.toggle-sidebar-btn')) {
  on('click', '.toggle-sidebar-btn', function(e) {
    select('body').classList.toggle('toggle-sidebar')
  })
}
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

  /**
   * Search bar toggle
   */
  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }
//profile on upload preview
var loadFile1 = function (event) {
    var output = document.getElementById('image');
    output.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile2 = function (event) {
    var output = document.getElementById('nid_front');
    output.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile3 = function (event) {
    var output = document.getElementById('nid_back');
    output.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile4 = function (event) {
    var output = document.getElementById('sign');
    output.src = URL.createObjectURL(event.target.files[0]);
};
