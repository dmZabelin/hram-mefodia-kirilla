const isProd = process.argv.includes("--production");
const isDev = !isProd;

export default {
    isProd: isProd,
    isDev: isDev,
    sass: {
        includePaths: "./node_modules/"
    },
    autoprefixer: {
        cascade: isProd
    },
    cleanCSS: {
        level: 2
    },
    rename: {
        suffix: ".min",
        extname: ".css"
    },
    renameJS: {
        suffix: ".min",
        extname: ".js"
    },
    webpack: {
        mode: isProd ? "production" : "development"
    }
}