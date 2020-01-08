import React from 'react'

const jobBoard = props => (
	<svg viewBox="0 0 1198 1198" {...props} width="2em" height="2em">
		<defs>
			<style>
				{
					'.jobBoard_svg__cls-1{fill:url(#jobBoard_svg__linear-gradient)}.jobBoard_svg__cls-2{fill:#fff;stroke:#4b5a73;stroke-linecap:round;stroke-linejoin:round;stroke-width:14px}'
				}
			</style>
			<linearGradient
				id="jobBoard_svg__linear-gradient"
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
				id="jobBoard_svg__linear-gradient-3"
				x1={601}
				y1={836.25}
				x2={601}
				y2={443.54}
				gradientUnits="userSpaceOnUse"
			>
				<stop offset={0} stopColor="#5287df" />
				<stop offset={1} stopColor="#60b3fd" />
			</linearGradient>
			<linearGradient
				id="jobBoard_svg__linear-gradient-4"
				x1={601}
				y1={655.28}
				x2={601}
				y2={443.54}
				xlinkHref="#jobBoard_svg__linear-gradient-3"
			/>
		</defs>
		<path
			className="jobBoard_svg__cls-1"
			d="M0 0h1198v1198H0z"
			id="jobBoard_svg__Background"
		/>
		<path
			className="jobBoard_svg__cls-1"
			d="M0 0h1198v1198H0z"
			id="jobBoard_svg__Background_copy"
			data-name="Background copy"
		/>
		<g id="jobBoard_svg__Job_Board" data-name="Job Board">
			<rect
				className="jobBoard_svg__cls-2"
				x={171}
				y={168.36}
				width={860}
				height={865.28}
				rx={31.75}
			/>
			<path
				fill="url(#jobBoard_svg__linear-gradient-3)"
				stroke="#4b5a73"
				strokeLinecap="round"
				strokeLinejoin="round"
				strokeWidth={14}
				d="M325.02 443.54h551.97v392.71H325.02z"
			/>
			<path
				fill="url(#jobBoard_svg__linear-gradient-4)"
				stroke="#4b5a73"
				strokeLinecap="round"
				strokeLinejoin="round"
				strokeWidth={14}
				d="M325.02 443.54h551.97v211.74H325.02z"
			/>
			<path
				d="M682.42 443.54H519.57v-34.36A43.42 43.42 0 0 1 563 365.75h76a43.42 43.42 0 0 1 43.43 43.43z"
				fill="none"
				stroke="#4b5a73"
				strokeLinecap="round"
				strokeLinejoin="round"
				strokeWidth={14}
			/>
			<path
				className="jobBoard_svg__cls-2"
				d="M645.1 680.26a40.15 40.15 0 1 1-80.3 0v-24h80.3z"
				transform="translate(-2 -1)"
			/>
		</g>
	</svg>
)

export default jobBoard
