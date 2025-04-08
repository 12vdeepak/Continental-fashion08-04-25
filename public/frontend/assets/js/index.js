document.addEventListener("DOMContentLoaded", function () {
  console.log("Script loaded!"); // Debugging

  // Load navbar and footer
  loadComponent("navbar", "../components/navbar.html", attachNavbarListeners);
  loadComponent("footer", "../components/footer.html");

  // Function to attach navbar event listeners
  function attachNavbarListeners() {
      const menuBtn = document.getElementById("menu-btn");
      const closeBtn = document.getElementById("close-menu");
      const navMenu = document.getElementById("nav-menu");

      if (menuBtn && navMenu && closeBtn) {
          menuBtn.addEventListener("click", () => {
              navMenu.classList.remove("-translate-x-full"); // Show menu
          });

          closeBtn.addEventListener("click", () => {
              navMenu.classList.add("-translate-x-full"); // Hide menu
          });
      } else {
          console.error("Menu button, close button, or navigation menu not found!");
      }
  }

  // Function to load HTML components (Navbar & Footer)
  function loadComponent(id, file, callback) {
      fetch(file)
          .then((response) => response.text())
          .then((data) => {
              document.getElementById(id).innerHTML = data;
              if (callback) callback(); // Run callback after loading
          })
          .catch((error) => console.error("Error loading " + file, error));
  }

  
});
 // Disable scrolling when dropdown is open
 document.querySelector(".group").addEventListener("mouseenter", () => {
  document.body.classList.add("no-scroll");
});

document.querySelector(".group").addEventListener("mouseleave", () => {
  document.body.classList.remove("no-scroll");
});