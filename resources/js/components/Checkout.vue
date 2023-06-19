<template>
 <div>

    <div class="">
  <div class="flex flex-col items-center justify-center mt-10">
  <p class="text-4xl mt-16">Checkout</p>

  <label for="name" class="flex justify-start items-start w-3/5 mt-3 text-lg">Name</label>
  <input  class="border-2 w-3/5 rounded-lg px-2" type="text" id="name" name="name" v-model="form.name" required autocomplete="name" autofocus>
  <div class="text-red-700" v-if="form.errors.has('name')" v-html="form.errors.get('name')"></div>

  <label for="phonenumber" class="flex justify-start items-start w-3/5 mt-3 text-lg">Phone Number</label>
  <input  class="border-2 w-3/5 rounded-lg px-2" type="text" id="phonenumber" name="phonenumber" v-model="form.phonenumber" required autocomplete="phonenumber" autofocus>
  <div class="text-red-700" v-if="form.errors.has('phonenumber')">Invalid format. Supported formats: 09 or +63</div>

  <label for="country" class="w-3/5 mt-1 hidden">Country</label>
  <input class="hidden" style="display: none;" type="text" id="country" name="country" v-model="form.payment"  autocomplete="country" autofocus>

  <label for="address" class="flex justify-start items-start w-3/5 mt-3 text-lg">Address</label>
  <input class="border-2 w-3/5 rounded-lg px-2" type="text" id="address" name="address" v-model="form.address" required autocomplete="address" autofocus>
  <div class="text-red-700" v-if="form.errors.has('address')" v-html="form.errors.get('address')"></div>

 <!-- <label for="city" class="flex justify-start items-start w-3/5 mt-3 text-lg">Municipality</label> 
  <select class="flex justify-start items-start w-3/5 px-2 rounded-lg border-2" @click="deliveryFee()" v-model="form.city" name="city" id="city">
    <option value="Torrijos" :selected=" form.city == 'Torrijos' ? true : false">Torrijos(P50)</option>
    <option value="Santa Cruz" :selected=" form.city == 'Santa Cruz' ? true : false">Santa Cruz(P80)</option>
  </select> -->

  <label for="city" class="flex justify-start items-start w-3/5 mt-3 text-lg">Barangay</label> 
  <select class="flex justify-start items-start w-3/5 px-2 rounded-lg border-2" @change="deliveryFee()" v-model="form.city" name="city" id="city">
    <option v-for="city in cities" :key="city.id" :selected=" form.city == city.name ? true : false" :value="city.name">{{ city.name }}(P{{ city.price }})</option>
  </select>

  <label for="zipcode" class="flex justify-start items-start w-3/5 mt-3 text-lg">Zip Code</label>
  <input class="border-2 w-3/5 rounded-lg px-2" type="text" id="zipcode" name="zipcode" v-model="form.zipcode" readonly autofocus>
  <div class="text-red-700" v-if="form.errors.has('zipcode')" v-html="form.errors.get('zipcode')"></div>

  <label for="date" class="flex justify-start items-start w-3/5 mt-3 text-lg">Select date to be delivered:</label>
  <input class="border-2 w-3/5 rounded-lg px-2" type="date" id="date" name="date" v-model="form.date" placeholder="Select date">
  <div class="text-red-700" v-if="form.errors.has('date')" v-html="form.errors.get('date')"></div>
</div>

<div class="flex justify-center items-center gap-2 flex-wrap my-5">
    <h1 class="w-full text-center text-3xl">How do you want to pay?</h1>
      <div v-if="removeHalf">
        <input type="radio" :disabled="isHalf" @click="totalInfo = 'Half', halfPayment()" name="pmode" id="half" class="peer hidden" />
      <label
        for="half"
        class="w-32 h-20 border-2 flex justify-center items-center cursor-pointer select-none rounded-xl p-2 text-center 
        peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white"
        >Half Payment</label>
      </div>

   <div>
     <input type="radio" :disabled="isFull" @click="fullPayment(), totalInfo = 'Full'" name="pmode" id="full" class="peer hidden" :checked="isFull" />
      <label
        for="full"
        class="w-32 h-20 flex justify-center items-center cursor-pointer select-none rounded-xl p-2 text-center 
        peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white border-2"
        >Full Payment</label>
   </div>
</div>


<div class="flex justify-center items-center gap-2 flex-wrap my-5">
    <h1 class="w-full text-center text-3xl">Payment Method</h1>
      <div>
        <input type="radio" @click="form.payment = 'GCASH', viewButton = true, removeHalf = true" name="option" id="gcash" class="peer hidden" checked />
      <label
        for="gcash"
        class="w-32 h-20 border-2 flex justify-center items-center cursor-pointer select-none rounded-xl p-2 text-center 
        peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white"
        >Gcash</label>
      </div>

   <div>
     <input type="radio" @change.once="paymaya()" @click="form.payment = 'PayMaya', viewButton = true, removeHalf = true" name="option" id="maya" class="peer hidden" />
      <label
        for="maya"
        class="w-32 h-20 flex justify-center items-center cursor-pointer select-none rounded-xl p-2 text-center 
        peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white border-2"
        >Maya</label>
   </div>

   <div>
     <input type="radio" @click="form.payment = 'Cash on Delivery', viewButton = true, removeHalf = false, fullPayment(), totalInfo = 'Full'" name="option" id="cod" class="peer hidden" />
      <label
        for="cod"
        class="w-32 h-20 flex justify-center items-center cursor-pointer select-none rounded-xl p-2 text-center 
        peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white border-2"
        >Cash on Delivery</label>
   </div>

   <div>
     <input type="radio" @click="form.payment = 'Pick-up', viewButton = true, removeHalf = false, fullPayment(), totalInfo = 'Full'" name="option" id="pickup" class="peer hidden" />
      <label
        for="pickup"
        class="w-32 h-20 flex justify-center items-center cursor-pointer select-none rounded-xl p-2 text-center 
        peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white border-2"
        >Pick-up</label>
   </div>

</div>

<div class="text-center mb-10">
  <p class="text-3xl">Order Total</p>
  <p>Order: P{{ total }}</p>
  <p>Delivery Fee: P{{ fee }}</p>
  <p class="font-bold">Total: P{{ parseInt(total) + fee }}</p>
</div>

<div v-if="viewButton" class="text-center mb-5 flex justify-center items-center">
    <button  @click="checkWhichPayment()" class="flex items-center justify-center h-auto bg-pink-500 hover:bg-pink-600 rounded-md p-4 text-white text-xl w-4/5" type="button">
    <svg v-if="spinner" class="mr-3 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    Pay with {{ form.payment }} ({{ totalInfo }} Payment)
    </button>
</div>

</div>
    

    <div v-if="isValidInfo" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  style="z-index: 999;">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                        <h2 class="text-xl font-bold py-4 ">Important!</h2>
                        <p class="text-black font-bold mb-3">There is strictly no cancellation of orders!</p>
                        <p class="text-gray-800">Agie's Cake Shop will only deliver in these locations:</p>    
                        <p class="text-gray-800 font-semibold">Marinduque</p>
                        <p class="text-gray-800 font-semibold">Torrijos Marinduque</p>
                        <p class="text-gray-800 font-semibold">Santa Cruz Marinduque</p>
                    </div>
        <!--footer-->
        <div class="p-3 mt-2 text-center space-x-4 md:block">
            <button @click="goToHome()" class="mb-2 md:mb-0 bg-white hover:opacity-60 px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                Cancel
            </button>
            <button @click="isValidInfo = false" class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600">I understand</button>
        </div>
      </div>
    </div>
  </div>
       
</div>


</template>

<script>
import Form from 'vform'
const form = new Form({})
const errors = form.errors

export default {
     props: [
    'userName', 'userAddress', 'userPhone', 'userEmail', 'userZip', 
    'userCity', 'clientTotal', 'dateToday', 'errorMessage'
    ],

    data() {
        return{
            form: new Form({
                name: this.userName,
                address: this.userAddress,
                phonenumber: this.userPhone,
                email: this.userEmail,
                zipcode: this.userZip,
                date: '',
                city: this.userCity,
                payment: 'GCASH',
            }),
            payment_id: '',
            id: '',
            other: false,
            paymentIntent: '',
            paymentMethod: '',
            loaded: false,
            viewButton: true,
            otherCheckout: false,
            fee: 50,
            originalTotal: this.clientTotal,
            total: this.clientTotal,
            isHalf: false,
            isFull: true,
            totalInfo: "Full",
            isDisabled: true,
            countDown: 5,
            isValidInfo: true,
            removeHalf: true,
            spinner: false,
            pmId: "",
            gcashRedirect: "",
            mayaRedirect: "",
            response: "",
            cities: [
                { name: 'Bolo', price: 100 },
                { name: 'Bonliw', price: 100 },
                { name: 'Cagpo', price: 150 },
                { name: 'Kay Duke', price: 150 },
                { name: 'Mabuhay', price: 50 },
                { name: 'Malinao', price: 100 },
                { name: 'Marlangga', price: 200 },
                { name: 'Matuyatuya', price: 0 },
                { name: 'Pakaskasan', price: 100 },
                { name: 'Poblacion', price: 250 },
                { name: 'Poctoy', price: 250 },
                { name: 'Suha', price: 50 },

                { name: 'Bagong Silang Pob. (2nd Zone)', price: 300 },
                { name: 'Banahaw Pob. (3rd Zone Pob.)', price: 300 },
                { name: 'Buyabod', price: 250 },
                { name: 'Lapu-lapu Pob. (5th Zone)', price: 300 },
                { name: 'Maharlika Pob. (1st Zone)', price: 300 },
                { name: 'Masaguisi', price: 100 },
                { name: 'Matalaba', price: 250 },
                { name: 'Napo (Malabon)', price: 200 },
                { name: 'Pag-Asa Pob. (4th Zone)', price: 300 },
                { name: 'Tamayo', price: 250 },
                { name: 'Tawiran', price: 200 },
                { name: 'Taytay', price: 150 },
            ]
        }
    },

    created(){
        this.getInfo()
        
    },

    beforeMount(){

        if(this.form.city == "Torrijos"){
                this.fee = 50
            }else if(this.form.city == "Santa Cruz"){
                this.fee = 80
            }

        this.gcash()
    },

    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },

    methods: {

        deliveryFee(){
            for(let i = 0; i < this.cities.length; i++){
                if(this.form.city == this.cities[i].name){
                    this.fee = this.cities[i].price
                }
        
            }
        },



        gcash(){
            var convertedTotal = parseInt(this.total) + this.fee
                const options = {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    Authorization: process.env.MIX_API_KEY
                },
                body: JSON.stringify({
                    data: {
                    attributes: {
                        amount: parseInt(convertedTotal + "00"),
                        redirect: {success: 'https://agies-cakes.website/success', failed: 'https://agies-cakes.website'},
                        billing: {
                        address: {line1: this.form.address, postal_code: this.form.zipcode, city: this.form.city},
                        name: this.form.name,
                        phone: this.form.phonenumber,
                        email: this.form.email
                        },
                        type: 'gcash',
                        currency: 'PHP'
                    }
                    }
                })
                };

                fetch('https://api.paymongo.com/v1/sources', options)
                .then((response) => {
                    return  response.json();
                })
                .then((res) => {
                    var jsonData = JSON.parse(JSON.stringify(res));
                    this.pmId = jsonData.data.id
                    this.gcashRedirect = jsonData.data.attributes.redirect.checkout_url
                })
                .catch(err => console.error(err));
            },

            paymaya(){
                const attach = {
                method: 'POST',
                headers: {
                    accept: 'application/json',
                    'content-type': 'application/json',
                    authorization: process.env.MIX_API_KEY
                },
                body: JSON.stringify({
                    data: {
                    attributes: {
                        payment_method: this.paymentMethod,
                        return_url: 'https://agies-cakes.website/success'
                    }
                    }
                })
                };

                fetch('https://api.paymongo.com/v1/payment_intents/'+ this.paymentIntent +'/attach', attach)
                .then((response) => {
                    return  response.json();
                })
                .then((res) => {
                    var jsonData = JSON.parse(JSON.stringify(res));
                    this.pmId = jsonData.data.id
                    this.mayaRedirect = jsonData.data.attributes.next_action.redirect.url
                })
                // .then(response => response.json())
                // .then(response =>window.location.replace(response.data.attributes.next_action.redirect.url))
                .catch(err => console.error(err));
            },

            getInfo(){
                var convertedTotal = parseInt(this.total) + this.fee
                const mPaymentIntent = {
                    method: 'POST',
                    headers: {
                        accept: 'application/json',
                        'content-type': 'application/json',
                        authorization: process.env.MIX_API_KEY
                    },
                    body: JSON.stringify({
                        data: {
                        attributes: {
                            amount: parseInt(convertedTotal + "00"),
                            payment_method_allowed: ['paymaya'],
                            payment_method_options: {card: {request_three_d_secure: 'any'}},
                            currency: 'PHP',
                            capture_type: 'automatic'
                        }
                        }
                    })
                    };

                    fetch('https://api.paymongo.com/v1/payment_intents', mPaymentIntent)
                    .then(response => response.json())
                    .then(response => this.paymentIntent = response.data.id)
                    .catch(err => console.error(err));

                const paymentMethod = {
                    method: 'POST',
                    headers: {
                        accept: 'application/json',
                        'Content-Type': 'application/json',
                        authorization: process.env.MIX_API_KEY
                    },
                    body: JSON.stringify({data: {attributes: {type: 'paymaya'}}})
                    };
                    fetch('https://api.paymongo.com/v1/payment_methods', paymentMethod)
                    .then(res => res.json())
                    .then(res => this.paymentMethod = res.data.id)
                    .catch(err => console.error(err));
            },    

            checkWhichPayment(){
                if(this.form.payment == "PayMaya"){
                    this.mayaCheckout()
                }else if(this.form.payment == "Paypal"){
                    this.checkout()
                    this.viewButton = false
                    
                }else if(this.form.payment == "GCASH"){
                    this.gcashCheckout()

                }else if(this.form.payment == "Cash on Delivery"){
                    this.checkoutCod()

                }else if(this.form.payment == "Pick-up"){
                    this.checkoutPickUp()
                }

            },

            halfPayment(){
                    this.isHalf = true
                    this.isFull = false
                    this.total = parseInt(this.total) / 2
            },

            fullPayment(){
                    this.isHalf = false
                    this.isFull = true
                    this.total = this.originalTotal
            },

                async gcashCheckout(){
                    const response = await this.form.post('/checkInfo')
                    this.spinner = "true"
                    var totalAmount = parseInt(this.clientTotal) + this.fee
                    await axios.post('cake/checkout', {
                        'id': this.pmId,
                        'address': this.form.address,
                        'name': this.form.name,
                        'phonenumber': this.form.phonenumber,
                        'city': this.form.city,
                        'country': this.form.payment,
                        'zipcode': this.form.zipcode,
                        'date': this.form.date,
                        'shipping': this.fee,
                        'total': totalAmount,
                        'type': this.totalInfo,  
                    }).then(setTimeout(()=> {
                      window.location.href = this.gcashRedirect
                    }, 4000))
                    this.$toastr.s("Redirecting......")
                },

                async mayaCheckout(){
                    const response = await this.form.post('/checkInfo')
                    this.spinner = "true"
                    var totalAmount = parseInt(this.clientTotal) + this.fee
                    await axios.post('cake/checkout', {
                        'id': this.pmId,
                        'address': this.form.address,
                        'name': this.form.name,
                        'phonenumber': this.form.phonenumber,
                        'city': this.form.city,
                        'country': this.form.payment,
                        'zipcode': this.form.zipcode,
                        'date': this.form.date,
                        'shipping': this.fee,
                        'total': totalAmount,
                        'type': this.totalInfo,  
                    }).then(setTimeout(()=> {
                      window.location.href = this.mayaRedirect
                    }, 4000))
                    this.$toastr.s("Redirecting......")
                }, 

            async checkoutCod(){
                const response = await this.form.post('/checkInfo')
                this.spinner = "true"
                var totalAmount = parseInt(this.clientTotal) + this.fee
                    await axios.post('cake/checkout', {
                        'id': "None",
                        'address': this.form.address,
                        'name': this.form.name,
                        'phonenumber': this.form.phonenumber,
                        'city': this.form.city,
                        'country': this.form.payment,
                        'zipcode': this.form.zipcode,
                        'date': this.form.date,
                        'shipping': this.fee,
                        'total': totalAmount,
                        'type': this.totalInfo
                  }).then(setTimeout(()=> {
                      window.location.href = '/success/cod'
                    }, 4000))
        },

        async checkoutPickUp(){
                const response = await this.form.post('/checkInfo')
                this.spinner = "true"
                var totalAmount = parseInt(this.clientTotal) + this.fee
                    await axios.post('cake/checkout', {
                        'id': "None",
                        'address': this.form.address,
                        'name': this.form.name,
                        'phonenumber': this.form.phonenumber,
                        'city': this.form.city,
                        'country': this.form.payment,
                        'zipcode': this.form.zipcode,
                        'date': this.form.date,
                        'shipping': this.fee,
                        'total': totalAmount,
                        'type': this.totalInfo
                  }).then(setTimeout(()=> {
                    window.location.href = '/success/pickup'
                    }, 4000))
        },

        goToHome(){
            window.location.href = '/'
        },
    }

}


 
</script>