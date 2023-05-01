<template>
    <div class="bg-purple-200 py-5 h-screen">
        <div class="container mx-auto">

            <h3 class=" font-semibold text-3xl text-purple-700 mb-4">Create User</h3>

            <div class="flex p-4 mb-4 text-blue-800 border-t-4 border-purple-400 bg-blue-50" v-if="message">
                <div class="ml-3 text-sm font-medium">
                    {{ message }}
                </div>
                <button
                    class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 h-8 w-8 flex justify-center items-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="shadow-md rounded-lg p-5 bg-purple-100">
                
                <form>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " v-model="createData.name"/>
                        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="email" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " v-model="createData.email"/>
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " v-model="createData.password"/>
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">password</label>
                    </div>

                    <Link href="/" class="text-white bg-blue-700 hover:bg-ble-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me-4">Back</Link>

                    <a class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer" @click="createUser">Create</a>
                </form>

            </div>


        </div>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/vue3'
    export default {
        components: {
            Link
        },
        data () {
            return {
                createData: {
                    name: '',
                    email: '',
                    password:''
                }
            }
        },
        methods: {
            createUser () {
                this.$inertia.post('/createUser', this.createData);
            }
        }
    }
</script>

<style lang="stylus" scoped>

</style>
