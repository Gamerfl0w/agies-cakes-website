<template>
  <div class="flex justify-center items-center flex-col py-8 gap-10">
    <div class="flex gap-5 sm:gap-10">
        <p class="text-2xl sm:text-5xl">{{ text }} Sales</p>
        <button @click="(sales = !sales, handleSales())" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ btn }} Sales ></button>
    </div>

    <main v-if="sales" class="w-3/5 h-3/5 text-white">
        <div class="flex flex-row justify-between bg-pink-500 rounded-lg">
            <div class="px-8 py-8 text-base sm:text-xl lg:text-2xl flex justify-center items-center">
                <p>Month of December</p>    
            </div>
            <div class="w-20 sm:w-32 py-8 flex flex-col justify-center items-center flex-shrink-0 text-sm sm:text-xl lg:text-2xl bg-pink-700 rounded-r-lg">
                <p>Sales Total</p>
                <p>P120.00</p>
            </div>
        </div>
    </main>

    <main v-for="daily in daily" :key="daily.id" v-else class="w-3/5 h-3/5 text-white">
        <div class="flex flex-row justify-between bg-pink-500 rounded-lg">
            <div class="flex flex-col px-8 py-8 text-base sm:text-xl lg:text-2xl flex">
                <p>Name: {{ daily.name }}</p>
                <p>Order: {{ orders }}</p>    
            </div>
            <div class="w-20 sm:w-32 py-8 flex flex-col justify-center items-center flex-shrink-0 text-sm sm:text-xl lg:text-2xl bg-pink-700 rounded-r-lg">
                <p>Total</p>
                <p>P{{ daily.total }}.00</p>
            </div>
        </div>
    </main>
</div>
</template>

<script>
export default {
    created() {
        this.getDailySales()
        this.getMonthlySales()
    },
    props: ['orders'],
    data() {
        return{
            text: 'Daily',
            btn: 'Monthly',
            sales: false,
            daily: [],
            monthly: []
        }
    },
    methods: {
        //Montly = true, daily = false
        handleSales(){
            if(this.sales == false){
                this.text = 'Daily'
                this.btn = 'Monthly'
            }else{
                this.text = 'Monthly'
                this.btn = 'Daily'
            }
        },

        async getDailySales(){
            let response = await axios.get('/admin/get/daily');
            this.daily = response.data
            console.log(this.daily[0].items.item);
        },

        async getMonthlySales(){
            let response = await axios.get('/admin/get/monthly');
            this.monthly = response.data
        },
    }

}
</script>

<style>

</style>