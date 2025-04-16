// JavaScript for toggle menu
const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
    menuToggle.classList.toggle("active");
});

// Close menu when clicking on a menu item
const menuItems = document.querySelectorAll(".navbar-menu a");
menuItems.forEach((item) => {
    item.addEventListener("click", () => {
        if (navMenu.classList.contains("active")) {
            navMenu.classList.remove("active");
            menuToggle.classList.remove("active");
        }
    });
});

// Close menu when window is resized
window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
        navMenu.classList.remove("active");
        menuToggle.classList.remove("active");
    }
});

// Add scroll effect to navbar
window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        navbar.style.padding = "0.7rem 1rem";
        navbar.style.backgroundColor = "#222";
    } else {
        navbar.style.padding = "1rem";
        navbar.style.backgroundColor = "#333";
    }
});
