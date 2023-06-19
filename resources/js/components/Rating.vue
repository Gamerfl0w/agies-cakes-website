<template>
<div>

    <div>
        <div v-if="!reviewExists">
            <button @click="showModal = true" class="text-2xl text-green-600 underline">+ Add Review</button>
        </div>

        <div v-if="reviewExists">
            <button @click="showModal = true, modifyModal()" class="text-2xl text-green-600 underline">Edit Review</button>
        </div>
    </div>
    
  <div v-if="showModal" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  style="z-index: 999;">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center items-center">
            <svg v-if="showEditIcon" viewBox="0 0 24 24" class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="edit"> <g> <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <polygon fill="none" points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon> </g> </g> </g> </g></svg>
                <svg v-if="!showEditIcon" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                        <h2 class="text-xl font-bold py-4">{{ title }}</h2>
                        <p class="text-gray-800 font-semibold">Reviews are public and it shares your name info.</p> 
                        <div class="rate flex justify-center items-center flex-row-reverse mt-1">
                            <input @click="form.rating = 5" type="radio" id="star5" name="rating" value="5" />
                            <label for="star5" title="5 stars">5 star</label>
                            <input @click="form.rating = 4" type="radio" id="star4" name="rating" value="4" />
                            <label for="star4" title="4 stars">4 stars</label>
                            <input @click="form.rating = 3" type="radio" id="star3" name="rating" value="3" />
                            <label for="star3" title="3 stars">3 stars</label>
                            <input @click="form.rating = 2" type="radio" id="star2" name="rating" value="2" />
                            <label for="star2" title="2 stars">2 stars</label>
                            <input @click="form.rating = 1" type="radio" id="star1" name="rating" value="1" />
                            <label for="star1" title="1 star">1 star</label>
                        </div>  
                        <div class="flex flex-col justify-center items-center">
                            <input type="hidden" name="name" v-model="userName">
                            <textarea v-if="showEditIcon" class="border-2 p-1" v-model="userReview" name="detail" id="" cols="50" rows="5" 
                            placeholder="Describe the product (optional)"></textarea>
                            <textarea v-if="!showEditIcon" class="border-2 p-1" v-model="form.detail" name="detail" id="" cols="50" rows="5" 
                            placeholder="Describe the product (optional)"></textarea>
                        </div>
                    </div>
        <!--footer-->
        <div class="p-3 mt-2 text-center space-x-4 md:block">
            <button @click="showModal = false" class="mb-2 md:mb-0 bg-white hover:opacity-60 px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                Cancel
            </button>
            <button @click="addReview()" class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 
                text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg 
                hover:bg-green-600">
                {{ btnText }}
            </button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import Form from 'vform'
const form = new Form({})

export default {
    props:['userName', 'guest', 'product', 'reviewExists', 'review'],

    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },

    data(){
        return{
            showModal: false,
            title: 'Rate This Product',
            userReview: this.review,
            showEditIcon: false,
            btnText: "Post",
            form: new Form({
                name: this.userName,
                detail: '',
                rating: 0,
                productName: this.product,
            })
        }
    },
    
    methods: {
        async addReview(){
            if (this.btnText != "Edit") {
                if (this.guest == true) {
                this.$toastr.e("Please Log in First");
                } else if(this.form.rating == 0) {
                    this.$toastr.e("Please select a Rating");
                } else {
                    await axios.post('/add-review', {
                        'name': this.form.name,
                        'detail': this.form.detail,
                        'rating': this.form.rating,
                        'product': this.form.productName,
                    }).then(setTimeout(()=> {
                          window.location.reload()
                        }, 4000))  
                    .then(this.$toastr.s("Review Added"))
                    .catch(error => {
                    console.log("ERRRR:: ",error.response.data);
                    this.$toastr.e("Something went wrong :(")
                    });    
                }
            } else {
                this.updateReview();
            }
            
        },

        modifyModal(){
            this.title = "Edit Review";
            this.showEditIcon = true;
            this.btnText = "Edit"
        },

        async updateReview(){
            if(this.form.rating != 0){
                await axios.post('/update-review', {
                    'name': this.form.name,
                    'detail': this.userReview,
                    'rating': this.form.rating,
                    'product': this.form.productName,
                }).then(this.btnText = "Please wait...")
                .then(setTimeout(()=> {
                    this.$toastr.s("Review Updated")
                    window.location.reload()
                    }, 4000)) 
                .catch(error => {
                console.log("ERRRR:: ",error.response.data);
                this.$toastr.e("Something went wrong :(")
                }); 
            } else {
                this.$toastr.e("Please select a rating")
            }
        },

        //Too lazy to implement
        // async deleteReview(){
        //     if(confirm("Are you sure to delete your review?")){
        //         axios.post(`/review/${id}`).then(response=>{
        //             this.getUserReview()
        //         }).catch(error=>{
        //             console.log(error)
        //         })
        //     }
        // }
    }
}
</script>

<style>
.rate {
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>