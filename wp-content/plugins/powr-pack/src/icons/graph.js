import React from 'react'

const svgGraph = props => (
  <svg viewBox="0 0 1344 1343" {...props} width="2em" height="2em">
    <defs>
      <linearGradient
        id="graph_svg__b"
        x1={674.33}
        y1={8.34}
        x2={669.66}
        y2={1337.36}
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#60b3fd" />
        <stop offset={0.8} stopColor="#5287df" />
        <stop offset={0.89} stopColor="#5287df" />
      </linearGradient>
      <linearGradient
        id="graph_svg__a"
        x1={376.52}
        y1={1097.43}
        x2={376.52}
        y2={955.92}
        gradientTransform="rotate(-90 469.94 600.5)"
        gradientUnits="userSpaceOnUse"
      >
        <stop offset={0} stopColor="#5287df" />
        <stop offset={1} stopColor="#60b3fd" />
      </linearGradient>
      <linearGradient
        id="graph_svg__c"
        x1={283.65}
        y1={604.7}
        x2={283.65}
        y2={463.2}
        xlinkHref="#graph_svg__a"
      />
      <linearGradient
        id="graph_svg__d"
        x1={357.35}
        y1={852.32}
        x2={357.35}
        y2={710.82}
        xlinkHref="#graph_svg__a"
      />
    </defs>
    <path fill="url(#graph_svg__b)" d="M0 0h1344v1343H0z" data-name="Layer 1" />
    <path fill="#fff" d="M129.88 129.88h1084.25v1084.25H129.88z" />
    <path
      strokeWidth={15}
      stroke="#4b5a73"
      strokeLinecap="round"
      strokeLinejoin="round"
      fill="none"
      d="M280.87 1076.2h783.26"
    />
    <path
      fill="url(#graph_svg__a)"
      strokeWidth={15}
      stroke="#4b5a73"
      strokeLinecap="round"
      strokeLinejoin="round"
      d="M825.36 313.63h141.51v760.59H825.36z"
    />
    <path
      fill="url(#graph_svg__c)"
      strokeWidth={15}
      stroke="#4b5a73"
      strokeLinecap="round"
      strokeLinejoin="round"
      d="M332.64 499.35h141.51v574.87H332.64z"
    />
    <path
      fill="url(#graph_svg__d)"
      strokeWidth={15}
      stroke="#4b5a73"
      strokeLinecap="round"
      strokeLinejoin="round"
      d="M580.25 351.95h141.51v722.27H580.25z"
    />
    <path
      strokeWidth={14}
      stroke="#4b5a73"
      strokeLinecap="round"
      strokeLinejoin="round"
      fill="none"
      d="M279.87 267.8v808.4"
    />
  </svg>
)

export default svgGraph
