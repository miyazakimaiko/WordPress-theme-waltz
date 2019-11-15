const headerShrink = (pos1, pos2, header) => {
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