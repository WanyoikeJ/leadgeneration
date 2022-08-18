<template>
  <Head :title="` Edit ${user.name}`" />

  <h1 class="text-3xl max-w-lg mx-auto">Edit User {{user.name}}</h1>

  <form @submit.prevent="updateuser" class="max-w-lg mx-auto mt-8 border border-gray-300 p-6 rounded-lg shadow-md">
    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name"> Name </label>

      <input v-model="form.name" class="border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md w-full max-w-lg" type="text" name="name" id="name" required />
      <!-- <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div> -->
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> Email </label>

      <input v-model="form.email" class="border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md w-full max-w-lg" type="email" name="email" id="email" required />

      <!-- <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div> -->
    </div>

    <div class="mb-6">
      <button type="submit" class="bg-blue-400 text-white rounded-lg py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Update</button>
    </div>
  </form>
</template>

<script>
export default{
    props: ['user'],
    data(){
        return{
            form:{
                name: this.user.name,
                email: this.user.email,
                id: this.user.id
            }
        }
    },
    methods:{
        updateuser(){
            this.$inertia.put(`/updateuser/${this.user.id}`, this.form);
        }
    }
//   let props = defineProps({
//     user: Object,
//   //   filters: Object,
//   //   can: Object
//   });

//   let form = useForm({
//     name: this.user.name,
//     email: '',
//   });

//   let updateuser = () => {
//     user.put(`/updateuser${user.id}`);
//   };
}
</script>
