import { initializeHybridly } from "hybridly/vue";
import { createHead } from "@vueuse/head";
import "virtual:hybridly/router";
import "./tailwind.css";

initializeHybridly({
    cleanup: !import.meta.env.DEV,
    pages: import.meta.glob("@/views/pages/**/*.vue", { eager: true }),
    enhanceVue: (vue) => {
        vue.use(createHead());
    },
});
