import React from 'react'

const tabs = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.tabs_svg__cls-1{fill:url(#tabs_svg__linear-gradient)}.tabs_svg__cls-2{fill:#fff;stroke:#354051;stroke-width:8px;stroke-miterlimit:10}'
        }
      </style>
      <linearGradient
        id="tabs_svg__linear-gradient"
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
    </defs>
    <path
      className="tabs_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="tabs_svg__Background"
    />
    <path
      className="tabs_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="tabs_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="tabs_svg__Tabs">
      <rect
        className="tabs_svg__cls-2"
        x={682.79}
        y={300.31}
        width={251.69}
        height={172.09}
        rx={28}
      />
      <rect
        className="tabs_svg__cls-2"
        x={411.63}
        y={300.31}
        width={251.69}
        height={172.09}
        rx={28}
      />
      <rect
        className="tabs_svg__cls-2"
        x={167.1}
        y={251.65}
        width={244.53}
        height={718.5}
        rx={28}
      />
      <rect
        className="tabs_svg__cls-2"
        x={334.68}
        y={412.69}
        width={696.22}
        height={557.46}
        rx={28}
      />
      <path fill="#fff" d="M310.72 405.4h97.08v536.75h-97.08z" />
      <path
        stroke="#fff"
        strokeWidth={3}
        strokeMiterlimit={10}
        fill="#fff"
        d="M277.86 437.44h289.9V964.8h-289.9z"
      />
    </g>
  </svg>
)

export default tabs
