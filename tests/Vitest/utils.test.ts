describe("uid", () => {
    it("subsequent UUIDs are different", () => {
        const uid1 = uid();
        const uid2 = uid();
        expect(uid1).not.toBe(uid2);
    });
});

describe("mapValuesToNull", () => {
    const object = { a: 1, b: 2 };
    const refObject = ref({ a: 1, b: 2 });

    it("should map all values to null", () => {
        const actual = mapValuesToNull(object);
        expect(actual).toStrictEqual({ a: null, b: null });
    });

    it("should return identical results when passing an object ref versus a plain object", () => {
        const plainActual = mapValuesToNull(object);
        const refActual = mapValuesToNull(refObject);
        expect(refActual).toStrictEqual(plainActual);
    });

    it("should return an empty object when passing an empty object", () => {
        const actual = mapValuesToNull({});
        expect(actual).toStrictEqual({});
    });
});

describe("pickDefinedValues", () => {
    const object = { a: 1, b: undefined, c: null, d: "", e: 0 };
    const refObject = ref({ a: 1, b: undefined, c: null, d: "", e: 0 });

    it("should map all values to null", () => {
        const actual = pickDefinedValues(object);
        expect(actual).toStrictEqual({ a: 1 });
    });

    it("should return identical results when passing an object ref versus a plain object", () => {
        const plainActual = pickDefinedValues(object);
        const refActual = pickDefinedValues(refObject);
        expect(refActual).toStrictEqual(plainActual);
    });

    it("should return an empty object when passing an empty object", () => {
        const actual = pickDefinedValues({});
        expect(actual).toStrictEqual({});
    });
});
