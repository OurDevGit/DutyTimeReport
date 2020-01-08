import React from 'react'

const imageResizer = props => (
  <svg viewBox="0 0 1344 1343" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.imageResizer_svg__cls-6{stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:18px;fill:none}'
        }
      </style>
      <linearGradient
        id="imageResizer_svg__linear-gradient"
        x1={674.33}
        y1={8.34}
        x2={669.66}
        y2={1337.36}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#60b3fd" />
        <stop offset={0.8} stopColor="#5287df" />
        <stop offset={0.89} stopColor="#5287df" />
      </linearGradient>
      <linearGradient
        id="imageResizer_svg__linear-gradient-2"
        x1={136.82}
        y1={836.92}
        x2={533.55}
        y2={836.92}
        xlinkHref="#imageResizer_svg__linear-gradient"
      />
      <linearGradient
        id="imageResizer_svg__linear-gradient-3"
        x1={219.37}
        y1={752.58}
        x2={1063.18}
        y2={752.58}
        xlinkHref="#imageResizer_svg__linear-gradient"
      />
      <linearGradient
        id="imageResizer_svg__linear-gradient-4"
        x1={318.98}
        y1={496.38}
        x2={480.73}
        y2={496.38}
        xlinkHref="#imageResizer_svg__linear-gradient"
      />
    </defs>
    <path
      fill="url(#imageResizer_svg__linear-gradient)"
      d="M0 0h1344v1343H0z"
      id="imageResizer_svg__Layer_1"
      data-name="Layer 1"
    />
    <g id="imageResizer_svg__Image_Resizer" data-name="Image Resizer">
      <path
        d="M1135.18 293.85v784.62a37 37 0 0 1-37 37H245.92a37.1 37.1 0 0 1-37.1-37V293.85a37.08 37.08 0 0 1 37.1-37h852.21a37 37 0 0 1 37.05 37z"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
        fill="#fff"
      />
      <path
        d="M533.55 1044.52H173.92a37.1 37.1 0 0 1-37.1-37v-378.2z"
        transform="translate(72 71)"
        fill="url(#imageResizer_svg__linear-gradient-2)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        d="M1060.05 615.18l3.13 392.29a37 37 0 0 1-37 37H219.37l637.56-583.83z"
        transform="translate(72 71)"
        fill="url(#imageResizer_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        d="M480.73 496.39a80.88 80.88 0 1 1-80.85-80.87 80.85 80.85 0 0 1 80.85 80.87z"
        transform="translate(72 71)"
        fill="url(#imageResizer_svg__linear-gradient-4)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        className="imageResizer_svg__cls-6"
        d="M80.77 200.78c0-84.69 9.66-93 108-93M1037.07 107.77c84.47 6.06 92.08 16.3 85 114.39M173.78 1121c-84.69 0-93-9.66-93-108M1134.61 1020.53c0 84.69-9.67 93-108 93"
        transform="translate(72 71)"
      />
    </g>
  </svg>
)

export default imageResizer
