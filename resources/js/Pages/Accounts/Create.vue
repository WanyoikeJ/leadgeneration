<template>
    <Head title="Create User" />

    <h1 class="text-3xl">Create Account</h1>

    <form @submit.prevent="submit" class="max-w-lg mx-auto mt-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="companyname" class="block text-sm font-medium text-gray-700">Company name</label>
                        <input v-model="form.name" type="text" id="companyname" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for="companyemail" class="block text-sm font-medium text-gray-700">Company email</label>
                        <input v-model="form.email" type="text" name="companyemail" id="companyemail" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" :disabled="form.processing" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>

        </div>
    </form>
</template>

<script setup>
    import { useForm } from "@inertiajs/inertia-vue3";

    let form = useForm({
        name: '',
        email: '',
    });

    let submit = () => {
        form.post('/accounts');
    };
</script>
