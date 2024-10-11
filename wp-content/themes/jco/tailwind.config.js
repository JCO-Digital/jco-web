import { existsSync, readFileSync } from "node:fs";

const colors = {};
const breakpoints = {};
if (existsSync("theme.json")) {
  const theme = JSON.parse(readFileSync("theme.json", "utf8"));
  for (const color of theme.settings.color.palette) {
    colors[color.slug] = color.color;
  }
  if ("breakpoints" in theme.settings.custom) {
    for (const breakpoint of Object.keys(theme.settings.custom.breakpoints)) {
      breakpoints[breakpoint] = theme.settings.custom.breakpoints[breakpoint];
    }
  }
}

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./views/**/*.twig",
    "./blocks/**/*.twig",
    "./src/js/**/*.js",
    "./theme.json",
  ],
  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter", "sans-serif"],
        "inter-tight": ["Inter Tight", "sans-serif"],
      },
      fontSize: {
        xs: ["13px"],
        sm: ["clamp(14px, 0.875rem + ((1vw - 3.2px) * 0.469), 20px)"],
        base: ["clamp(18px, 1.125rem + ((1vw - 3.2px) * 0.156), 20px)"],
        lg: ["clamp(22.041px, 1.378rem + ((1vw - 3.2px) * 1.091), 36px)"],
        xl: ["clamp(25.014px, 1.563rem + ((1vw - 3.2px) * 1.327), 42px)"],
        "2xl": ["clamp(15.747px, 0.984rem + ((1vw - 3.2px) * 0.645), 24px)"],
        "3xl": ["clamp(20px, 1.25rem + ((1vw - 3.2px) * 0.938), 32px)"],
        "4xl": ["2.5rem"],
        "5xl": ["3.25rem"],
        "6xl": ["3.75rem"],
        "7xl": ["4.5rem"],
        "heading-1": [
          "clamp(43.728px, 2.733rem + ((1vw - 3.2px) * 3.146), 84px)",
        ],
        "heading-2": [
          "clamp(31.609px, 1.976rem + ((1vw - 3.2px) * 1.906), 56px)",
        ],
        "heading-3": [
          "clamp(24.034px, 1.502rem + ((1vw - 3.2px) * 1.247), 40px)",
        ],
        "heading-4": ["clamp(20px, 1.25rem + ((1vw - 3.2px) * 0.938), 32px)"],
        "heading-5": [
          "clamp(15.747px, 0.984rem + ((1vw - 3.2px) * 0.645), 24px)",
        ],
        ingress: ["clamp(20px, 1.25rem + ((1vw - 3.2px) * 0.625), 28px)"],
        mini: ["16px"],
        maxi: ["clamp(40px, 2.5rem + ((1vw - 3.2px) * 7.813), 140px)"],
      },
      animation: {
        "infinite-scroll": "infinite-scroll 60s linear infinite",
        "infinite-scroll-inverse":
          "infinite-scroll-inverse 60s linear infinite",
      },
      keyframes: {
        "infinite-scroll": {
          from: { transform: "translateX(0)" },
          to: { transform: "translateX(-100%)" },
        },
        "infinite-scroll-inverse": {
          from: { transform: "translateX(-100%)" },
          to: { transform: "translateX(0)" },
        },
      },
      colors: {
        ...colors,
        transparent: "rgba(0,0,0,0)",
      },
    },
    screens: { ...breakpoints },
  },
  safelist: [
    {
      pattern: /^([mp][tbrlxy]?)-.+$/,
      variants: ["sm", "md", "lg", "xl", "2xl"],
    },
    {
      pattern: /^((inline-)?(flex|hidden|block|grid))$/,
      variants: ["sm", "md", "lg", "xl", "2xl"],
    },
    {
      pattern: /^(justify|items|align|self)-.+$/,
      variants: ["sm", "md", "lg", "xl", "2xl"],
    },
    {
      pattern: /^(order)-.+$/,
      variants: ["sm", "md", "lg", "xl", "2xl"],
    },
  ],
  plugins: [require("@tailwindcss/forms")],
};
