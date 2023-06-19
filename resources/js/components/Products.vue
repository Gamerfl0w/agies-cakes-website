<template>
    <div>
  <button @click="showModal = !showModal" class="fixed right-5 z-[9999] bottom-[13%] flex h-16 w-16 cursor-pointer items-center justify-center rounded-full bg-pink-500 shadow-lg">
    <div v-if="showModal == false">
        <i class="fa-solid fa-magnifying-glass text-4xl text-white"></i>
    </div>
    <div v-if="showModal == true">
        <i class="fa-solid fa-x text-4xl text-white"></i>
    </div>
  </button>

  <div v-if="showModal" class="bg-gray-40 fixed top-0 md:top-7 left-0 h-screen w-full text-white z-[999]">
    <div class="flex h-screen w-full items-center justify-center">
      <div class="flex h-3/4 w-[85%] flex-col items-center justify-start rounded-md bg-[#63188f] p-10 opacity-100 md:h-4/5 ">
        <div class="flex items-center justify-center">
          <p class="mr-2 text-xl md:mr-5 md:text-2xl">Search</p>
          <input type="text" class="w- rounded-md p-1 text-black" v-model="keyword" />
        </div>
        <div class="mt-10 flex h-auto items-center justify-center gap-5 flex-row overflow-y-auto text-center flex-wrap">
          <div v-for="product in Products" :key="product.id">
            <div class="flex justify-center flex-col mr-5 md:mr-0">
              <a :href="'/product/' + product.id" class="flex shrink-0 items-center justify-center">
                <img :src="'/storage/' + product.image" alt="" class="h-20 w-20 rounded-xl" />
                <p class="text-xl ml-3 w-1/3">{{ product.name }}</p>
              </a>
            </div>        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
  export default {
    data() {
        return{
            showModal: false,
            keyword: null,
            Products: []
        }
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.Products = res.data)
                .catch(error => {});
        }
    }
  }
  </script>
  
  <style>
  
  </style>