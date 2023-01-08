import { defineConfig } from "vitest/config"
import autoimport from "unplugin-auto-import/vite"
import hybridlyImports from "hybridly/auto-imports"

export default defineConfig({
  test: {
    include: ["tests/Vitest/**/*.test.ts"],
  },
  plugins: [
    autoimport({
      dts: "tests/Vitest/auto-imports.d.ts",
      imports: [
        "vue",
        "@vueuse/core",
        "@vueuse/head",
        "vitest",
        hybridlyImports,
      ],
      vueTemplate: true,
      dirs: ["./resources/scripts"],
    }),
  ],
})
