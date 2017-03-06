import React, { Component } from 'react'

export default class Footer extends Component {
	constructor(props) {
		super(props);

		this.progress = null;

		this.updatePorgress = this.updatePorgress.bind(this);
		this.radioPlay = this.radioPlay.bind(this);
	}

	updatePorgress(audioPlayer) {
		this.progress = setInterval(function () {
			if (audioPlayer === null) {
				audioPlayer = document.getElementById('audio-player');
			}

			if (audioPlayer === null || audioPlayer.paused === true) {
				return;
			}

			console.log(audioPlayer.paused);
		}, 1000);
	}

	radioPlay(e) {
		let audioPlayer = document.getElementById('audio-player');
		let obj = e.target;

		switch (obj.className) {
			case 'radio-play':
				obj.className = 'radio-stop';

				clearInterval(this.progress);
				audioPlayer.pause();
				break;

			case 'radio-stop':
				obj.className = 'radio-play';

				this.updatePorgress(audioPlayer);
				audioPlayer.play();
				break;

			default: return;
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
				<audio id="audio-player" src="http://m8.music.126.net/20170306093357/e385526f3bf1a8e09334de602709b69a/ymusic/14b1/e12d/933e/a25b20007f534181f024c3a7b6941f4e.mp3"/>
			</footer>
		)
	}
}
