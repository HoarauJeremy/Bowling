function toggleNav(){
    const toggleMenuBtn = document.querySelector("#menu-btn");
    const toggleMenuImg = document.querySelector("#menu-btn img");
    const toggledMenu = document.querySelector("#toggled-menu");
    // const menuLinks = document.querySelector("#main-nav ul a");

    // toggleMenuBtn.addEventListener("click", toggleNav);

    toggledMenu.classList.toggle("-translate-y-full")

    if(toggledMenu.classList.contains("-translate-y-full")) {
        toggleMenuImg.setAttribute("src", "./media/images/burger-menu-svgrepo-com.svg")
        toggleMenuBtn.setAttribute("aria-expanded", "false")
    } 
    else {
        toggleMenuImg.setAttribute("src", "./media/images/times-svgrepo-com.svg")
        toggleMenuBtn.setAttribute("aria-expanded", "true")
    }
}