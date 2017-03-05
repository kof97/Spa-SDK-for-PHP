import React, { Component } from 'react'

import Header from './header'
import Footer from './footer'
import Recommend from '../pages/recommend/recommend'

import './style.css'

export default class App extends Component {
	render() {
		return (
			<div className="app-container">
				<Header />
				<div id="app-pages">
					<Recommend />
				</div>
				<Footer />
			</div>
		)
	}
}