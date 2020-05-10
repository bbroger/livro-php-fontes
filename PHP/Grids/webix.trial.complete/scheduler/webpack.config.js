var path = require('path');
var webpack = require("webpack");
var pkg = require("./package.json");

module.exports = function(env) {

  var MiniCssExtractPlugin = require("mini-css-extract-plugin");

  var production = !!(env && env.production === "true");
  var babelSettings = pkg.babel;

  var config = {
    mode: production ? "production" : "development",
    entry: './sources/scheduler.js',
    output: {
      path: path.join(__dirname, 'codebase'),
      publicPath:"/codebase/",
      filename: 'scheduler.js'
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          use: "babel-loader?" + JSON.stringify(babelSettings)
        },
        {
          test: /\.(svg|png|jpg|gif)$/,
          use: 'url-loader?limit=25000'
        },
        {
          test: /\.(less)$/,
          use: [ MiniCssExtractPlugin.loader, "css-loader", "less-loader" ]
        },
        { 
          test: /\.(eot|woff|woff2|ttf|svg)/,
          use: [
            { 
              loader: 'file-loader',
              options:{
                name:"fonts/[name].[ext]",
                publicPath:"./"
              }
            }
          ]
        }
      ]
    },
//    stats:"minimal",
    resolve: {
      extensions: [".js"],
      modules: ["./sources", "node_modules"]
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename:"scheduler.css"
      }),
      new webpack.DefinePlugin({
        VERSION: `"5.4.2"`,
        PRODUCTION : production
      })
    ]
  };

  if (!production){
    config.devtool = 'inline-source-map';
  }

  return config;
};