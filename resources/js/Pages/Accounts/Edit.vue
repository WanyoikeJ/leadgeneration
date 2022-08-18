<template>
    <Head :title="` Edit ${acount.name}`" />

    <h1 class="text-3xl max-w-lg mx-auto">Edit Account {{acount.name}}</h1>

    <form @submit.prevent="updateaccount" class="max-w-lg mx-auto mt-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="companyname" class="block text-sm font-medium text-gray-700">Company name</label>
                        <input v-model="form.name" type="text" id="companyname" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for="companyemail" class="block text-sm font-medium text-gray-700">Company email</label>
                        <input v-model="form.email" type="text" name="companyemail" id="companyemail" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div> -->
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" :disabled="form.processing" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>

        </div>
    </form>

</template>

<script>
export default{
    props: ['acount'],
    data(){
        return{
            form:{
                name: this.acount.name,
                email: this.acount.email,
                id: this.acount.id
            }
        }
    },
    methods:{
        updateaccount(){
            this.$inertia.put(`/updateaccount/${this.acount.slug}`, this.form);
        }
    }
}
</script>
