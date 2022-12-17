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
