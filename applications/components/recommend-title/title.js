import React, { Component } from 'react'

import './style.css'

export default class RecommendTitle extends Component {
	constructor(props) {
		super(props);
	}

	render() {
		let title;

		switch (this.props.type) {
			case 'recommend':
				title = <span><img src="../pics/logo-recommend.png" />推荐歌单</span>;
				break;

			case '':

				break;

			default: ;
		}


		return (
			<div className="app-recommend-title">
				{title}
			</div>
		)
	}
}