import React, { Component } from 'react'

export default class Footer extends Component {
	render() {
		return (
			<footer className="app-footer">
				<div className="radio-player">
					<div className="radio-pic left">
						<img src="../pics/default_album.jpg" />
					</div>
					<div className="radio-info left">
						<title>给未来的自己</title>
						<span>Arno</span>
					</div>
					<div className="radio-controller right">
						<a href="javascript:void(0)"><span className="radio-list"></span></a>
						<a href="javascript:void(0)"><span className="radio-stop"></span></a>
						<a href="javascript:void(0)"><span className="radio-next"></span></a>
					</div>
				</div>
				<div className="radio-progress">

				</div>
			</footer>
		)
	}
}
