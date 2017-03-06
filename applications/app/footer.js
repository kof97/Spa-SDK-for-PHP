import React, { Component } from 'react'

export default class Footer extends Component {
	constructor() {
		super();

		this.initPorgress();
	}

	initPorgress() {
		let audioPlayer = document.getElementById('audio-player');
		let rate = null;
		
		setInterval(function () {
			if (audioPlayer === null) {
				audioPlayer = document.getElementById('audio-player');
			}

			if (audioPlayer === null || audioPlayer.paused === true) {
				return;
			}

			rate = (audioPlayer.currentTime / audioPlayer.duration) * 100;

			document.getElementById('radio-progress').style.width = rate + '%';
		}, 1000);
	}

	radioPlay(e) {
		let audioPlayer = document.getElementById('audio-player');
		let obj = e.target;

		try	{
			switch (obj.className) {
				case 'radio-play':
					audioPlayer.pause();
					obj.className = 'radio-stop';
					break;

				case 'radio-stop':
					audioPlayer.play();
					obj.className = 'radio-play';
					break;

				default: return;
			}
		} catch (e) {
			console.log('error');
			return;
		}
	}

	render() {
		return (
			<footer className="app-footer">
				<div className="radio-player">
					<div className="radio-pic left">
						<a href="javascript:void(0)"><img src="../pics/default_album.jpg" /></a>
					</div>
					<div className="radio-info left">
						<title>给未来的自己</title>
						<span>Arno</span>
					</div>
					<div className="radio-controller right">
						<a href="javascript:void(0)"><span className="radio-list"></span></a>
						<a href="javascript:void(0)"><span onClick={this.radioPlay} className="radio-stop"></span></a>
						<a href="javascript:void(0)"><span className="radio-next"></span></a>
					</div>
				</div>
				<div id="radio-progress"></div>
				<audio id="audio-player" src="http://m8.music.126.net/20170306113704/0c468ea9e04e955bf64e13be2328d858/ymusic/6dec/fad4/1e55/d543c948ab0d5161d1fa4203396cbcc4.mp3"/>
			</footer>
		)
	}
}
