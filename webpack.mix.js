const mix = require('laravel-mix');

// const path = require("path");
// module.exports = {
//   entry: './src/index.ts',
//   module: {
//     rules: [
//       {
//         test: /\.ts?$/,
//         use: 'ts-loader',
//         exclude: /node_modules/,
//       },
//     ],
//   },
//   resolve: {
//     extensions: ['.tsx', '.ts', '.js'],
//   },
//   output: {
//     filename: 'bundle.js',
//     path: path.resolve(__dirname, 'dist'),
//   },
//   devServer: {
//     static: path.join(__dirname, "dist"),
//     compress: true,
//     port: 4000,
//   },
// }

mix.ts("resources/js/app.ts", "public/js")
  .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
  ]);

mix.disableNotifications();
