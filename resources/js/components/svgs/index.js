import github from "./Github.vue";
import linkedIn from "./LinkedIn.vue";
import darkMode from "./DarkMode.vue";
import lightMode from "./LightMode.vue";
import html from "./Html.vue";
import css from "./Css.vue"

const techIcons = {
    html: {icon: html, name: 'HTML'},
    css: {icon: css, name: 'CSS'},
};

export {
    github,
    linkedIn,
    darkMode,
    lightMode,
    techIcons,
};