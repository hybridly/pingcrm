import { Ref } from "vue";

export const uid = () =>
    Date.now().toString(36) + Math.random().toString(36).substring(2);

export function mapValuesToNull<T extends object>(
    object: T | Ref<T>
): { [P in keyof T]: null } {
    return Object.entries(unref(object)).reduce(
        (previousValue, [key]) => ({
            ...previousValue,
            [key]: null,
        }),
        {} as { [P in keyof T]: null }
    );
}

export function pickDefinedValues<T extends object>(object: T): Partial<T> {
    return Object.entries(object).reduce((previousValue, [key, value]) => {
        if (value)
            previousValue = Object.assign(previousValue, { [key]: value });
        return previousValue;
    }, {} as Partial<T>);
}
