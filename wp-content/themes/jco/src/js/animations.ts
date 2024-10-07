import { gsap } from "gsap";
import Timeline = gsap.core.Timeline;

window.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".floating-animation").forEach((el) => {
    animateFloating(el as HTMLElement);
  });
});

function animateFloating(figure: HTMLElement) {
  const tl = gsap.timeline({ repeat: 0 });
  const img = figure.querySelector("img");
  floatElement(tl, img, 10, figure.classList.contains("scale-separately"));

  let currentX = 0
  let currentY = 0
  let currentRotation = 0
  const rotationSpeed = 0.05
  const movementSpeed = 0.1

  let currentSkewX = 0
  let currentSkewY = 0
  const skewSpeed = 0.05

  // Magnetic effect on hover
  figure.addEventListener('mousemove', (e) => {
    tl.pause()
    const { left, top, width, height } = figure.getBoundingClientRect()
    const centerX = left + width / 2
    const centerY = top + height / 2
    const mouseX = e.clientX
    const mouseY = e.clientY

    const deltaX = mouseX - centerX
    const deltaY = mouseY - centerY
    const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY)
    const angle = Math.atan2(deltaY, deltaX)

    if (distance < 150) {
      const magnetStrength = Math.min((150 - distance) / 150, 0.5) // Limit the strength

      // Smoothly update position
      const targetX = deltaX * magnetStrength
      const targetY = deltaY * magnetStrength
      currentX += (targetX - currentX) * movementSpeed
      currentY += (targetY - currentY) * movementSpeed

      // Smoothly update rotation
      const targetRotation = angle * (180 / Math.PI) * 0.1 // Reduced rotation factor
      const rotationDiff = targetRotation - currentRotation

      // Normalize the rotation difference to avoid sudden jumps
      let normalizedDiff = rotationDiff
      if (Math.abs(rotationDiff) > 180) {
        normalizedDiff = rotationDiff - Math.sign(rotationDiff) * 360
      }

      currentRotation += normalizedDiff * rotationSpeed

      // Calculate and update skew
      const targetSkewX = (deltaY / height) * 10 // Max 10 degrees skew
      const targetSkewY = -(deltaX / width) * 10 // Max 10 degrees skew
      currentSkewX += (targetSkewX - currentSkewX) * skewSpeed
      currentSkewY += (targetSkewY - currentSkewY) * skewSpeed


      gsap.to(img, {
        duration: 0.3,
        x: currentX,
        y: currentY,
        rotation: currentRotation,
        skewX: currentSkewX,
        skewY: currentSkewY,
        scale: 1.1,
        ease: 'power2.out'
      })
    }
  })


  figure.addEventListener('mouseleave', () => {
    gsap.to(img, {
      duration: 0.3,
      x: 0,
      y: 0,
      skewX: 0,
      skewY: 0,
      rotation: 0,
      scale: 1,
      ease: 'power2.out',
      onComplete() {
        tl.play()
      }
    })
    currentX = 0
    currentY = 0
    currentRotation = 0
    currentSkewX = 0
    currentSkewY = 0
  })
}

function floatElement(
  tl: Timeline,
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
  tl.clear();
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
