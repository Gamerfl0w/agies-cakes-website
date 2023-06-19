<template>
     <div v-if="showModal" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  style="z-index: 999;">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-3xl relative mx-auto my-auto rounded-xl shadow-lg bg-white">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 md:w-16 md:h-16 -m-1 flex items-center text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                        <h2 class="text-[45px] lg:text-3xl font-bold py-4 ">Tip</h2>
                        <p class="text-[35px] lg:text-2xl text-black font-bold">It is recommended to store the cake after receiving it, doing so will let the cake last for a week.</p>    
                    </div>
        <!--footer-->
        <div class="p-3 mt-2 text-center space-x-4 md:block">
            <button @click="showModal = false" class="mb-2 md:mb-0 bg-green-700 text-white hover:opacity-60 px-5 py-2 text-[35px] lg:text-2xl shadow-sm font-medium tracking-wider border rounded-full hover:shadow-lg hover:bg-green-800">
                Thanks
            </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            showModal: true
        }
    }
}
</script>

<style>

</style>