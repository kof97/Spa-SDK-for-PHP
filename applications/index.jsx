import 'babel-polyfill'
import React from 'react'
import ReactDOM from 'react-dom'
import { Route, Router, Link, hashHistory } from 'react-router'

import App from './app/app'
import PageNotFound from './404/404'


ReactDOM.render(
	<Router history={hashHistory} >
		<Route path="/" component={App}>
			<Route path="list/:id" component={PageNotFound} />
		</Route>
		<Route path="*" component={PageNotFound} />
	</Router>,
	document.getElementById('root')
)