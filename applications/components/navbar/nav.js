import React, { Component } from 'react'

import './style.css'

export default class NavBar extends Component {
	toggleNav(e) {
		let obj = e.target;

		if (obj.nodeName.toLowerCase() === 'li') {
			obj = obj.parentNode;
		}

		if (obj.className === 'native') {
			return;
		}

		let navs = e.currentTarget.getElementsByTagName('a');

		for (let i in navs) {
			if (navs.hasOwnProperty(i)) {
				navs[i].className = '';
			}
		}

		obj.className = 'native';
	}

	render() {
		return (
			<div id="app-nav-bar" onClick={this.toggleNav}>
				<a className="native" href="javascript:void(0)"><li>个性推荐</li></a>
				<a href="javascript:void(0)"><li>歌单</li></a>
				<a href="javascript:void(0)"><li>主播电台</li></a>
				<a href="javascript:void(0)"><li>排行榜</li></a>
			</div>
		)
	}
}