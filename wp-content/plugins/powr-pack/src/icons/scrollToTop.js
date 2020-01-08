import React from 'react'

const scrollToTop = props => (
  <svg viewBox="0 0 1200 1200" {...props} width="2em" height="2em">
    <defs>
      <style>
        {'.scrollToTop_svg__cls-4{fill:#333;stroke:#333;stroke-miterlimit:10}'}
      </style>
      <linearGradient
        id="scrollToTop_svg__linear-gradient"
        x1={602.08}
        y1={7.46}
        x2={597.91}
        y2={1194.96}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#60b3fd" />
        <stop offset={0.8} stopColor="#5287df" />
        <stop offset={0.89} stopColor="#5287df" />
      </linearGradient>
    </defs>
    <path
      fill="url(#scrollToTop_svg__linear-gradient)"
      d="M0 0h1200v1200H0z"
      id="scrollToTop_svg__Background"
    />
    <ellipse
      cx={601.28}
      cy={600}
      rx={387.5}
      ry={388.25}
      strokeWidth={10}
      fill="#fff"
      stroke="#4b5a73"
      strokeLinecap="round"
      strokeLinejoin="round"
      id="scrollToTop_svg__Layer_4"
      data-name="Layer 4"
    />
    <g id="scrollToTop_svg__Layer_1" data-name="Layer 1">
      <path
        className="scrollToTop_svg__cls-4"
        d="M840.26 716.4l1.23-1c22.08-18.4 24.93-49.15 6.37-68.67l-203.25-213.8c-18.56-19.52-51.51-20.43-73.6-2l-1.22 1c-22.09 18.41-24.94 49.15-6.38 68.68l203.25 213.76c18.57 19.53 51.52 20.44 73.6 2.03z"
      />
      <path
        className="scrollToTop_svg__cls-4"
        d="M358.1 705.49l1 1.22c18.6 21.92 49.36 24.52 68.73 5.79l212-205.07c19.36-18.73 20-51.69 1.4-73.62l-1-1.21c-18.59-21.93-49.36-24.52-68.73-5.79l-212 205.07c-19.36 18.73-19.99 51.69-1.4 73.61z"
      />
    </g>
  </svg>
)

export default scrollToTop
