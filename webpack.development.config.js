var nib = require('nib')
var path = require('path')
var webpack = require('webpack')
//  Paths
var buildPath = path.resolve(__dirname, 'resources', 'assets');
var mainPath = path.resolve(__dirname, 'src', 'main.js');

//  Main
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
      preLoaders: [
        { test: /\.js$/, loader: 'eslint', include: path.join(__dirname, 'src'), exclude: path.join(__dirname, 'src/javascript/share/') }
      ],
      loaders: [
        { test: /\.styl$/, loader: 'style!css!stylus?paths[]=./src/styles&paths[]=../../themes/agreable-app-theme/styles&paths[]=./node_modules' },
        { test: /\.json$/, loader: 'json' },
        { test: /\.woff$|.eot$|.svg$|.ttf$|.png$|.gif$|.jpg$|.jpeg$/, loader: 'url?limit=20000' },
        { test: /\.js$/, loader: 'babel', include: path.join(__dirname, 'src') }
      ]
    },
    plugins: [
      new webpack.HotModuleReplacementPlugin(),
      new webpack.DefinePlugin({ __PRODUCTION__: 'false' })
    ],
    resolve: {
      context: __dirname,
      extensions: ['','.js', '.json', '.styl'],
      modulesDirectories: ['widgets', 'javascripts', 'web_modules', 'style-atoms', 'node_modules']
    },
    stylus: {
      use: [nib()]
    }
  }
}
