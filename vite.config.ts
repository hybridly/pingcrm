// import path from "node:path"
import { defineConfig } from "vite"
import hybridly from "hybridly/vite"
// import hybridlyImports from "hybridly/auto-imports"
// import hybridlyResolver from "hybridly/resolver"
// import autoimport from "unplugin-auto-import/vite"
// import components from "unplugin-vue-components/vite"
// import iconsResolver from "unplugin-icons/resolver"
// import { FileSystemIconLoader } from "unplugin-icons/loaders"
// import icons from "unplugin-icons/vite"

export default defineConfig({
  plugins: [
    hybridly({
      autoImports: {
        eslintrc: {
          enabled: true,
        },
        dirs: ["./resources/scripts"],
      },
    }),
    // icons({
    //   autoInstall: true,
    //   customCollections: {
    //     custom: FileSystemIconLoader("./resources/icons"),
    //   },
    // }),
    // components({
    //   dirs: ["./resources/views/components"],
    //   resolvers: [
    //     hybridlyResolver(),
    //     iconsResolver({
    //       customCollections: ["custom"],
    //     }),
    //   ],
    //   directoryAsNamespace: true,
    //   dts: "resources/types/components.d.ts",
    // }),
    // autoimport({
    //   dts: "resources/types/auto-imports.d.ts",
    //   imports: [
    //     "vue",
    //     "@vueuse/core",
    //     "@vueuse/head",
    //     "vue-i18n",
    //     hybridlyImports,
    //   ],
    //   vueTemplate: true,
    //   dirs: ["./resources/scripts"],
    //   eslintrc: { enabled: true },
    // }),
  ],
  //   resolve: {
  //     alias: {
  //       "@": path.join(process.cwd(), "resources"),
  //     },
  //   },
})
