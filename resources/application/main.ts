import { initializeHybridly } from "hybridly/vue"
import { createHead } from "@vueuse/head"
import { i18n, locale } from "./i18n"
import "virtual:hybridly/router"
import "./tailwind.css"
import { definePlugin } from "hybridly"

initializeHybridly({
  cleanup: !import.meta.env.DEV,
  pages: import.meta.glob("@/views/pages/**/*.vue", { eager: true }),
  enhanceVue: (vue) => {
    locale.value = useProperty("locale").value
    vue.use(createHead()).use(i18n)
  },
  plugins: [
    definePlugin({
      name: "custom:define-locale",
      after() {
        locale.value = useProperty("locale").value
      },
    }),
  ],
})
