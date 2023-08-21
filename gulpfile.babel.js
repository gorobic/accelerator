import gulp from "gulp";
import yargs from "yargs";
import dartSass from "sass";
import gulpSass from "gulp-sass";
const sass = gulpSass(dartSass);
import cleanCSS from "gulp-clean-css";
import autoprefixer from "gulp-autoprefixer";
import gulpIf from "gulp-if";
import sourcemaps from "gulp-sourcemaps";
import imagemin from "gulp-imagemin";
import del from "del";
import webpack from "webpack-stream";
import named from "vinyl-named";
import zip from "gulp-zip";
import replace from "gulp-replace";
import info from "./package.json";

const PRODUCTION = yargs.argv.prod;

const paths = {
	styles: {
		// all theme style files
		src: ["src/assets/scss/*.scss"],
		dest: "assets/css",
	},
	stylesModules: {
		// all styles imports from node_modules (usually big files)
		src: ["src/assets/scss/modules/*.scss"],
		dest: "assets/css/modules",
	},
	stylesBlocks: {
		// all style files for custom Gutenberg Blocks
		src: "inc/acf-blocks/**/*.scss",
		dest: "inc/acf-blocks",
	},
	images: {
		src: "src/assets/images/**/*.{jpg,jpeg,png,svg,gif}",
		dest: "assets/images",
	},
	scripts: {
		src: ["src/assets/js/*.js"],
		dest: "assets/js",
	},
	other: {
		src: [
			"src/assets/**/*",
			"!src/assets/{images,js,scss}",
			"!src/assets/{images,js,scss}/**/*",
		],
		dest: "assets",
	},
	package: {
		src: [
			"**/*",
			"!.vscode",
			"!node_modules{,/**}",
			"!packaged{,/**}",
			"!src{,/**}",
			"!.babelrc",
			"!.gitignore",
			"!gulpfile.babel.js",
			"!package.json",
			"!package-lock.json",
			"!composer.json",
		],
		dest: "packaged",
	},
};

export const clean = () => del(["assets"]);

export const styles = () => {
	return gulp
		.src(paths.styles.src)
		.pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
		.pipe(sass().on("error", sass.logError))
		.pipe(gulpIf(PRODUCTION, cleanCSS({ compatibility: "ie8" })))
		.pipe(
			autoprefixer({
				cascade: !PRODUCTION ? true : false,
			})
		)
		.pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
		.pipe(gulp.dest(paths.styles.dest));
};

export const stylesModules = () => {
	return gulp
		.src(paths.stylesModules.src)
		.pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
		.pipe(sass().on("error", sass.logError))
		.pipe(gulpIf(PRODUCTION, cleanCSS({ compatibility: "ie8" })))
		.pipe(
			autoprefixer({
				cascade: !PRODUCTION ? true : false,
			})
		)
		.pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
		.pipe(gulp.dest(paths.stylesModules.dest));
};

export const stylesBlocks = () => {
	return gulp
		.src(paths.stylesBlocks.src)
		.pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
		.pipe(sass().on("error", sass.logError))
		.pipe(gulpIf(PRODUCTION, cleanCSS({ compatibility: "ie8" })))
		.pipe(
			autoprefixer({
				cascade: !PRODUCTION ? true : false,
			})
		)
		.pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
		.pipe(gulp.dest(paths.stylesBlocks.dest));
};

export const images = () => {
	return gulp
		.src(paths.images.src)
		.pipe(gulpIf(PRODUCTION, imagemin()))
		.pipe(gulp.dest(paths.images.dest));
};

export const watch = () => {
	gulp.watch(
		["src/assets/scss/**/*.scss", "!src/assets/scss/modules/**/*.scss"],
		styles
	);
	gulp.watch(
		[
			"src/assets/scss/modules/**/*.scss",
			"src/assets/scss/components/_variables.scss",
		],
		stylesModules
	);
	gulp.watch("inc/acf-blocks/**/*.scss", stylesBlocks);
	gulp.watch("src/assets/js/**/*.js", scripts);
	gulp.watch(paths.images.src, images);
	gulp.watch(paths.other.src, copy);
};

export const copy = () => {
	return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const scripts = () => {
	return gulp
		.src(paths.scripts.src)
		.pipe(named())
		.pipe(
			webpack({
				module: {
					rules: [
						{
							test: /\.js$/,
							use: {
								loader: "babel-loader",
								options: {
									presets: ["@babel/preset-env"], //or ['babel-preset-env']
								},
							},
						},
					],
				},
				output: {
					filename: "[name].js",
				},
				externals: {
					jquery: "jQuery",
				},
				devtool: !PRODUCTION ? "inline-source-map" : false,
				mode: PRODUCTION ? "production" : "development",
			})
		)
		.pipe(gulp.dest(paths.scripts.dest));
};

export const compress = () => {
	return gulp
		.src(paths.package.src)
		.pipe(replace("_themename", info.name))
		.pipe(zip(`${info.name}.zip`))
		.pipe(gulp.dest(paths.package.dest));
};

export const dev = gulp.series(
	clean,
	gulp.parallel(styles, stylesModules, stylesBlocks, scripts, images, copy),
	watch
);
export const build = gulp.series(
	clean,
	gulp.parallel(styles, stylesModules, stylesBlocks, scripts, images, copy)
);
export const bundle = gulp.series(build, compress);

export default dev;
