import gulp from "gulp";

// Конфигурация и пути
import path from "./config/path.js";
import app from "./config/app.js";

// Импорт задач
import jsBuild from "./tasks/jsBuild.js";
import scssBuild from "./tasks/scssBuild.js";
import clear from "./tasks/clear.js";

//Наблюдатель
const watcher = () => {
     gulp.watch(path.js.watch, jsBuild);
    gulp.watch(path.scss.watch, scssBuild);
};

// Задачи
export { jsBuild };
export { scssBuild };
export { clear };

// Сборка
const build = gulp.series (
    clear,
    gulp.parallel(scssBuild, jsBuild),
);
const dev = gulp.series (
    build,
    gulp.parallel(watcher),
);

export default app.isProd ? build : dev;