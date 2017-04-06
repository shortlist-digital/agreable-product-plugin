var extractTextPlugin = require('extract-text-webpack-plugin')
var fs = require('fs')
var nib = require('nib')
var path = require('path')
var webpack = require('webpack')
//  Paths
var buildPath = path.resolve(__dirname, 'resources', 'assets')
var mainPath = path.resolve(__dirname, 'src', 'main.js')

//  Main
module.exports = {
  entry: {
    app: mainPath
  },
  output: {
    path: buildPath,
    filename: '[name].[hash].js',
    publicPath: ''
  },
  module: {
    loaders: [
      { test: /\.styl$/, loader: extractTextPlugin.extract('style', 'css!stylus?paths[]=./src/styles&paths[]=../../themes/agreable-app-theme/styles&paths[]=./node_modules'
        ) },
      { test: /\.svg$/, loader: 'raw', exclude: '/node_modules/' },
      { test: /\.json$/, loader: 'json' },
      { test: /\.woff$|.eot$|.svg$|.ttf$|.png$|.gif$|.jpg$|.jpeg$/, loader: 'url?limit=20000' },
      { test: /\.js$/, loader: 'babel', include: path.join(__dirname, 'src') }
    ]
  },
  plugins: [
    new extractTextPlugin('style.[contenthash].css'),
    new webpack.optimize.DedupePlugin(),
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.optimize.UglifyJsPlugin({ compress: { warnings: false } }),
    new webpack.DefinePlugin({ __PRODUCTION__: 'true' }),
    function () {
      this.plugin('done', function (stats) {
        fs.writeFileSync(
          path.join(__dirname, './', 'stats.json'),
          JSON.stringify(stats.toJson())
        )
      })
    }
  ],
  resolve: {
    context: __dirname,
    extensions: ['', '.js', '.json', '.styl'],
    modulesDirectories: ['widgets', 'javascripts', 'web_modules', 'style-atoms', 'node_modules']
  },
  stylus: {
    use: [nib()]
  }
}
