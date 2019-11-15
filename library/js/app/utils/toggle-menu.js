const toggleMenu = (button, menu) => {
    button.addEventListener("click", () => {
        menu.classList.toggle("open");
        button.classList.toggle("cross");
    });  
}