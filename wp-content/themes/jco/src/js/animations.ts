import { gsap } from "gsap";

window.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".floating-animation").forEach((el) => {
    animateFloating(el as HTMLElement);
  });
});

function animateFloating(el: HTMLElement) {
  const tl = gsap.timeline({ repeat: 0 });
  const animationEl = el.querySelector("img");

  floatElement(tl, animationEl, 10);

  el.addEventListener("mouseenter", () => {
    tl.pause();
    gsap.to(animationEl, {
      scale: 1.1,
      rotation: 0,
      x: 0,
      y: 0,
      duration: 0.5,
      ease: "power3.inOut",
    });
  });
  el.addEventListener("mouseleave", () => {
    gsap.to(animationEl, {
      scale: 1,
      rotation: 0,
      x: 0,
      y: 0,
      duration: 0.5,
      ease: "power3.inOut",
      onComplete: () => {
        tl.restart();
      },
    });
  });
}

function floatElement(tl: gsap.core.Timeline, el: HTMLElement, radius: number) {
  // Randomize the position of the element within the radius
  const x = Math.random() * radius * 2 - radius;
  const y = Math.random() * radius * 2 - radius;
  // Randomize the scale and rotation of the element within the range of 0.01 to 0.99 (for scale) and -5 to 5 (for rotation)
  const scale = Math.random() * 0.01 + 0.99;
  const rotation = Math.random() * 10 - 5;

  tl.to(el, {
    x,
    y,
    scale,
    rotation,
    duration: Math.random() * 2 + 1,
    ease: "none",
    onComplete: () => {
      floatElement(tl, el, radius);
    },
  });
}
