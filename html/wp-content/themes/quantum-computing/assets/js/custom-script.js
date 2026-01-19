jQuery(document).ready(function ($) {

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top a").fadeIn();
    } else {
      $(".back-to-top a").fadeOut();
    }
  });

  $(".back-to-top a").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
    return false;
  });

  //projects-swiper
  var quantum_computing_project_Slider = new Swiper(".projects-slider", {
    breakpoints: {
      0: {
        slidesPerView: 1,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 2,
        centeredSlides: false,
      },
      992: {
        slidesPerView: 3,
        centeredSlides: true,
      }
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: ".projects-swiper-button-next",
      prevEl: ".projects-swiper-button-prev",
    },
  });

});


document.addEventListener('DOMContentLoaded', function () {
  const quantum_computing_counters = document.querySelectorAll('.customer-no,.package-no');
  quantum_computing_counters.forEach(function (counter) {
    const quantum_computing_target = parseInt(counter.textContent.replace(/\D/g, ''), 10); // base 10
    const quantum_computing_duration = 2000; // total quantum_computing_duration (ms)
    const quantum_computing_startTime = performance.now();

    function quantum_computing_updateCounter(currentTime) {
      const elapsed = currentTime - quantum_computing_startTime;
      const progress = Math.min(elapsed / quantum_computing_duration, 1);
      const count = Math.floor(progress * quantum_computing_target);

      counter.textContent = count;

      if (progress < 1) {
        requestAnimationFrame(quantum_computing_updateCounter);
      } else {
        counter.textContent = quantum_computing_target; // ensure final value
      }
    }

    requestAnimationFrame(quantum_computing_updateCounter);
  });
});


// tabs.js

const quantum_computing_tabTiles = [...document.querySelectorAll("div.main-tab div")];
const quantum_computing_tabContents = [...document.querySelectorAll(".tab-content")];

quantum_computing_tabTiles.forEach((tabTile, index) => {
  tabTile.classList.toggle('active', index === 0);
  tabTile.querySelector('a').setAttribute('tabindex', '0'); // all tabs focusable for Tab key
});

quantum_computing_tabContents.forEach((tabContent, index) => {
  tabContent.classList.toggle('active', index === 0);
});

function quantum_computing_activateTab(quantum_computing_tabDiv) {
  const quantum_computing_activeIndex = quantum_computing_tabTiles.findIndex(tab => tab === quantum_computing_tabDiv);

  quantum_computing_tabTiles.forEach((tabTile, index) => {
    tabTile.classList.toggle('active', index === quantum_computing_activeIndex);
  });

  quantum_computing_tabContents.forEach((tabContent, index) => {
    tabContent.classList.toggle('active', index === quantum_computing_activeIndex);
  });

  quantum_computing_tabDiv.querySelector('a').focus();
}
document.addEventListener("click", e => {
  const quantum_computing_tabDiv = e.target.closest(".tab-title");
  if (quantum_computing_tabDiv) {
    quantum_computing_activateTab(quantum_computing_tabDiv);
  }
});
quantum_computing_tabTiles.forEach(tabTile => {
  const quantum_computing_tabLink = tabTile.querySelector('a');
  quantum_computing_tabLink.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      quantum_computing_activateTab(tabTile);
    }
  });
});