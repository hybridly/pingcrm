import { initializeHybridly } from "hybridly/vue"
import { createHead } from "@vueuse/head"
import { i18n } from "./i18n"
import "virtual:hybridly/router"
import "./tailwind.css"
import { definePlugin } from "hybridly"

initializeHybridly({
  cleanup: !import.meta.env.DEV,
  pages: import.meta.glob("@/views/pages/**/*.vue", { eager: true }),
  enhanceVue: (vue) => {
    vue.use(createHead()).use(i18n)
  },
  plugins: [
    definePlugin({
      name: "custom:set-locale",
      navigated() {
        i18n.global.locale.value = useProperty("locale").value
      },
    }),
  ],
})
