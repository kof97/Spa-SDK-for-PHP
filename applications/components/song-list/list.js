import React, { Component } from 'react'
import { Link } from 'react-router'

import $ from 'jquery'

import './style.css'

export default class RecommendTitle extends Component {
	constructor(props) {
		super(props);
	}

	getSongList() {
		
	}

	render() {
		let url = this.props.url;

		let items = [];
		$.ajax({  
			type: 'get',
			url: url,
			async: false,
			success: function (data) {
				let name, count, img, id;
console.log(data);
				for (let key in data['playlists']) {
					name = data['playlists'][key]['name'];
					count = data['playlists'][key]['playCount'];
					img = data['playlists'][key]['coverImgUrl'];
					id = data['playlists'][key]['id'];

					if (count > 9999) {
						count = Math.round(count / 10000) + '万';
					}

					items.push(<div className="app-song-list-item">
									<div className="app-song-list-item-pic">
										<span><p>{count}</p></span>
										<Link to={`/list/${id}`}><img src={img} /></Link>
									</div>
									<div className="app-song-list-item-description">
										<span>{name}</span>
									</div>
								</div>);
				}
			}
		});

		return (
			<div className="app-song-list">
				{items}
			</div>
		)
	}
}