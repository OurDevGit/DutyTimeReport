import React from 'react'

const menu = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.menu_svg__cls-1{fill:url(#menu_svg__linear-gradient)}.menu_svg__cls-2,.menu_svg__cls-3{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}.menu_svg__cls-3{fill:none}'
        }
      </style>
      <linearGradient
        id="menu_svg__linear-gradient"
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
        id="menu_svg__linear-gradient-3"
        x1={595.98}
        y1={907.51}
        x2={595.98}
        y2={850.25}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
      <linearGradient
        id="menu_svg__linear-gradient-4"
        x1={595.98}
        y1={994.08}
        x2={595.98}
        y2={953.86}
        xlinkHref="#menu_svg__linear-gradient-3"
      />
    </defs>
    <path
      className="menu_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="menu_svg__Background"
    />
    <path
      className="menu_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="menu_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="menu_svg__Menu">
      <path
        className="menu_svg__cls-2"
        d="M819.56 1102.87H246.29V238.98l573.27-133.71v997.6z"
      />
      <path
        className="menu_svg__cls-2"
        d="M246.29 238.98H949.7v863.89H246.29z"
      />
      <circle className="menu_svg__cls-3" cx={598} cy={542.14} r={208.61} />
      <path
        className="menu_svg__cls-3"
        d="M524.42 481.79c0 .68-.18 1.34-.18 2 0 19.21 13.32 34.77 29.77 34.77s29.77-15.56 29.77-34.77c0-.7-.14-1.36-.18-2z"
        transform="translate(-2 -1)"
      />
      <path
        className="menu_svg__cls-3"
        d="M522.42 480.79V426.6M552.01 475.5v-48.9M581.6 480.79V426.6M552.01 523.73v147.24M662.44 531.91v139.06"
      />
      <path
        className="menu_svg__cls-3"
        d="M664.44 420.35c-20.61 17.88-34.09 46.9-34.09 79.75s13.48 61.87 34.09 79.74z"
        transform="translate(-2 -1)"
      />
      <path
        fill="url(#menu_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
        d="M401.03 850.25h389.9v57.26h-389.9z"
      />
      <path
        fill="url(#menu_svg__linear-gradient-4)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
        d="M482.83 953.86h226.31v40.22H482.83z"
      />
    </g>
  </svg>
)

export default menu
