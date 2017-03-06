var path = require('path');
var fs = require('fs');
var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var autoprefixer = require('autoprefixer');
var OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
// var lessToJs = require('less-vars-to-js');

// var entries = {};
// fs.readdirSync('./applications')
// 	.filter(function(m) {
// 		return fs.statSync(path.join('./applications', m)).isDirectory();
// 	})
// 	.forEach(function(m) {
// 		entries[m] = './applications/' + m + '/index.jsx';
// 	});

// change theme
// var theme = require('./theme/config.json').theme;
// var themer = theme !== '' ? lessToJs(fs.readFileSync(path.join(__dirname, `./theme/${theme}`), 'utf8')) : {};

// var chunks = Object.keys(entries);
var webpackConfig = {

	context: __dirname,

	entry: {
		'js': './applications/index.jsx'
	},

	output: {
		path: 'public',
		filename: 'js/script.min.js',
		// publicPath: 'public/'
	},

	module: {
		loaders: [{
			test: /\.js(.*)$/,
			exclude: /node_modules|moment/,
			loader: 'babel',
			query: {
				cacheDirectory: process.env.NODE_ENV !== 'production'
			}
		}, {
			test: /\.json$/,
			loader: 'json-loader'
		}, /*{
			test: /\.less$/,
			loader: ExtractTextPlugin.extract(
				`css!postcss-loader!less-loader?{"sourceMap":true,"modifyVars":${JSON.stringify(themer)}}`
			)
		},*/ {
			test: /\.css$/,
			loader: ExtractTextPlugin.extract(
				'css!postcss-loader'
			)
		}, {
			test: /\.(gif|jpg|png|woff|svg|eot|ttf)\??.*$/,
			loader: 'url-loader?limit=50000&name=[path][name].[ext]'
		}]
	},

	postcss: function() {
		return [autoprefixer];
	},

	plugins: [
		// new webpack.optimize.CommonsChunkPlugin({
		// 	name: 'vendors', // 将公共模块提取，生成名为`vendors`的chunk
		// 	chunks: chunks,
		// 	minChunks: chunks.length // 提取所有entry共同依赖的模块
		// }),
		new ExtractTextPlugin({
			filename: 'style.min.css',
			allChunks: true
		}),
		new webpack.optimize.UglifyJsPlugin({
			minimize: true,
			compress: {
				warnings: false,
			},
			except: ['$super', '$', 'exports', 'require']
		}),
		new OptimizeCssAssetsPlugin({
			assetNameRegExp: /\.min\.css$/,
			cssProcessorOptions: { discardComments: { removeAll: true } }
		}),
		new webpack.DefinePlugin({
			'process.env': {
				NODE_ENV: JSON.stringify('production')
			}
		})
	],

	resolve: {
		extensions: ['', '.jsx', '.js'],
		root: './',
		alias: {
			'react': __dirname + '/node_modules/react',
			'react-dom': __dirname + '/node_modules/react-dom'
		}
	},

	externals: {
		jquery: 'window.$'
	}
};

module.exports = webpackConfig;