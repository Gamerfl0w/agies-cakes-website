<template>
    <body>
        <main>
            <div class="container">
                <div class="cake">
                    <div class="plate"></div>
                    <div class="layer-bottom" :class="flavor" :style="{ backgroundColor: computedFilling }"></div>
                    <div class="layer-middle" :class="flavor" :style="{ backgroundColor: computedFilling }" ></div>
                    <div class="layer-top" :class="flavor" :style="{ backgroundColor: computedFilling }" ></div>
                    <img v-if="viewFlowers" class="z-30" width="250px" height="100px" :src="decoration" style="border-radius: 50%;" />
                    <img v-if="viewSprinkles" class="z-30" width="250px" height="100px" :src="decoration" style="border-radius: 100%; bottom: 80px" />
                    <div :class="topIcing"></div>
                    <div class="drip1" :class="icing"></div>
                    <div class="drip2" :class="icing"></div>
                    <div class="drip3" :class="icing"></div>
                    <div class="candle">
                        <div class="flame"></div>
                    </div>
                </div>
            </div>
            
            <div class="details">
    <!-- I think I dont need these, but too lazy to test -->
    <!-- <form @click.prevent="addCustomToCart()" method="POST" enctype="multipart/form-data"> -->
      <input type="hidden" value="11" name="id">
      <input type="hidden" value="Custom Cake" name="name">
      <input type="hidden" value="250" name="price">
      <!-- <input type="hidden" :value="$product->image"  name="image"> -->
      <input type="hidden" value="1" name="quantity">
    <div id="animation-carousel" class="relative" data-carousel="static">
      
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden rounded-lg" style="height: 430px; width: 300px;">
             <!-- Item 1 -->
            <div class="duration-200 ease-linear inset-0 transition-all transform" data-carousel-item="active">
                <p class="text-center text-4xl">Size</p>
                <div class="mt-5 flex flex-1 h-full flex-col gap-4">

              <div class="flex gap-2">
                <input type="radio" name="size" id="small" class="peer" checked />
                <label @click="handleSize('Small', 300)"  for="small" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center">S</div>
                  Small
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

              <div class="flex gap-2">
                <input type="radio" name="size" id="medium" class="peer" />
                <label @click="handleSize('Medium', 400)" for="medium" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center">M</div>
                  Medium
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

              <div class="flex gap-2">
                <input type="radio" name="size" id="large" class="peer" />
                <label @click="handleSize('Large', 500)" for="large" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center">L</div>
                  Large
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>
               </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
                <p class="text-center text-4xl">Flavor</p>
               <div class="mt-5 flex flex-1 flex-col gap-4">

                <div class="flex gap-2">
                <input type="radio" name="flavor" id="vanilla" class="peer" checked />
                <label @click="handleFlavor('Vanilla', 100)" for="vanilla" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-white"></div>
                  Vanilla
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>
               
              <div class="flex gap-2">
                <input type="radio" name="flavor" id="chocolate" class="peer" />
                <label @click="handleFlavor('Chocolate', 150)" for="chocolate" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-black"></div>
                  Chocolate
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

              <div class="flex gap-2">
                <input type="radio" name="flavor" id="strawberry" class="peer" />
                <label @click="handleFlavor('Strawberry', 120)" for="strawberry" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-[#FC5A8D]"></div>
                  Strawberry
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>
            
              </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-200 pb-5 ease-linear absolute inset-0 transition-all transform translate-x-0 z-20 overflow-auto" data-carousel-item="">
               <p class="text-center text-4xl">Icing</p>
               <div class="mt-5 flex flex-1 flex-col gap-4">

                <div class="flex gap-2">
                  <input type="radio" name="icing" id="white" class="peer" checked />
                  <label @click="handleIcing('white', 'White')" for="white" class="flex justify-center items-center gap-2 cursor-pointer">
                    <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-white"></div>
                    White
                  </label>
                  <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
                </div>

                <div class="flex gap-2">
                  <input type="radio" name="icing" id="blue" class="peer" />
                  <label @click="handleIcing('blue', 'Blue')" for="blue" class="flex justify-center items-center gap-2 cursor-pointer">
                    <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-[#0000ff]"></div>
                    Blue
                  </label>
                  <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
                </div>

                <div class="flex gap-2">
                  <input type="radio" name="icing" id="red" class="peer" />
                  <label @click="handleIcing('red', 'Red')" for="red" class="flex justify-center items-center gap-2 cursor-pointer">
                    <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-[#ff0000]"></div>
                    Red
                  </label>
                  <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
                </div>

                <div class="flex gap-2">
                  <input type="radio" name="icing" id="yellow" class="peer" />
                  <label @click="handleIcing('yellow', 'Yellow')" for="yellow" class="flex justify-center items-center gap-2 cursor-pointer">
                    <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-[#ffff00]"></div>
                    Yellow
                  </label>
                  <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
                </div>

                <div class="flex gap-2">
                  <input type="radio" name="icing" id="green" class="peer" />
                  <label @click="handleIcing('green', 'Green')" for="green" class="flex justify-center items-center gap-2 cursor-pointer">
                    <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-green-500"></div>
                    Green
                  </label>
                  <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
                </div>

                <div class="flex gap-2">
                  <input type="radio" name="icing" id="pink" class="peer" />
                  <label @click="handleIcing('pink', 'Pink')" for="pink" class="flex justify-center items-center gap-2 cursor-pointer">
                    <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-[#ffc0cb]"></div>
                    Pink
                  </label>
                  <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
                </div>

              </div>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
               <p class="text-center text-4xl">Filling</p>
               <div class="mt-5 flex flex-1 flex-col gap-4">
                
                <div class="flex gap-2">
                <input type="radio" name="filling" id="whiteFilling" class="peer" />
                <label @click="handleFilling('white', 'Vanilla', 100)" for="whiteFilling" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-white"></div>
                  Vanilla
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>
               
              <div class="flex gap-2">
                <input type="radio" name="filling" id="blackFilling" class="peer" />
                <label @click="handleFilling('black', 'Chocolate', 150)" for="blackFilling" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-black"></div>
                  Chocolate
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

              <div class="flex gap-2">
                <input type="radio" name="filling" id="pinkFilling" class="peer" />
                <label @click="handleFilling('pink', 'Strawberry', 120)" for="pinkFilling" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center bg-[#FC5A8D]"></div>
                  Strawberry
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

                </div>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
               <p class="text-center text-4xl">Decoration</p>
               <div class="mt-5 flex flex-1 flex-col gap-4">
                
                <div class="flex gap-2">
                <input type="radio" name="deco" id="flowers" class="peer" />
                <label @click="handleDecoration('Flowers', 150)" for="flowers" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center">F</div>
                  Flowers
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

              <div class="flex gap-2">
                <input type="radio" name="deco" id="sprinkles" class="peer" />
                <label @click="handleDecoration('Sprinkles')" for="sprinkles" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center">S</div>
                  Sprinkles
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

              <div class="flex gap-2">
                <input type="radio" name="deco" id="none" class="peer" checked />
                <label  @click="handleDecoration('None')" for="none" class="flex justify-center items-center gap-2 cursor-pointer">
                  <div class="rounded-full border-2 w-10 h-10 text-xl flex justify-center items-center">N</div>
                  None
                </label>
                <p class="cursor-pointer opacity-0 peer-checked:text-white peer-checked:opacity-100 flex justify-center items-center text-2xl mb-2">✓</p>
              </div>

                </div>
            </div>
            <!-- Item 6 -->
            <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                <p class="text-center text-4xl">Theme</p>
                
                <div class="flex flex-1 justify-center items-center text-black flex-col" style="height: 366px;">
                  <p class="text-white text-xl text-center">You can upload an image of your desired theme.</p>    
                  <input class="text-white" type="file"  id="image" name="image" @change="onFileSelected">           
                </div>
            </div>

             <!-- Item 7 -->
             <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                <p class="text-center text-3xl">Message/Greeting</p>
                <div class="flex text-black" style="height: 366px;">
                  <textarea v-model="message" name="message" id="message" class="flex-1" placeholder="Cake Message"></textarea>
                </div>
            </div>


            <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
                <p class="text-center text-4xl">Note to Bakery</p>
                <div class="flex text-black" style="height: 366px;">
                  <textarea v-model="note" name="note" id="message" class="flex-1" placeholder="Leave a note..."></textarea> 
                </div>
            </div>
        </div>
        <div class="flex justify-between align-bottom">
            <button type="button" class="font-bold" data-carousel-prev="">Previous</button>
            <button type="button" class="font-bold" data-carousel-next="">Next</button>
        </div>
        </div>
            <button @click.prevent="addCustomToCart()" class="mt-auto font-bold bg-blue-600 hover:bg-blue-700 rounded-md p-1">Add to Cart</button>
      <!-- </form> -->
      </div>
              
    </main>
    
        <section class="text-center">
            <div class="data">
                <p class="font-bold">Size</p>
                <p>{{ size }}</p>
            </div>
    
            <div class="data">
                <p class="font-bold">Flavor</p>
                <p>{{ flavorInfo }}</p>
            </div>

            <div class="data">
                <p class="font-bold">Icing</p>
                <p>{{ icingInfo }} Icing</p>
            </div>
    
            <div class="data">
                <p class="font-bold">Filling</p>
                <p>{{ fillingInfo }} Filling</p>
            </div>

            <div class="data">
                <p class="font-bold">Decoration</p>
                <p>{{ decorationInfo }}</p>
            </div>
    
            <div class="data">
                <p class="font-bold">Message</p>
                <p>{{ message }}</p>
            </div>

            <div class="data">
                <p class="font-bold">Price</p>
                <p>PHP {{ totalPrice }}</p>
            </div>
        </section>
    </body>
</template>
    
    <script>
    export default {
      name: "Customize",
      props: ['sprinkles'],
        data() {
            return {
              flavor: "vanilla",
              flavorInfo: "Vanilla",
              fillingInfo: "Vanilla",
              icingInfo: "Vanilla",
              message: "No message",
              note: "No note",
              totalPrice: 500,
              active: "",
              // Filling
              backgroundColor: "#f0e8d9",
              size: "Small",
              icing: "drip",
              topIcing: "icing",
              imageTheme: null,
              decoration: 'None',
              decorationInfo: 'None',
              viewFlowers: false,
              viewSprinkles: false,
              flowers: 'storage/toppings/flowers.png',
              sprinkles: 'storage/toppings/sprinkles.png',
              sizePrice: 300,
              flavorPrice: 100,
              icingPrice: 100,
              fillingPrice: 0,
              decorationPrice: 0,
            }
        },
     props: [
        'productId', 'userId'
      ],
          methods: {
            handleSize(sizeValue, sizePrice){
              this.size = sizeValue
              this.sizePrice = sizePrice
              this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
            },
              toActive(){
                  this.active = "selected"
              },

              handleFlavor(flavorValue, flavorPrice){
                this.flavor = flavorValue
                this.flavorPrice = flavorPrice
                this.flavorInfo = flavorValue
                this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
              },

              handleFilling(color, fillingValue, fillingPrice) {
              this.backgroundColor = color
              this.fillingInfo = fillingValue
              this.fillingPrice = fillingPrice
              this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
              },

              handleIcing(color, icingValue, icingPrice) {
                this.icing = color + "DripIcing"
                this.topIcing = color + "Icing"
                this.icingInfo = icingValue
                this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
              },

              handleDecoration(value){
                if( value == 'Flowers'){
                  this.decorationInfo = value
                  this.decoration = this.flowers
                  this.viewFlowers = true
                  this.viewSprinkles = false
                  this.decorationPrice = 150
                  this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
                }else if(value == 'Sprinkles'){
                  this.decorationInfo = value
                  this.decoration = this.sprinkles
                  this.viewSprinkles = true
                  this.viewFlowers = false
                  this.decorationPrice = 100
                  this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
                }else if(value == 'None'){
                  this.decorationInfo = value
                  this.decoration = "None"
                  this.viewSprinkles = false
                  this.viewFlowers = false
                  this.decorationPrice = 0
                  this.totalPrice = this.sizePrice + this.flavorPrice + this.icingPrice + this.fillingPrice + this.decorationPrice
                }
              },
    
            async addCustomToCart(){
              if(this.imageTheme != null){
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                //This shit took me 5 hours to figure out :deadge:  
                let data = new FormData();
                data.append("flavor", this.flavorInfo);
                data.append("size", this.size);
                data.append("icingInfo", this.icingInfo);
                data.append("fillingInfo", this.fillingInfo);
                data.append("message", this.message);
                data.append("note", this.note);
                data.append('image', this.imageTheme);
                data.append('decoration', this.decorationInfo);
                data.append('price', this.totalPrice);
                await axios.post('/custom-cart/info', data, config).then(this.$toastr.s("Added to Cart"))
                    .then(setTimeout(()=> {
                      window.location.href = '/cart'
                    }, 4000))
            }else{
              await axios.post('/custom-cart/info', {
                      'flavor': this.flavorInfo,
                      'size': this.size,
                      'icingInfo': this.icingInfo,
                      'fillingInfo': this.fillingInfo,
                      'message': this.message,
                      'imageTheme': 'No theme',
                      'note': this.note,
                      'decoration': this.decorationInfo,
                      'price': this.totalPrice
                    }).then(this.$toastr.s("Added to Cart"))
                    .then(setTimeout(()=> {
                      window.location.href = '/cart'
                    }, 4000))
            }
            },

            onFileSelected(event){
                this.imageTheme = event.target.files[0]
            },
            
        },
        computed: { 
          computedFilling: function () {
          return this.backgroundColor
        },
        computedIcing: function () {
          return this.backgroundColor
        },

        // displayToppings: function () {
        //   return this.toppings
        // },
      },
    }
    </script>
    
    <style lang="scss" scoped>
    /* Customization */
    /* Flavor */
    .Vanilla {
      position: absolute;
      display: block;
      width: 250px;
      height: 100px;
      border-radius: 50%;
      background-color: #f0e8d9;
      box-shadow: 0 2px 0px #fffcf7, 0 4px 0px #fffcf7, 0 6px 0px #fffcf7, 0 8px 0px #fffcf7, 0 10px 0px #fffcf7, 0 12px 0px #fffcf7, 0 14px 0px #fffcf7, 0 16px 0px #fffcf7, 0 18px 0px #fffcf7, 0 20px 0px #fffcf7, 0 22px 0px #fffcf7, 0 24px 0px #fffcf7, 0 26px 0px #fffcf7, 0 28px 0px #fffcf7, 0 30px 0px #fffcf7;
    }
    
    .Chocolate {
      position: absolute;
      display: block;
      width: 250px;
      height: 100px;
      border-radius: 50%;
      background-color: #f0e8d9;
      box-shadow: 0 2px 0px #6a4b18, 0 4px 0px #33240b, 0 6px 0px #32230b, 0 8px 0px #31230b, 0 10px 0px #30220b, 0 12px 0px #2f220b, 0 14px 0px #2f210a, 0 16px 0px #2e200a, 0 18px 0px #2d200a, 0 20px 0px #2c1f0a, 0 22px 0px #2b1f0a, 0 24px 0px #2a1e09, 0 26px 0px #2a1d09, 0 28px 0px #291d09, 0 30px 0px #281c09;
    }
    
    .Strawberry {
      position: absolute;
      display: block;
      width: 250px;
      height: 100px;
      border-radius: 50%;
      background-color: #f0e8d9;
      box-shadow: 0 2px 0px #fc5a8d, 0 4px 0px #FC5A8D, 0 6px 0px #FC5A8D, 0 8px 0px #FC5A8D, 0 10px 0px #FC5A8D, 0 12px 0px #FC5A8D, 0 14px 0px #FC5A8D, 0 16px 0px #FC5A8D, 0 18px 0px #FC5A8D, 0 20px 0px #FC5A8D, 0 22px 0px #FC5A8D, 0 24px 0px #FC5A8D, 0 26px 0px #FC5A8D, 0 28px 0px #FC5A8D, 0 30px 0px #FC5A8D;
    }
    
    .greenDripIcing {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      //all drip
       background-color: green;
    }
    
    .blueDripIcing {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
       background-color: #0000ff;
    }
    
    .yellowDripIcing {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
       background-color: #ffff00;
    }
    
    .redDripIcing {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      background-color: #ff0000;
    }

    .whiteDripIcing {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      background-color: #f0e8d9;
    }

    .pinkDripIcing {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      background-color: #ffc0cb;
    }
    
    .greenIcing {
      top: 2px;
      left: 5px;
      background-color: green;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }
    
    .blueIcing {
      top: 2px;
      left: 5px;
      background-color: blue;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }
    
    .yellowIcing {
      top: 2px;
      left: 5px;
      background-color: yellow;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }
    
    .redIcing {
      top: 2px;
      left: 5px;
      background-color: red;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }

    .whiteIcing {
      top: 2px;
      left: 5px;
      background-color: #f0e8d9;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }

    .pinkIcing {
      top: 2px;
      left: 5px;
      background-color: pink;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }
    
    
    .select {
        border-color: black;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
     .cake {
       position: absolute;
       width: 243px;
       height: 200px;
       z-index: 1;
     }
    
    .plate {
      width: 270px;
      height: 110px;
      position: absolute;
      bottom: -10px;
      left: -10px;
      background-color: #ccc;
      border-radius: 50%;
      box-shadow: 0 2px 0 #b3b3b3, 0 4px 0 #b3b3b3, 0 5px 40px rgba(0, 0, 0, 0.5);
    }
    
     .cake > * {
       position: absolute;
     }
    
    .layer-top {
      top: 0px;
    }
    
    .layer-middle {
      top: 33px;
    }
    
    .layer-bottom {
      top: 66px;
    }
    
    .icing {
      top: 2px;
      left: 5px;
      background-color: #f4ebdc;
      width: 240px;
      height: 90px;
      border-radius: 50%;
    }
    
    .icing:before {
      content: "";
      position: absolute;
      top: 4px;
      right: 5px;
      bottom: 6px;
      left: 5px;
      background-color: #f4ebdc;
      box-shadow: 0 0 4px #f6efe3, 0 0 4px #f6efe3, 0 0 4px #f6efe3;
      border-radius: 50%;
      z-index: 1;
    }
    
    .drip {
      display: block;
      width: 50px;
      height: 60px;
      border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      //all drip
       background-color: #f0e8d9;
    }
    
    .drip1 {
      top: 53px;
      left: 5px;
      transform: skewY(15deg);
      height: 48px;
      width: 40px;
    }
    
    .drip2 {
      top: 69px;
      left: 181px;
      transform: skewY(-15deg);
    }
    
    .drip3 {
      top: 54px;
      left: 90px;
      width: 80px;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
    }
    
    .candle {
      background-color: #7B020B;
      width: 16px;
      height: 50px;
      border-radius: 8px/4px;
      top: -20px;
      left: 50%;
      margin-left: -8px;
      z-index: 10;
    }
    .candle:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 16px;
      height: 8px;
      border-radius: 50%;
      background-color: #ad030f;
    }
    
    .flame {
      position: absolute;
      background-color: orange;
      width: 15px;
      height: 35px;
      border-radius: 10px 10px 10px 10px/25px 25px 10px 10px;
      top: -34px;
      left: 50%;
      margin-left: -7.5px;
      z-index: 10;
      box-shadow: 0 0 10px rgba(255, 165, 0, 0.5), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 60px rgba(255, 165, 0, 0.5), 0 0 80px rgba(255, 165, 0, 0.5);
      transform-origin: 50% 90%;
      animation: flicker 1s ease-in-out alternate infinite;
    }
    
    @keyframes flicker {
      0% {
        transform: skewX(5deg);
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.2), 0 0 20px rgba(255, 165, 0, 0.2), 0 0 60px rgba(255, 165, 0, 0.2), 0 0 80px rgba(255, 165, 0, 0.2);
      }
      25% {
        transform: skewX(-5deg);
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.5), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 60px rgba(255, 165, 0, 0.5), 0 0 80px rgba(255, 165, 0, 0.5);
      }
      50% {
        transform: skewX(10deg);
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.3), 0 0 20px rgba(255, 165, 0, 0.3), 0 0 60px rgba(255, 165, 0, 0.3), 0 0 80px rgba(255, 165, 0, 0.3);
      }
      75% {
        transform: skewX(-10deg);
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.4), 0 0 20px rgba(255, 165, 0, 0.4), 0 0 60px rgba(255, 165, 0, 0.4), 0 0 80px rgba(255, 165, 0, 0.4);
      }
      100% {
        transform: skewX(5deg);
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.5), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 60px rgba(255, 165, 0, 0.5), 0 0 80px rgba(255, 165, 0, 0.5);
      }
    }
    
    body {
        margin: 0;
        padding: 0;
        min-height: 90vh;
        display: flex;
        flex-direction: column;
    }
    
    main{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        flex: 1;
    }
    
    .container{
        flex: 1 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 400px;
    }
    
    .details{
        background-color: #80489C;
        display: flex;
        width: 400px;
        flex-wrap: wrap;
        flex-direction: column;
        color: white;
        padding: 0px 50px;
        padding-top: 30px;
        padding-bottom: 20px; 
        z-index: 1;
    }
    
    section{
        margin-top: auto;
        color: white;
        display: flex;
        flex-wrap: wrap;
        gap: 3rem;
        font-size: 25px;
        justify-content: space-between;
        align-items: center;
        padding: 27px 100px;
        background-color: #FA058A;
    }
    
    .data {
        text-align: center;
    }

    input {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
    
    @media only screen and (max-width: 920px) {
        .details {
         flex: 1;
         justify-content: center;
         align-items: center;
        }
    
        .data {
            font-size: 20px;
        }
      }

      @media only screen and (max-width: 817px) {
        body{
            margin-top: 400px;
        }
        .cake {
            margin-bottom: 400px;
        }
      }  
    
    
    </style>