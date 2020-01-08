import React from 'react'

const photoFilter = props => (
  <svg viewBox="0 0 1344 1343" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.photoFilter_svg__cls-2{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:18px}'
        }
      </style>
      <linearGradient
        id="photoFilter_svg__linear-gradient"
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
        id="photoFilter_svg__New_Gradient_Swatch_1"
        x1={187}
        y1={675.92}
        x2={540.75}
        y2={675.92}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
      <linearGradient
        id="photoFilter_svg__New_Gradient_Swatch_1-2"
        x1={260.61}
        y1={600.72}
        x2={1013}
        y2={600.72}
        xlinkHref="#photoFilter_svg__New_Gradient_Swatch_1"
      />
      <linearGradient
        id="photoFilter_svg__New_Gradient_Swatch_1-3"
        x1={349.42}
        y1={372.27}
        x2={493.65}
        y2={372.27}
        xlinkHref="#photoFilter_svg__New_Gradient_Swatch_1"
      />
    </defs>
    <path
      fill="url(#photoFilter_svg__linear-gradient)"
      d="M0 0h1344v1343H0z"
      id="photoFilter_svg__Layer_1"
      data-name="Layer 1"
    />
    <g id="photoFilter_svg__Photo_Filter" data-name="Photo Filter">
      <path
        className="photoFilter_svg__cls-2"
        d="M1013 128.39V828a33 33 0 0 1-33 33H220.08A33.09 33.09 0 0 1 187 828V128.39a33.06 33.06 0 0 1 33.08-33H980a33 33 0 0 1 33 33z"
        transform="translate(72 71)"
      />
      <path
        d="M540.75 861H220.08A33.09 33.09 0 0 1 187 828V490.81z"
        transform="translate(72 71)"
        fill="url(#photoFilter_svg__New_Gradient_Swatch_1)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        d="M1010.21 478.2L1013 828a33 33 0 0 1-33 33H260.61l568.48-520.59z"
        transform="translate(72 71)"
        fill="url(#photoFilter_svg__New_Gradient_Swatch_1-2)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        d="M493.65 372.29a72.12 72.12 0 1 1-72.08-72.11 72.07 72.07 0 0 1 72.08 72.11z"
        transform="translate(72 71)"
        fill="url(#photoFilter_svg__New_Gradient_Swatch_1-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        fill="none"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
        d="M167 1082h1010"
      />
      <circle className="photoFilter_svg__cls-2" cx={1007} cy={1082} r={92} />
    </g>
  </svg>
)

export default photoFilter
