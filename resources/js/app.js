import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
document.addEventListener("alpine:init", ()=> {
  Alpine.data("stats", ()=> ({
    stats: [],
    getData() {
      fetch('/admin/dashboard/stats')
        .then(response => response.json())
        .then(data => {
            this.stats = data;
        })
        .catch(error => console.error('Error fetching statistics:', error));
      }
    }))
  });


// for the customer homepage and landing page slider

// window.onload = function() {
//    var slider = document.getElementById('slider');
//    var firstSlide = slider.firstElementChild.cloneNode(true);
//    var lastSlide = slider.lastElementChild.cloneNode(true);
//    slider.appendChild(firstSlide);
//    slider.insertBefore(lastSlide, slider.firstElementChild);
// }

// window.onload = function() {
//   var slider = document.getElementById('slider1');
//   var firstSlide = slider.firstElementChild.cloneNode(true);
//   var lastSlide = slider.lastElementChild.cloneNode(true);
//   slider.appendChild(firstSlide);
//   slider.insertBefore(lastSlide, slider.firstElementChild);
// }
// window.onload = function() {
//   var slider = document.getElementById('slider2');
//   var firstSlide = slider.firstElementChild.cloneNode(true);
//   var lastSlide = slider.lastElementChild.cloneNode(true);
//   slider.appendChild(firstSlide);
//   slider.insertBefore(lastSlide, slider.firstElementChild);
// }




Alpine.start();

