import { gsap } from "gsap";

window.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".floating-animation").forEach((el) => {
    animateFloating(el as HTMLElement);
  });
});

function animateFloating(el: HTMLElement) {
  const tl = gsap.timeline({ repeat: 0 });
  const animationEl = el.querySelector("img");
  floatElement(tl, animationEl, 10, el.classList.contains("scale-separately"));

  el.addEventListener("mouseenter", () => {
    tl.pause();
    gsap.to(animationEl, {
      scale: 1.1,
      rotation: 0,
      skew: 0,
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
      skew: 0,
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

function floatElement(
  tl: gsap.core.Timeline,
  el: HTMLElement,
  radius: number,
  scaleSeparately: boolean = false,
) {
  // Randomize the position of the element within the radius
  const x = getRandomBetween(-radius, radius);
  const y = getRandomBetween(-radius, radius);
  // Randomize the scale and rotation of the element within the range of 0.97 and 1.04 (for a scale) and -5 to 5
  // (for rotation)
  const scale = getRandomBetween(0.97, 1.04);
  let scaleX = scale;
  let scaleY = scale;
  if (scaleSeparately) {
    scaleX = getRandomBetween(0.97, 1.04);
    scaleY = getRandomBetween(0.97, 1.04);
  }
  const rotation = getRandomBetween(-5, 5);

  // Skew very slightly 0.02 to 0.2
  const skewX = getRandomBetween(0.02, 0.2);
  const skewY = getRandomBetween(0.02, 0.2);

  tl.to(el, {
    x,
    y,
    scaleX,
    scaleY,
    rotation,
    skewX,
    skewY,
    duration: getRandomBetween(1.75, 3),
    ease: "none",
    onComplete: () => {
      floatElement(tl, el, radius, scaleSeparately);
    },
  });
}

function getRandomBetween(min: number, max: number): number {
  return Math.random() * (max - min) + min;
}
