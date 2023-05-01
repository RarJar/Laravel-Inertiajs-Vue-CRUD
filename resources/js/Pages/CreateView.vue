<template>
    <div class="bg-purple-200 py-5 h-screen">
        <div class="container mx-auto">

            <h3 class=" font-semibold text-3xl text-purple-700 mb-4">Create User</h3>

            <div class="shadow-md rounded-lg p-5 bg-purple-100">
                
                <form>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " v-model="createData.name"/>
                        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>

                        <p class="text-red-600 mt-3">{{ errors.name }}</p>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="email" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " v-model="createData.email"/>
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>

                        <p class="text-red-600 mt-3">{{ errors.email }}</p>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " v-model="createData.password"/>
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">password</label>

                        <p class="text-red-600 mt-3">{{ errors.password }}</p>
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
        props: ['errors'],
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
