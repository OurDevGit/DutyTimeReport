import React from 'react'

const popup = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.popup_svg__cls-1{fill:url(#popup_svg__linear-gradient)}.popup_svg__cls-2,.popup_svg__cls-3{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}.popup_svg__cls-3{fill:none}'
        }
      </style>
      <linearGradient
        id="popup_svg__linear-gradient"
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
        id="popup_svg__linear-gradient-3"
        x1={598.26}
        y1={542.08}
        x2={598.26}
        y2={327.25}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
    </defs>
    <path
      className="popup_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="popup_svg__Background"
    />
    <path
      className="popup_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="popup_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="popup_svg__Popup">
      <path
        className="popup_svg__cls-2"
        d="M1028 204.21H172c-31.43 0-56.91 27.38-56.91 61.14v669.3c0 33.77 25.48 61.14 56.91 61.14h856c31.42 0 56.88-27.37 56.88-61.14v-669.3c-.01-33.76-25.47-61.14-56.88-61.14z"
        transform="translate(-2 -1)"
      />
      <path
        className="popup_svg__cls-2"
        d="M493.52 802.4h208.97v68.04H493.52z"
      />
      <path
        className="popup_svg__cls-3"
        d="M286.74 630.5h623.04M286.23 696.92h623.55"
      />
      <path
        fill="url(#popup_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
        d="M598.26 327.25l34.9 70.71 78.05 11.34-56.47 55.06 13.33 77.72-69.81-36.69-69.81 36.69 13.34-77.72-56.48-55.06 78.05-11.34 34.9-70.71z"
      />
      <path
        className="popup_svg__cls-3"
        d="M944.63 268.91l75.79 75.78M1020.43 268.91l-75.78 75.78"
      />
    </g>
  </svg>
)

export default popup
