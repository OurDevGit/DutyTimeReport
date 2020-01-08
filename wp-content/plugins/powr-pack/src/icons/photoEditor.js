import React from 'react'

const photoEditor = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.photoEditor_svg__cls-1{fill:url(#photoEditor_svg__linear-gradient)}.photoEditor_svg__cls-2,.photoEditor_svg__cls-4{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round}.photoEditor_svg__cls-2{stroke-width:2px}.photoEditor_svg__cls-4{stroke-width:14px}'
        }
      </style>
      <linearGradient
        id="photoEditor_svg__linear-gradient"
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
        id="photoEditor_svg__linear-gradient-3"
        x1={602.68}
        y1={879.31}
        x2={602.68}
        y2={314.33}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
      <linearGradient
        id="photoEditor_svg__linear-gradient-4"
        x1={872.01}
        y1={927.97}
        x2={872.01}
        y2={664.74}
        xlinkHref="#photoEditor_svg__linear-gradient-3"
      />
    </defs>
    <path
      className="photoEditor_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="photoEditor_svg__Background"
    />
    <path
      className="photoEditor_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="photoEditor_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="photoEditor_svg__Photo_Editor" data-name="Photo Editor">
      <rect
        className="photoEditor_svg__cls-2"
        x={145.14}
        y={146.14}
        width={905.73}
        height={905.73}
        rx={31.72}
      />
      <path
        d="M907.42 338.74v516.19A24.32 24.32 0 0 1 883 879.31H322.32a24.39 24.39 0 0 1-24.39-24.38V338.74a24.39 24.39 0 0 1 24.39-24.41H883a24.33 24.33 0 0 1 24.42 24.41z"
        transform="translate(-2 -1)"
        fill="url(#photoEditor_svg__linear-gradient-3)"
        strokeWidth={14}
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
      />
      <path
        className="photoEditor_svg__cls-4"
        d="M559 879.31H322.32a24.39 24.39 0 0 1-24.39-24.38v-248.8z"
        transform="translate(-2 -1)"
      />
      <path
        className="photoEditor_svg__cls-4"
        d="M905.35 596.81l2.07 258.12A24.32 24.32 0 0 1 883 879.31H352.23L771.7 495.14zM507.26 495.14a53.21 53.21 0 1 1-53.2-53.21 53.21 53.21 0 0 1 53.2 53.21z"
        transform="translate(-2 -1)"
      />
      <path
        fill="#fff"
        d="M1027.07 760.9v-42.83l-98.19-98.19-188.19 188.19-17.6-16.27-10.52 44.39-17.05 17.05 10.42 10.41-31.92 131.02 131.38-31.95 10.07 9.77 16.24-16.25 46.93-11.91-17.5-17.51 165.93-165.92z"
      />
      <path
        className="photoEditor_svg__cls-2"
        d="M816.28 926.82l187.35-187.34-74.75-74.74-187.33 187.33-.12-.11-.07.3-.98.98.6.6-23.81 97.69 97.75-23.77.21.21.34-.34 1.31-.32-.5-.49z"
      />
      <path
        fill="url(#photoEditor_svg__linear-gradient-4)"
        strokeWidth={14}
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        d="M815.13 927.97l-74.75-74.73 188.5-188.5 74.75 74.74-188.5 188.49z"
      />
      <path
        className="photoEditor_svg__cls-4"
        d="M816.78 927.31l-99.61 24.22 24.26-99.57 75.35 75.35z"
      />
    </g>
  </svg>
)

export default photoEditor
