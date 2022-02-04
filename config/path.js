const pathSrc = "./assets";
const pathDest = "./assets/dist";

export default {
    root: "./assets/dist/app",
    scss: {
        src: pathSrc + "/scss/*.scss",
        watch: pathSrc + "/scss/**/*.scss",
        dest: pathSrc + "/scss"
    },
    css: {
        src: pathSrc + "/scss/*.css",
        watch: pathSrc + "/scss/**/*.css",
        dest: pathDest + "/app"
    },
    js: {
        src: pathSrc + "/js/*.js",
        watch: pathSrc + "/js/**/*.js",
        dest: pathDest + "/app"
    }
}