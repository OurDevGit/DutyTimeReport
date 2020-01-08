import React from 'react'

const paypalButton = props => (
  <svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
    <defs>
      <style>
        {
          '.paypalButton_svg__cls-1{fill:url(#paypalButton_svg__linear-gradient)}'
        }
      </style>
      <linearGradient
        id="paypalButton_svg__linear-gradient"
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
      className="paypalButton_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="paypalButton_svg__Background"
    />
    <path
      className="paypalButton_svg__cls-1"
      d="M0 0h1198v1198H0z"
      id="paypalButton_svg__Background_copy"
      data-name="Background copy"
    />
    <g id="paypalButton_svg__PayPal_Button" data-name="PayPal Button">
      <path
        d="M969.74 490.58c-6.2-50.31-36-81.36-68.47-100.48a317.46 317.46 0 0 0-1.3-88C878.51 164.55 691.12 162.53 688.3 162.54l-312.92-1.35c-12.31-.17-29.7 14-31.7 26.13l-113.2 724.55c-2.82 17 3.87 30.85 21.46 30.85h167.71l12.69-77.31-23.42 148.42c-2.17 13.18 6 27 16.44 27h152.95c9.72 0 20.45-12.28 21.42-18.2l34.59-195.32c2.69-20.13 15.47-30.14 24.86-31.48 3.82-.54 62.43-2.94 75.1-3.41 161.72-6 254.24-149.57 235.46-301.84z"
        transform="translate(-2 -1)"
        fill="#fff"
      />
      <path
        d="M249.94 941.72c-17.59 0-24.28-13.8-21.46-30.85l113.2-724.55c2-12.14 19.39-26.3 31.7-26.13l312.92 1.35h0c2.82 0 190.21 2 211.67 139.53 26.76 171.38-87.87 360.24-337.21 348.2h-1l-68.65-1c-12.19-.18-27.41 13.06-30.51 31.88l-42.95 261.57z"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
        fill="none"
      />
      <path
        d="M423.36 1039.86c-10.41 0-18.61-13.85-16.44-27L507.2 377.4c1.65-10.55 11.33-14.81 21.43-18.31l277.33.09c28.81-.09 147 10.8 161.78 130.4C986.52 641.85 894 785.42 732.28 791.45c-12.67.47-71.28 2.87-75.1 3.41-9.39 1.34-22.17 11.35-24.86 31.48l-34.59 195.32c-1 5.92-11.7 18.2-21.42 18.2z"
        fill="#94cdff"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
      <path
        d="M899.28 389.07c.22-1.8.28-3.62.48-5.43-37.15-21.37-78.34-24.51-93.8-24.46l-277.33-.09c-10.1 3.5-19.78 7.76-21.43 18.31l-76.86 487 30.25-184.32c3.1-18.82 18.32-32.06 30.51-31.88l68.65 1h1C767.63 659.26 881.67 531 899.28 389.07z"
        fill="#cfe9ff"
        stroke="#4b5a73"
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth={14}
      />
    </g>
  </svg>
)

export default paypalButton
