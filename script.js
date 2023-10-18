  document.addEventListener("DOMContentLoaded", function () {
    // toggle icon navbar
    let menuIcon = document.querySelector("#menu-icon");
    let navbar = document.querySelector(".navbar");

    menuIcon.onclick = () => {
      menuIcon.classList.toggle("bx-x");
      navbar.classList.toggle("active");
    };

    // scroll sections active
    let sections = document.querySelectorAll("section");
    let navLinks = document.querySelectorAll("header nav a");

    window.addEventListener("scroll", () => {
      let fromTop = window.scrollY;

      sections.forEach((sec) => {
        let secTop = sec.offsetTop - 150;
        let secHeight = sec.offsetHeight;
        let id = sec.getAttribute("id");

        if (fromTop >= secTop && fromTop < secTop + secHeight) {
          navLinks.forEach((link) => {
            link.classList.remove("active");
          });

          document
            .querySelector(`header nav a[href="#${id}"]`)
            .classList.add("active");
        }
      });
    });

    // sticky navbar
    let header = document.querySelector("header");

    window.addEventListener("scroll", () => {
      header.classList.toggle("sticky", window.scrollY > 100);
    });

    // remove toggle icon ketika klik navbar link
    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        menuIcon.classList.remove("bx-x");
        navbar.classList.remove("active");
      });
    });
  });
