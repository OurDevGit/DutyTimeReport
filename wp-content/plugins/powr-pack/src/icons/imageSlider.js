import React from 'react'

const imageSlider = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.imageSlider_svg__cls-1{fill:url(#imageSlider_svg__linear-gradient)}.imageSlider_svg__cls-2,.imageSlider_svg__cls-4{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}.imageSlider_svg__cls-4{fill:none}'
        }
      </style>
      <linearGradient
        id="imageSlider_svg__linear-gradient"
        x1={601.08}
        y1={7.44}
        x2={596.92}
        y2={1192.97}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#60b3fd" />
        <stop offset={0.8} stopColor="#5287df" />
        <stop offset={0.89} stopColor="#5287df" />
      </linearGradient>
      <linearGradient
        id="imageSlider_svg__linear-gradient-3"
        x1={601}
        y1={732.35}
        x2={601}
        y2={298}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
    </defs>
    <path
      className="imageSlider_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="imageSlider_svg__Background"
    />
    <path
      className="imageSlider_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="imageSlider_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="imageSlider_svg__Image_Slider" data-name="Image Slider">
      <path
        className="imageSlider_svg__cls-2"
        d="M1082.05 916.75c0 15.14-13.76 27.42-30.74 27.42H150.68c-17 0-30.73-12.28-30.73-27.42V113.6c0-15.15 13.76-27.42 30.73-27.42h900.63c17 0 30.74 12.27 30.74 27.42z"
        transform="translate(-2 -1)"
      />
      <path
        d="M835.28 316.77v396.84a18.7 18.7 0 0 1-18.74 18.74H385.47a18.75 18.75 0 0 1-18.74-18.74V316.77A18.75 18.75 0 0 1 385.47 298h431.07a18.7 18.7 0 0 1 18.74 18.77z"
        transform="translate(-2 -1)"
        fill="url(#imageSlider_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
      <path
        className="imageSlider_svg__cls-2"
        d="M567.39 732.35H385.47a18.75 18.75 0 0 1-18.74-18.74V522.33z"
        transform="translate(-2 -1)"
      />
      <path
        className="imageSlider_svg__cls-2"
        d="M833.69 515.17l1.59 198.44a18.7 18.7 0 0 1-18.74 18.74H408.47L731 437zM527.65 437a40.91 40.91 0 1 1-40.9-40.9 40.9 40.9 0 0 1 40.9 40.9z"
        transform="translate(-2 -1)"
      />
      <path
        className="imageSlider_svg__cls-4"
        d="M249.4 561.34l-47.18-47.15 47.18-47.16M948.61 561.34l47.17-47.15-47.17-47.16"
      />
      <path
        className="imageSlider_svg__cls-2"
        d="M410.52 1036.69h78.17v78.18h-78.17zM559.91 1036.69h78.17v78.18h-78.17zM709.31 1036.69h78.17v78.18h-78.17z"
      />
    </g>
  </svg>
)

export default imageSlider
