import React from 'react'

const countUpTimer = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.countUpTimer_svg__cls-1{fill:url(#countUpTimer_svg__linear-gradient)}.countUpTimer_svg__cls-2{fill:#fff}.countUpTimer_svg__cls-2,.countUpTimer_svg__cls-3{stroke:#4b5a73;stroke-width:15px;stroke-linecap:round}.countUpTimer_svg__cls-2{stroke-linejoin:round}.countUpTimer_svg__cls-3{fill:none;stroke-miterlimit:10}'
        }
      </style>
      <linearGradient
        id="countUpTimer_svg__linear-gradient"
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
        id="countUpTimer_svg__New_Gradient_Swatch"
        x1={474.68}
        y1={335.82}
        x2={465.58}
        y2={598.3}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#60b3fd" />
        <stop offset={1} stopColor="#5287df" />
      </linearGradient>
      <linearGradient
        id="countUpTimer_svg__New_Gradient_Swatch-2"
        x1={597.15}
        y1={619.86}
        x2={597.15}
        y2={674.44}
        xlinkHref="#countUpTimer_svg__New_Gradient_Swatch"
      />
    </defs>
    <path
      className="countUpTimer_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="countUpTimer_svg__Background"
    />
    <path
      className="countUpTimer_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="countUpTimer_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="countUpTimer_svg__Countdown_Timer" data-name="Countdown Timer">
      <path
        className="countUpTimer_svg__cls-2"
        d="M562.31 156.88h69.42v84.27h-69.42z"
      />
      <rect
        className="countUpTimer_svg__cls-2"
        x={529.48}
        y={129.6}
        width={135.09}
        height={48.34}
        rx={22.31}
      />
      <circle
        className="countUpTimer_svg__cls-2"
        cx={600}
        cy={646.82}
        r={422.64}
        transform="rotate(-45 597.786 648.739)"
      />
      <path
        className="countUpTimer_svg__cls-3"
        d="M597.99 1009.59v-58.23M597.99 340.29v-55.77M967.52 645.85h-64.03M292.49 645.85h-63.05M773.28 949.42l-22.54-38.96M445.25 381.19l-22.53-38.97M901.63 821.14l-39.04-22.53M333.4 493.04l-39.05-22.54M901.63 470.5l-39.04 22.54M333.4 798.61l-39.05 22.53M773.28 342.22l-22.54 38.97M445.25 910.46l-22.53 38.96M324.76 645.85h16.72M855.41 645.81l17.77.01M597.03 912.82v11.39"
      />
      <path
        d="M597.15 581c1 0 1.91.1 2.87.15V340.16c-124.63 2.6-213.13 65.31-264.67 153.84l209.07 121.2c7.13-19.2 32.4-34.2 52.73-34.2z"
        transform="translate(-2 -1)"
        fill="url(#countUpTimer_svg__New_Gradient_Swatch)"
        strokeLinejoin="round"
        strokeLinecap="round"
        stroke="#4b5a73"
        strokeWidth={15}
      />
      <path
        d="M622.74 646.81a25.59 25.59 0 1 1-25.59-25.59 25.6 25.6 0 0 1 25.59 25.59z"
        transform="translate(-2 -1)"
        fill="url(#countUpTimer_svg__New_Gradient_Swatch-2)"
        strokeMiterlimit={10}
        stroke="#4b5a73"
        strokeWidth={15}
      />
    </g>
  </svg>
)

export default countUpTimer
