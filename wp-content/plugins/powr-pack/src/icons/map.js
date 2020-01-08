import React from 'react'

const map = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.map_svg__cls-1{fill:url(#map_svg__linear-gradient)}.map_svg__cls-2,.map_svg__cls-3{fill:#fff}.map_svg__cls-2{stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}'
        }
      </style>
      <linearGradient
        id="map_svg__linear-gradient"
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
        id="map_svg__linear-gradient-3"
        x1={600}
        y1={797}
        x2={600}
        y2={308.7}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
    </defs>
    <path
      className="map_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="map_svg__Background"
    />
    <path
      className="map_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="map_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="map_svg__Map">
      <path
        className="map_svg__cls-2"
        d="M151.2 127.3a25.07 25.07 0 0 0-25.07 25.06v897.58A25.07 25.07 0 0 0 151.2 1075h897.6a25.07 25.07 0 0 0 25.07-25.06V152.36a25.07 25.07 0 0 0-25.07-25.06z"
        transform="translate(-2 -1)"
      />
      <path
        className="map_svg__cls-2"
        d="M1073.85 398.79v-94.23H894.3V125h-94.24v179.56H399.93V125h-94.24v179.56H126.14v94.23h179.55v400.15H126.14v94.22h179.55v179.55h94.24V893.16h400.13v179.55h94.24V893.16h179.55v-94.22H894.3V398.79zM800.06 798.94H399.93V398.79h400.13z"
        transform="translate(-2 -1)"
      />
      <path
        className="map_svg__cls-3"
        d="M702.07 473.54a103.6 103.6 0 1 1-103.6-103.61 103.6 103.6 0 0 1 103.6 103.61z"
        transform="translate(-2 -1)"
      />
      <path
        className="map_svg__cls-3"
        d="M575.6 841.68c-8-8.77-194.9-215.87-194.9-370.59 0-120.92 98.39-219.3 219.28-219.3s219.23 98.36 219.3 219.27C819.36 610.76 644.9 817.81 625 841l-24.3 28.28z"
        transform="translate(-2 -1)"
      />
      <path
        d="M600 308.7a170.14 170.14 0 0 0-170.14 170.15C429.86 610.1 600 797 600 797s170.19-198.07 170.13-318.15C770.1 384.88 694 308.7 600 308.7zm0 237.53a71.88 71.88 0 1 1 71.89-71.87A71.89 71.89 0 0 1 600 546.23z"
        transform="translate(-2 -1)"
        fill="url(#map_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
    </g>
  </svg>
)

export default map
