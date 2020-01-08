import React from 'react'

const notificationBar = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.notificationBar_svg__cls-1{fill:url(#notificationBar_svg__linear-gradient)}.notificationBar_svg__cls-6{stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px;fill:none}'
        }
      </style>
      <linearGradient
        id="notificationBar_svg__linear-gradient"
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
        id="notificationBar_svg__linear-gradient-3"
        x1={263.81}
        y1={633.18}
        x2={263.81}
        y2={530.72}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
      <linearGradient
        id="notificationBar_svg__linear-gradient-4"
        x1={380.14}
        y1={701.41}
        x2={380.14}
        y2={455.59}
        xlinkHref="#notificationBar_svg__linear-gradient-3"
      />
      <linearGradient
        id="notificationBar_svg__linear-gradient-5"
        x1={291.73}
        y1={717.99}
        x2={291.73}
        y2={632.18}
        xlinkHref="#notificationBar_svg__linear-gradient-3"
      />
    </defs>
    <path
      className="notificationBar_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="notificationBar_svg__Background"
    />
    <path
      className="notificationBar_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="notificationBar_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="notificationBar_svg__Notification_Bar" data-name="Notification Bar">
      <path
        d="M1009.86 398h-821.7c-28.75 0-52.06 25.06-52.06 55.94v290.11c0 30.9 23.31 56 52.06 56h821.7c28.75 0 52-25 52-56V453.94c.04-30.88-23.25-55.94-52-55.94z"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
        fill="#fff"
      />
      <path
        d="M265.84 530.72c-28.88 0-52.31 25.21-52.31 51.23s23.43 51.23 52.31 51.23h48.24V530.86z"
        transform="translate(-2 -1)"
        fill="url(#notificationBar_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
      <path
        d="M434.69 455.59A14.35 14.35 0 0 0 420.34 470v6c-28.76 26.82-70 57.12-109.11 54.85v102.33c37-4 81.31 25.62 109.11 49.43v4.45a14.36 14.36 0 0 0 28.71 0V470a14.37 14.37 0 0 0-14.36-14.41z"
        transform="translate(-2 -1)"
        fill="url(#notificationBar_svg__linear-gradient-4)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
      <path
        fill="url(#notificationBar_svg__linear-gradient-5)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
        d="M261.04 632.18l29.36 85.81h32.01l-28.4-85.81h-32.97z"
      />
      <path
        className="notificationBar_svg__cls-6"
        d="M487.72 543.91c14 22.05 14 54.05 0 76.09M507.1 512.65c25.54 40.17 25.54 98.45 0 138.6"
        transform="translate(-2 -1)"
      />
      <path
        className="notificationBar_svg__cls-6"
        d="M622.14 511.65h324.74M620.42 574.57h326.46M620.42 637.49h326.46M620.42 700.41h202.6"
      />
    </g>
  </svg>
)

export default notificationBar
