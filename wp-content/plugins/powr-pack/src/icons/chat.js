import React from 'react'

const chat = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.chat_svg__cls-1{fill:url(#chat_svg__linear-gradient)}.chat_svg__cls-2,.chat_svg__cls-3{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}.chat_svg__cls-3{fill:none}'
        }
      </style>
      <linearGradient
        id="chat_svg__linear-gradient"
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
        id="chat_svg__linear-gradient-3"
        x1={855.38}
        y1={996.67}
        x2={855.38}
        y2={867.14}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
    </defs>
    <path
      className="chat_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="chat_svg__Background"
    />
    <path
      className="chat_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="chat_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="chat_svg__Facebook_Chat" data-name="Facebook Chat">
      <path
        className="chat_svg__cls-2"
        d="M261.85 150.11H942.2c22.08 0 40 19.23 40 43v433.47c0 23.72-17.89 42.94-40 42.94H736.38l4.78 116.64-170.35-116.64h-309c-22.07 0-40-19.22-40-42.94V193.07c.08-23.73 17.97-42.96 40.04-42.96z"
        transform="translate(-2 -1)"
      />
      <path
        className="chat_svg__cls-3"
        d="M341.36 278.67h511.28M341.36 358.17h511.28M341.36 437.68h511.28M341.36 516.69h399.66"
      />
      <path
        className="chat_svg__cls-2"
        d="M984.14 924.24a128.76 128.76 0 1 1-128.76-128.76 128.76 128.76 0 0 1 128.76 128.76z"
        transform="translate(-2 -1)"
      />
      <path
        d="M906.9 918.66a51.47 51.47 0 0 1-20.6 41.22c-4.1 3.09 3.18 36.79 3.18 36.79s-28-26.49-34.1-26.49a51.52 51.52 0 1 1 51.52-51.52z"
        transform="translate(-2 -1)"
        fill="url(#chat_svg__linear-gradient-3)"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
    </g>
  </svg>
)

export default chat
