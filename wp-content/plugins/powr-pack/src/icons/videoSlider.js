import React from 'react'

const videoSlider = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.videoSlider_svg__cls-1{fill:url(#videoSlider_svg__linear-gradient)}.videoSlider_svg__cls-2,.videoSlider_svg__cls-4{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}.videoSlider_svg__cls-4{fill:none}'
        }
      </style>
      <linearGradient
        id="videoSlider_svg__linear-gradient"
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
        id="videoSlider_svg__linear-gradient-3"
        x1={600}
        y1={725.72}
        x2={600}
        y2={308.7}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
    </defs>
    <path
      className="videoSlider_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="videoSlider_svg__Background"
    />
    <path
      className="videoSlider_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="videoSlider_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="videoSlider_svg__Video_Slider" data-name="Video Slider">
      <path
        className="videoSlider_svg__cls-2"
        d="M1061.87 905.55c0 14.54-13.22 26.33-29.52 26.33h-864.7c-16.3 0-29.52-11.79-29.52-26.33V134.44c0-14.55 13.22-26.32 29.52-26.32h864.7c16.3 0 29.52 11.77 29.52 26.32z"
        transform="translate(-2 -1)"
      />
      <path
        d="M824.93 326.7v381a18 18 0 0 1-18 18H393.07a18 18 0 0 1-18-18v-381a18 18 0 0 1 18-18H807a17.94 17.94 0 0 1 17.93 18z"
        transform="translate(-2 -1)"
        fill="url(#videoSlider_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
      <path
        className="videoSlider_svg__cls-2"
        d="M560.67 588.27l124.82-72.07-124.82-72.05v144.12z"
      />
      <path
        className="videoSlider_svg__cls-4"
        d="M262.28 579.58l-45.23-45.34 45.36-45.21M933.59 580.52l45.36-45.22-45.23-45.33"
      />
      <path
        className="videoSlider_svg__cls-2"
        d="M417.04 1017.87h75.05v75.06h-75.05zM560.48 1017.87h75.05v75.06h-75.05zM703.91 1017.87h75.05v75.06h-75.05z"
      />
    </g>
  </svg>
)

export default videoSlider
