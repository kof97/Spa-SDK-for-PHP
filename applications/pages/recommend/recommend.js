import React, { Component } from 'react'

import NavBar from '../../components/navbar/nav'
import Individual from './individual/individual'

export default class Recommend extends Component {
	render() {
		return (
			<div className="app-page-recommend">
				<NavBar />
				<div className="app-page-recommend-container">
					<Individual />
				</div>
			</div>
		)
	}
}