var webpack = require('webpack')
var nib = require('nib')
var path = require('path')
var ExtractTextPlugin = require("extract-text-webpack-plugin")

var buildPath = path.resolve(__dirname, 'resources', 'assets');
var mainPath = path.resolve(__dirname, 'src', 'main.js');

console.log(buildPath)

module.exports = {
  entry: mainPath,
  output: {
    path: buildPath,
    filename: 'app.js',
    publicPath: ''
  },
  module: {
    loaders: [
      { test: /\.styl$/, loader: ExtractTextPlugin.extract('style', 'css!stylus?paths[]=./src/styles&paths[]=../../themes/agreable-app-theme/styles&paths[]=./node_modules')},
      { test: /\.svg$/, exclude:'/node_modules/', loader: 'raw-loader' },
      { test: /\.json$/, loader: 'json-loader' },
      { test: /\.woff$|.eot$|.svg$|.ttf$|.png$|.gif$|.jpg$|.jpeg$/, loader: "url" },
      { test: /\.js$/, loader: 'babel?presets[]=es2015', include: path.join(__dirname, "src") }
    ]
  },

  plugins: [
    new ExtractTextPlugin('styles.css'),
    new webpack.optimize.DedupePlugin(),
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.optimize.UglifyJsPlugin({
      compress: { warnings: false }
    }),
    new webpack.DefinePlugin({
      __PRODUCTION__: 'true'
    })
  ],

  resolve: {
    context: __dirname,
    extensions: ['','.js', '.json', '.styl'],
    modulesDirectories: [
      'widgets', 'javascripts', 'web_modules', 'style-atoms', 'node_modules'
    ]
  },

  stylus: {
    use: [nib()]
  }
}
