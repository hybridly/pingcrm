import { defineConfig } from "vitest/config"
import hybridly from "hybridly/vite"

export default defineConfig({
  test: {
    include: ["tests/Vitest/**/*.test.ts"],
  },
  plugins: [
    hybridly({
      laravel: false,
      autoImports: {
        eslintrc: {
          enabled: true,
        },
        dirs: ["./resources/scripts"],
        imports: ["vitest"],
      },
    }),
  ],
})
