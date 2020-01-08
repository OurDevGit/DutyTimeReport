import React from 'react'

const microblog = props => (
  <svg viewBox="0 0 1344 1343" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.microblog_svg__cls-2,.microblog_svg__cls-3{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:18px}.microblog_svg__cls-3{fill:none}'
        }
      </style>
      <linearGradient
        id="microblog_svg__linear-gradient"
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
        id="microblog_svg__linear-gradient-2"
        x1={393.82}
        y1={601}
        x2={393.82}
        y2={179.95}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
    </defs>
    <path
      fill="url(#microblog_svg__linear-gradient)"
      d="M0 0h1344v1343H0z"
      id="microblog_svg__Layer_1"
      data-name="Layer 1"
    />
    <g id="microblog_svg__Microblog">
      <rect
        className="microblog_svg__cls-2"
        x={167}
        y={166}
        width={1010}
        height={1010}
        rx={38.13}
      />
      <path
        className="microblog_svg__cls-3"
        d="M1116.25 978h-888.5M1122.25 864h-900.5M1127.21 494H761M1127.21 385.7H761"
      />
      <path
        d="M620.92 198.14v384.69A18.13 18.13 0 0 1 602.75 601H184.88a18.18 18.18 0 0 1-18.17-18.17V198.14A18.18 18.18 0 0 1 184.88 180h417.87a18.13 18.13 0 0 1 18.17 18.14z"
        transform="translate(72 71)"
        fill="url(#microblog_svg__linear-gradient-2)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={18}
      />
      <path
        className="microblog_svg__cls-2"
        d="M361.23 601H184.88a18.18 18.18 0 0 1-18.17-18.17V397.41z"
        transform="translate(72 71)"
      />
      <path
        className="microblog_svg__cls-2"
        d="M619.38 390.47l1.54 192.36A18.13 18.13 0 0 1 602.75 601H207.18l312.6-286.3zM322.71 314.7a39.66 39.66 0 1 1-39.65-39.65 39.64 39.64 0 0 1 39.65 39.65z"
        transform="translate(72 71)"
      />
      <path
        className="microblog_svg__cls-3"
        d="M1110.25 1104h-888.5M1127.21 614H761M1122.25 738h-900.5M1127.21 272H761"
      />
    </g>
  </svg>
)

export default microblog
