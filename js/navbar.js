const navBar = document.getElementById("nav");
const closenavimg = document.getElementById("closenavimg");
const closenav = document.getElementById("closenav");
const closenavdiv = document.getElementById("closenav");
const list = document.getElementById("list");
const profileDropdown = document.getElementById("profile");

function handleNavCloseOpen(Event) {
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
}

function handleNavCloseOnly(Event) {
  if (navBar.style.width === "200px") {
    // close navbar click somewhere else
    navBar.style.width = "0px";
    list.style.width = "0px";
    closenavimg.style.transform = "rotate(-180deg)";
    closenavimg.style.position = "relative";
    closenavimg.style.backgroundSize = "cover";
  }
}

closenav.addEventListener("click", handleNavCloseOpen);

document.addEventListener("click", function (event) {
  const targetElement = event.target;
  const isClickInsideNav = navBar.contains(targetElement);

  if (!isClickInsideNav) {
    handleNavCloseOnly();
  }
});

