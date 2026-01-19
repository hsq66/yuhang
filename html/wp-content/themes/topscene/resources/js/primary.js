document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.reveal');
    const windowHeight = window.innerHeight;

    function handleScrollReveal() {
        elements.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight) {
                el.classList.add('show');
            }
        });
    }

    window.addEventListener('scroll', handleScrollReveal);
    handleScrollReveal();
});



document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar');  
    const scrollThreshold = 50;  


    function handleScroll() {
        if (window.scrollY > scrollThreshold) {  
            navbar.classList.add('scrolled');  
        } else {
            navbar.classList.remove('scrolled');  
        }
    }

    window.addEventListener('scroll', handleScroll); 
    handleScroll();  
});
