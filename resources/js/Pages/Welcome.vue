<template>
  <div class="bg-purple-200 py-5">
    <div class="container mx-auto">

      <h3 class=" font-semibold text-3xl text-purple-700 mb-4">User List</h3>

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
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
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
  export default {
  props: ['users'],
    methods: {
      deleteUser (userId) {
        this.$inertia.delete(`/delete/${userId}`);
      }
    }
  }
</script>

<style lang="stylus" scoped>

</style>
