const navBar = document.getElementById("nav");
const closenavimg = document.getElementById("closenavimg");
const closenav = document.getElementById("closenav");
const list = document.getElementById("list");

const handleNavCloseOpen = () => {
  if (navBar.style.width === "0px") {
    // Reset the navbar
    navBar.style.width = "200px";
    list.style.width = "100%";
    closenavimg.style.transform = "rotate(0deg)";
    closenavimg.style.position = "relative";
    closenavimg.style.backgroundSize = "cover";
  } else {
    // Close the navbar
    navBar.style.width = "0px";
    list.style.width = "0px";
    closenavimg.style.transform = "rotate(-180deg)";
    closenavimg.style.position = "relative";
    closenavimg.style.backgroundSize = "cover";
  }
};

const handleNavCloseOnly = () => {
  if (navBar.style.width === "200px") {
    // Close the navbar when clicking somewhere else
    navBar.style.width = "0px";
    list.style.width = "0px";
    closenavimg.style.transform = "rotate(-180deg)";
    closenavimg.style.position = "relative";
    closenavimg.style.backgroundSize = "cover";
  }
};

closenav.addEventListener("click", handleNavCloseOpen);

document.addEventListener("click", (event) => {
  const targetElement = event.target;
  const isClickInsideNav = navBar.contains(targetElement);

  if (!isClickInsideNav) {
    handleNavCloseOnly();
  }
});
