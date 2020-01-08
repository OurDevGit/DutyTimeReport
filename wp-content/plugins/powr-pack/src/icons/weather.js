import React from 'react'

const weather = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.weather_svg__cls-1{fill:url(#weather_svg__linear-gradient)}.weather_svg__cls-2,.weather_svg__cls-3{fill:none;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}.weather_svg__cls-3{fill:#fff}'
        }
      </style>
      <linearGradient
        id="weather_svg__linear-gradient"
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
      className="weather_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="weather_svg__Background"
    />
    <path
      className="weather_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="weather_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="weather_svg__Weather">
      <path
        className="weather_svg__cls-2"
        d="M759.03 802.99V741.7M880.32 289.11l30.63-53.07M880.32 709.24l30.63 53.06M1001.55 499.17h61.32M637.76 289.11l-30.63-53.07M1022.16 651.07l-53.04-30.6M548.97 377.87l-53.04-30.61M516.51 499.15h-61.29M1022.16 347.26l-53.06 30.63M495.91 651.07l53.04-30.62M759.03 256.66v-61.31M637.73 709.23l-30.62 53.05"
      />
      <path
        className="weather_svg__cls-3"
        d="M931.49 500.2A170.47 170.47 0 1 1 761 329.72 170.46 170.46 0 0 1 931.49 500.2z"
        transform="translate(-2 -1)"
      />
      <path
        className="weather_svg__cls-3"
        d="M928.39 797.42c0-113.91-92.35-206.25-206.26-206.25-4.72 0-9.32.38-14 .68a253.42 253.42 0 0 0-206-105.54c-122.73 0-225.09 87.09-248.68 202.88-67.16 19.11-116.4 80.8-116.4 154.09a160.37 160.37 0 0 0 160.38 160.37h445.14v-1c104.31-10.28 185.82-98.24 185.82-205.23z"
        transform="translate(-2 -1)"
      />
      <path
        className="weather_svg__cls-2"
        d="M297.51 1003.65a160.37 160.37 0 1 1 54.27-311.32M644.51 606.28a205.48 205.48 0 0 1 77.62-15.11c113.91 0 206.26 92.34 206.26 206.25S836 1003.65 722.13 1003.65M298 682.91a159.25 159.25 0 0 1 159.22 159.24"
        transform="translate(-2 -1)"
      />
    </g>
  </svg>
)

export default weather
