import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import { terser } from 'rollup-plugin-terser';

// Array of input files
const inputFiles = [
    'assets/js/read-more.js',
    'assets/js/main.js',
];

const config = {
  input: inputFiles,
  output: {
    dir: 'assets/js/dist-unused',  // Output directory
    format: 'iife',  // Immediately Invoked Function Expression
    sourcemap: true,
  },
  plugins: [
    resolve(),
    commonjs(),
    terser()  // Minifies the code
  ]
};

export default config;
