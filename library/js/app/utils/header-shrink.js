function headerShrink() {
    const pos1 = document.documentElement.scrollTop;
    const pos2 = document.body.scrollTop;
    const header = document.querySelector(".header");
    if( pos1 > (window.innerHeight/2) || pos2 > (window.innerHeight/2) ) {
        header.classList.add("fixed");
    } else {
        header.classList.remove("fixed");
    }
    if( pos1 > (window.innerHeight) || pos2 > (window.innerHeight) ) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
}