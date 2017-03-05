import React, { Component } from 'react'

import Header from './header'
import NavBar from '../components/navbar/nav'
import SlideBanner from '../components/slidebanner/slide'

import './style.css'

export default class App extends Component {
	render() {
		return (
			<div className="app-container">
				<Header />
				<div id="app-pages">
					<NavBar />
					<SlideBanner />
				</div>
				<div>
					testtestsetsetset
				</div>
			</div>
		)
	}
}