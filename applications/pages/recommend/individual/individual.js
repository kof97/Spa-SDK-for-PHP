import React, { Component } from 'react'

import SlideBanner from '../../../components/slidebanner/slide'
import RecommendTitle from '../../../components/recommend-title/title'
import SongList from '../../../components/song-list/list'

export default class Recommend extends Component {
	render() {
		return (
			<div className="app-page-recommend-individual">
				<SlideBanner />
				<RecommendTitle type="recommend" />
				<SongList url="http://musicapi.duapp.com/api.php?type=topPlayList&cat=全部&offset=0&limit=9" />
			</div>
		)
	}
}