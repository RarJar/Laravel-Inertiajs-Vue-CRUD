<template>
  <div class="bg-purple-200 py-5">
    <div class="container mx-auto">

      <div class="mb-4 flex justify-between items-center">
        <h3 class=" font-semibold text-3xl text-purple-700">User List</h3>
        <a class="bg-purple-800 p-2 cursor-pointer rounded-md text-slate-200 focus:ring-2 focus:ring-purple-500" @click="toCreatePage">Create User</a>
      </div>

      <div class="flex p-4 mb-4 text-blue-800 border-t-4 border-purple-400 bg-blue-50" v-if="message">
          <div class="ml-3 text-sm font-medium">
            {{ message }}
          </div>
          <button class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 h-8 w-8 flex justify-center items-center">
            <i class="fa-solid fa-xmark"></i>
          </button>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                      <th scope="col" class="px-6 py-3">
                          NAME
                      </th>
                      <th scope="col" class="px-6 py-3">
                          EMAIL
                      </th>
                      <th scope="col" class="px-6 py-3">
                          CREATED DATE
                      </th>
                      <th scope="col" class="px-6 py-3">
                          ACTION
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-white border-b hover:bg-gray-50" v-for="(user,index) in users" :key="index">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                         {{ user.id }}
                      </th>
                      <td class="px-6 py-4">
                           {{ user.name }}
                      </td>
                      <td class="px-6 py-4">
                           {{ user.email }}
                      </td>
                      <td class="px-6 py-4">
                             {{ user.created_at }}
                        </td>
                      <td class="px-6 py-4 space-x-5 text-lg">
                        <button class="font-medium text-blue-600 hover:underline" @click="toUpdateUserPage(user.id)">Edit</button>
                        <button class="font-medium text-red-600 hover:underline" @click="deleteUser(user.id)">Delete</button>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>


    </div>
  </div>
</template>

<script>
  export default{
  props: ['users','message'],
    methods: {
      deleteUser (userId) {
        this.$inertia.delete(`/delete/${userId}`);
      },
      toCreatePage() {
        this.$inertia.get('/createPage');
      },
      toUpdateUserPage(userId) {
        this.$inertia.get(`/toUpdateUserPage/${userId}`);
      }
    }
  }
</script>

<style lang="stylus" scoped>

</style>
