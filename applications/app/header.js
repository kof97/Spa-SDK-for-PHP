import React, { Component } from 'react'

export default class Header extends Component {
	toggleClick(e) {
		let obj = e.target;
		let replace = '-native';

		if (obj.className.indexOf(replace) != -1) {
			return;
		}

		let navs = e.currentTarget.getElementsByTagName('span');

		for (let i in navs) {
			if (navs.hasOwnProperty(i)) {
				navs[i].className = navs[i].className.replace(replace, '');
			}
		}

		obj.className = obj.className + replace;
	}

	render() {
		return (
			<header className="app-header">
				<span className="app-sidebar-button left"></span>
				<div id="app-nav" onClick={this.toggleClick}>
					<span className="app-recommend-native"></span>
					<span className="app-user"></span>
					<span className="app-dynamic"></span>
				</div>
				<span className="app-search right"></span>
			</header>
		)
	}
}
