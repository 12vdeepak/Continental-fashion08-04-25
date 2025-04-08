document.addEventListener("DOMContentLoaded", function () {
    console.log("Navbar script loaded!"); // Debugging
  
    // Mobile menu toggle
    const menuBtn = document.getElementById("menu-btn");
    const navMenu = document.getElementById("nav-menu");
  
    if (menuBtn && navMenu) {
      menuBtn.addEventListener("click", () => {
        navMenu.classList.toggle("-translate-x-full");
      });
    } else {
      console.error("Menu button or navigation menu not found!");
    }
  
    // Collection dropdown toggle
    const collectionMenu = document.querySelector(".group");
    const dropdownMenu = collectionMenu.querySelector("ul");
  
    if (collectionMenu && dropdownMenu) {
      collectionMenu.addEventListener("mouseenter", () => {
        dropdownMenu.classList.remove("invisible", "opacity-0");
      });
  
      collectionMenu.addEventListener("mouseleave", () => {
        dropdownMenu.classList.add("invisible", "opacity-0");
      });
    } else {
      console.error("Collection dropdown not found!");
    }
  });
  