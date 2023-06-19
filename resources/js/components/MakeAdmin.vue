<template>
<div>
    <div v-if="userId == 1">
        <button @click="showModal = true" disabled class="hover:opacity-70 text-white font-bold py-2 px-4 border border-blue-700 rounded" style="background-color: #7F167F;">
        To Admin
        </button>
    </div>

    <div v-else>
        <button @click="showModal = true" class="hover:opacity-70 text-white font-bold py-2 px-4 border border-blue-700 rounded" style="background-color: #7F167F;">
        To Admin
        </button>
    </div>

    <div v-if="showModal" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  style="z-index: 999;">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                        <h2 class="text-xl font-bold py-4 ">Warning!</h2>
                        <p class="text-gray-800">Selected User will become an Admin</p>    
                        <p class="text-gray-800 font-semibold">Action is reversible.</p>
                        <p class="text-gray-800 font-semibold">Are you sure?</p>
                    </div>
        <!--footer-->
        <div class="p-3 mt-2 text-center space-x-4 md:block">
            <button @click="showModal = false" class="mb-2 md:mb-0 bg-white hover:opacity-60 px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                No
            </button>
            <button @click="changeRole(userId, userRole)" class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600">Yes</button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {

props:['userId', 'userRole'],

    data() {
        return{
            showModal: false
        }
    },
    
    methods: {
        async changeRole(id, role){
            if(role == 'Admin'){
                this.$toastr.e("User already has administrative priveleges")
            }else{
                let response = await axios.post('/change/role', {
              'id': id,
              'role': "Admin"
              })
              .then(this.$toastr.s("Role Changed"))
              .catch(error => {
              console.log("ERRRR:: ",error.response.data);
              this.$toastr.e("Something went wrong :(")
              });
              setTimeout(()=> {
                        window.location.reload()
                     }, 2500)

                console.log(id)
            }
        }
    },
}
</script>

<style>

</style>