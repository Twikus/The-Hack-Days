window.addEventListener('load', () => {

    if (document.querySelector('body') !== null){
        const TL = gsap.timeline({paused: true});
    
    TL
    .from("main", {autoAlpha:0, ease:"linear"}, 0)
    .staggerFrom("section", 1, {top: -20, autoAlpha:0, ease: "power2.out"}, 0.75, '1')
    .from("footer", 1, {left: -100, autoAlpha:0, ease: "power1.out"}, 2.5)
    .staggerFrom("li", 1, {left: -20, autoAlpha:0, ease: "power2.out"}, 0.75, '3')

        TL.play();
    }
});