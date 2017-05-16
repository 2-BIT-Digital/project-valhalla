const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  context: path.resolve(__dirname, './craft/templates'),
  entry: {
    main: './_js/main.js',
  },
  output: {
    path: path.resolve(__dirname, './public/dist'),
    filename: '[name].bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: [/node_modules/],
        use: [{
          loader: 'babel-loader',
          options: { presets: ['es2015'] }
        }],
      },
      {
        test: /\.sass$/,
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          loader: "css-loader!sass-loader",
        }),
      },
    ],
  },
  plugins: [
    new ExtractTextPlugin({
      filename: '[name].bundle.css',
      allChunks: true,
    }),
  ],
};