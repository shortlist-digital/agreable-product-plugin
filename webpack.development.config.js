var webpack = require('webpack')
var nib = require('nib')
var path = require('path')
var ExtractTextPlugin = require("extract-text-webpack-plugin")

var buildPath = path.resolve(__dirname, 'resources', 'assets');
var mainPath = path.resolve(__dirname, 'src', 'main.js');

module.exports = function(port) {
  return {
    entry: [
      'webpack-dev-server/client?http://localhost:' + port,
      'webpack/hot/only-dev-server',
      mainPath
    ],
    output: {
      path: path.join(__dirname, 'dist/'),
      filename: 'app.js',
      publicPath: 'http://localhost:' + port +'/static/'
    },
    module: {
      loaders: [
        { test: /\.styl$/, loader: 'style-loader!css-loader!stylus-loader?paths[]=./src/styles&paths[]=../../themes/agreable-app-theme/styles&paths[]=./node_modules'},
        { test: /\.json$/, loader: 'json-loader' },
        { test: /\.woff$|.eot$|.svg$|.ttf$|.png$|.gif$|.jpg$|.jpeg$/, loader: "url" },
        { test: /\.js$/, loaders: ['babel?presets[]=es2015'], include: path.join(__dirname, "src") }
      ]
    },

    plugins: [
      new webpack.HotModuleReplacementPlugin(),
      new webpack.DefinePlugin({
        __PRODUCTION__: 'false'
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

}
