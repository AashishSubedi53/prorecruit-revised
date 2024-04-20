import './bootstrap';

// for powergrid datatable
import './../../vendor/power-components/livewire-powergrid/dist/powergrid' 
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'


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

Alpine.start();