<template>
    <Head :title="` Edit ${lead.source}`" />

    <form @submit.prevent="updatelead" class="max-w-6xl mx-auto mt-8">
        <h1 class="text-3xl mb-2">Edit lead for: {{lead.account.name}}</h1>

        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="companyname" class="block text-sm font-medium text-gray-700">Account</label>
                        <select id="companyname" v-model="form.accounts_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select account</option>
                            <option v-for="acc in acount.data" :key="acc.id" :value="acc.id">{{acc.name}}</option>
                        </select>
                        <!-- <div v-if="form.errors.accounts_id" v-text="form.errors.accounts_id" class="text-red-500 text-sm mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="source" class="block text-sm font-medium text-gray-700">Source</label>
                        <input v-model="form.source" type="text" id="source" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- <div v-if="form.errors.source" v-text="form.errors.source" class="text-red-500 text-sm mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Lead details</label>
                        <input v-model="form.description" type="text" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- <div v-if="form.errors.description" v-text="form.errors.description" class="text-red-500 text-sm mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="stage" class="block text-sm font-medium text-gray-700">Stage</label>
                        <select id="stage" v-model="form.stage" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select stage</option>
                            <option v-for="(st, i) in stages" :key="i" :value="st">{{st}}</option>
                        </select>
                        <!-- <div v-if="form.errors.stage" v-text="form.errors.stage" class="text-red-500 text-sm mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="timeline" class="block text-sm font-medium text-gray-700">Timelines</label>
                        <input v-model="form.timeline" type="text" id="timeline" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- <div v-if="form.errors.timeline" v-text="form.errors.timeline" class="text-red-500 text-sm mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="startdate" class="block text-sm font-medium text-gray-700">Start date</label>
                        <input v-model="form.startdate" type="date" id="startdate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- <div v-if="form.errors.startdate" v-text="form.errors.startdate" class="text-red-500 text-sm mt-1"></div> -->
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <input v-model="form.amount" type="number" id="amount" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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

<script>
export default{
    props: ['lead', 'acount', 'stages'],
    data(){
        return{
            form:{
                accounts_id: this.lead.account.id,
                description: this.lead.description,
                stage: this.lead.stage,
                source: this.lead.source,
                timeline: this.lead.timeline,
                startdate: this.lead.startdate,
                amount: this.lead.amount,
                id: this.lead.id
            }
        }
    },
    methods:{
        updatelead(){
            this.$inertia.put(`/lead/${this.lead.id}`, this.form);
        }
    }
}
</script>
