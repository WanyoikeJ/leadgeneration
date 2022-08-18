<template>
    <Head title="Create Agent" />

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl tracking-tight font-bold text-gray-900">Create New Agent</h1>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <form @submit.prevent="submit" class="border-4 border-dashed border-gray-200 rounded-lg p-4">
                    <div class="grid grid-cols-6 gap-6 mb-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" v-model="form.name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
                        </div>

                    </div>

                    <div class="-mx-4 -mb-4 px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button :disabled="form.processing" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>                    
                </form>
            </div>
        </div>
    </main>

</template>

<script>
    export default {
        layout: 'admin',
    };
</script>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
  name: '',
});

let submit = () => {
  form.post('/agents');
};
</script>
