const pathSrc = "./assets";
const pathDest = "./assets/dist";

export default {
    root: "./assets/dist",
    scss: {
        src: pathSrc + "/scss/*.scss",
        watch: pathSrc + "/scss/**/*.scss",
        dest: pathSrc + "/scss"
    },
    css: {
        src: pathSrc + "/scss/*.css",
        watch: pathSrc + "/scss/**/*.css",
        dest: pathDest
    },
    js: {
        src: pathSrc + "/js/*.js",
        watch: pathSrc + "/js/**/*.js",
        dest: pathDest
    }
}