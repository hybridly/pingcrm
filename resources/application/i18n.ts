import { createI18n } from "vue-i18n"
import messages from "../i18n/locales.json"

export type MessageSchema = typeof messages["en"]

declare module "vue-i18n" {
  // eslint-disable-next-line @typescript-eslint/no-empty-interface
  export interface DefineLocaleMessage extends MessageSchema {}
}

export const i18n = createI18n<[MessageSchema], keyof typeof messages, false>({
  legacy: false,
  fallbackLocale: "en",
  messages,
})
