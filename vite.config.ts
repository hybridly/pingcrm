// import path from "node:path"
import { defineConfig } from "vite"
import hybridly from "hybridly/vite"
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
  ],
})
