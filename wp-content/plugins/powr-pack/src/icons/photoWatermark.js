import React from 'react'

const photoWatermark = props => (
  <svg viewBox="0 0 1344 1343" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.photoWatermark_svg__cls-2{fill:#fff;stroke:#4b5a73;stroke-width:18px;stroke-linecap:round;stroke-linejoin:round}'
        }
      </style>
      <linearGradient
        id="photoWatermark_svg__linear-gradient"
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
        id="photoWatermark_svg__linear-gradient-2"
        x1={136.82}
        y1={822.76}
        x2={533.55}
        y2={822.76}
        xlinkHref="#photoWatermark_svg__linear-gradient"
      />
      <linearGradient
        id="photoWatermark_svg__linear-gradient-3"
        x1={219.37}
        y1={738.42}
        x2={1063.18}
        y2={738.42}
        xlinkHref="#photoWatermark_svg__linear-gradient"
      />
      <linearGradient
        id="photoWatermark_svg__linear-gradient-4"
        x1={318.98}
        y1={482.22}
        x2={480.73}
        y2={482.22}
        xlinkHref="#photoWatermark_svg__linear-gradient"
      />
    </defs>
    <path
      fill="url(#photoWatermark_svg__linear-gradient)"
      d="M0 0h1344v1343H0z"
      id="photoWatermark_svg__Layer_1"
      data-name="Layer 1"
    />
    <g id="photoWatermark_svg__Photo_Watermark" data-name="Photo Watermark">
      <path
        className="photoWatermark_svg__cls-2"
        d="M1063.18 208.73v784.54a37 37 0 0 1-37 37.11H173.89a37.13 37.13 0 0 1-37.07-37.11V208.73a37.11 37.11 0 0 1 37.07-37.11h852.25a37 37 0 0 1 37.04 37.11z"
        transform="translate(72 71)"
      />
      <path
        className="photoWatermark_svg__cls-2"
        d="M1063.18 208.7v784.61a37 37 0 0 1-37 37H173.92a37.1 37.1 0 0 1-37.1-37V208.7a37.08 37.08 0 0 1 37.1-37.06h852.21a37 37 0 0 1 37.05 37.06z"
        transform="translate(72 71)"
      />
      <path
        d="M533.55 1030.36H173.92a37.1 37.1 0 0 1-37.1-37v-378.2z"
        transform="translate(72 71)"
        fill="url(#photoWatermark_svg__linear-gradient-2)"
        strokeLinecap="round"
        strokeLinejoin="round"
        stroke="#4b5a73"
        strokeWidth={18}
      />
      <path
        d="M1060.05 601l3.13 392.29a37 37 0 0 1-37 37H219.37l637.56-583.81z"
        transform="translate(72 71)"
        fill="url(#photoWatermark_svg__linear-gradient-3)"
        strokeLinecap="round"
        strokeLinejoin="round"
        stroke="#4b5a73"
        strokeWidth={18}
      />
      <path
        d="M480.73 482.23a80.88 80.88 0 1 1-80.85-80.87 80.85 80.85 0 0 1 80.85 80.87z"
        transform="translate(72 71)"
        fill="url(#photoWatermark_svg__linear-gradient-4)"
        strokeLinecap="round"
        strokeLinejoin="round"
        stroke="#4b5a73"
        strokeWidth={18}
      />
      <circle
        cx={979.75}
        cy={371.11}
        r={218.89}
        strokeMiterlimit={10}
        stroke="#4b5a73"
        strokeWidth={18}
        fill="#fff"
      />
      <text
        transform="translate(859.34 486.7)"
        fontSize={333.48}
        fill="#4b5a73"
        fontFamily="ArialMT,Arial"
      >
        {'C'}
      </text>
    </g>
  </svg>
)

export default photoWatermark
