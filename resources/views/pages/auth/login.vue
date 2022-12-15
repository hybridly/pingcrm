<template>
    <div
        class="flex items-center justify-center p-6 min-h-screen bg-indigo-800"
    >
        <div class="w-full max-w-md">
            <logo
                class="block mx-auto w-full max-w-xs fill-white"
                height="50"
            />
            <form
                class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden"
                @submit.prevent="form.submit"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold">
                        Welcome Back!
                    </h1>
                    <div class="mt-6 mx-auto w-24 border-b-2" />
                    <text-input
                        v-model="form.fields.email"
                        :error="form.errors.email"
                        class="mt-10"
                        label="Email"
                        type="email"
                        autofocus
                        autocapitalize="off"
                    />
                    <text-input
                        v-model="form.fields.password"
                        :error="form.errors.password"
                        class="mt-6"
                        label="Password"
                        type="password"
                    />
                    <label
                        class="flex items-center mt-6 select-none"
                        for="remember"
                    >
                        <input
                            id="remember"
                            v-model="form.fields.remember"
                            class="mr-1"
                            type="checkbox"
                        />
                        <span class="text-sm">Remember Me</span>
                    </label>
                </div>
                <div
                    class="flex px-10 py-4 bg-gray-100 border-t border-gray-100"
                >
                    <loading-button
                        :loading="form.processing"
                        class="btn-indigo ml-auto"
                        type="submit"
                    >
                        Login
                    </loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
useHead({ title: "Login - Ping CRM" });

const form = useForm<App.Data.LoginData>({
    method: "POST",
    url: route("login"),
    fields: {
        email: "johndoe@example.com",
        password: "secret",
        remember: false,
    },
});
</script>
