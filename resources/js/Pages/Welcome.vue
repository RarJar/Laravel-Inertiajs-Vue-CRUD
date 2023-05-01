<template>
  <div class="bg-purple-200 py-5 px-4 md-px-0">
    <div class="container mx-auto space-y-5">

      <div class="flex justify-between items-center">
        <h3 class=" font-semibold text-3xl text-purple-700">User List | <a class="text-lg">Total-({{ users.length }})</a> </h3>
        <a class="bg-purple-800 p-2 cursor-pointer rounded-md text-slate-200 focus:ring-2 focus:ring-purple-500" @click="toCreatePage">Create User</a>
      </div>

      <!-- SearchBar -->
      <form>   
          <label for="default-search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
          <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
              </div>
              <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500" placeholder="Search Name..." v-model="searchData">
              <a type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-purple-700 hover:bg-purple-800 focus:ring-2 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer" @click="searchUser">Search</a>
          </div>
      </form>
      <!-- SearchBar -->

      <!-- Error message -->
      <div class="flex p-4 text-blue-800 border-t-4 border-purple-400 bg-blue-50" v-if="message">
          <div class="ml-3 text-sm font-medium">
            {{ message }}
          </div>
          <button class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 h-8 w-8 flex justify-center items-center">
            <i class="fa-solid fa-xmark"></i>
          </button>
      </div>
      <!-- Error message -->

      <!-- Table -->
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

          <div class="flex p-4 m-4 text-red-600 rounded-md bg-red-50" v-if="users.length == 0">
              <div class="ml-3 text-sm font-medium">
                There is no user !
              </div>
          </div>

      </div>
      <!-- Table -->

    </div>
  </div>
</template>

<script>
  export default{
  props: ['users', 'message','search_value'],
  data () {
    return {
      searchData: this.search_value
    }
  },
    methods: {
      deleteUser (userId) {
        this.$inertia.delete(`/delete/${userId}`);
      },
      toCreatePage() {
        this.$inertia.get('/createPage');
      },
      toUpdateUserPage(userId) {
        this.$inertia.get(`/toUpdateUserPage/${userId}`);
      },
      searchUser() {
        this.$inertia.get(`/searchUser?key=${this.searchData}`);
      }
    }
  }
</script>

<style lang="stylus" scoped>

</style>
