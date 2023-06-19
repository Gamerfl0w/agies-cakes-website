<template>
  <div>
  <!--BANNER-->
    <div v-for="item in items" :key="item.id" :class="css" :style="{ background: gradient, backgroundSize: 'cover', backgroundPosition: 'center' }">
        <section>
            <h1 id="cursive" class="text-8xl pb-4"><em>A</em>gies <em>C</em>akes</h1>
            <div v-if="editable == false">
                <h2 class="text-2xl">{{ item.main }}</h2>
            </div>

            <div v-else>
                <textarea v-model="item.main" name="main" class="w-4/5 h-60 text-2xl text-black"></textarea>
            </div>
            
            <a href="/product" class="btn1 cursor-pointer hover:text-white">Order Now</a>

            <div v-if="editable == true">
                <form @submit.prevent="formSubmit" enctype="multipart/form-data">
                <input type="file" id="image" name="image" @change="onFileSelected" 
                class="text-black bg-white w-auto px-2 py-1 my-2 mr-2 text-blueGray-500 transition duration-500 ease-in-out transform border rounded-md hover:text-blueGray-600 text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-gray-100">
                </form>
            </div>
        </section>
    </div>


  <!--SECTION4-->
  <div class="section4">
  <div class="title_header">
  <h1 class="title mt-8" style="font-size: 50px;">Testimonials</h1>
  <h3 style="font-size: 20px;">What our customers say</h3>
  <span class="border-shape"></span>
  </div>
  
  <!--Testimonials -->
  <section class="bg-white">
  <div class="mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <blockquote v-for="rating in ratings" :key="rating.id" class="flex h-full flex-col justify-between bg-white p-12 shadow-lg rounded-xl">
        <div> 
          <div class="">
            <h3 class="text-xl font-bold text-pink-600 sm:text-2xl">
              Customer Review
            </h3>

            <div v-if="rating.rating == 'Great!'">
              <ul class="flex items-center gap-x-1">
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
              </ul>
            </div>

            <div v-else-if="rating.rating == 'Good'">
              <ul class="flex items-center gap-x-1">
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
              </ul>
            </div>

            <div v-else-if="rating.rating == 'Neutral'">
              <ul class="flex items-center gap-x-1">
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
              </ul>
            </div>

            <div v-else-if="rating.rating == 'Bad'">
              <ul class="flex items-center gap-x-1">
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
              </ul>
            </div>

            <div v-else-if="rating.rating == 'Poor'">
              <ul class="flex items-center gap-x-1">
                <li>
                  <i class="text-yellow-300 fas fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
                <li>
                  <i class="text-yellow-300 far fa-star"></i>
                </li>
              </ul>
            </div>

            <p class="mt-4 text-gray-600">
              {{ rating.message }}
            </p>
          </div>
        </div>

        <footer class="mt-3 text-center text-white rounded-xl">{{ rating.name }}</footer>
      </blockquote>
    </div>
  </div>
</section>

    <!--SECTION4-->
    <div class="mt-16 text-center">
        <div class="title_header">
        <h1 class="title" style="font-size: 50px;">About Us</h1>
        <h3 style="font-size: 20px;">Learn more about Agies Cakes</h3>
        <span class="border-shape"></span>
        </div>
    </div>

    <section v-for="item in items" :key="item.id + 'a'" class="relative">
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
                <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
                    background-image: url('https://image.freepik.com/free-photo/white-flower-with-cooking-ingredients-table_181624-1096.jpg')
                  ">
                  <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
                </div>
                <div class="container relative mx-auto">
                  <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                      <div class="">
                        <h1 class="text-white font-semibold text-5xl">
                          Agies Cake
                        </h1>
                        <div v-if="editable == true">
                            <textarea v-model="item.about" name="about" class="w-4/5 h-60 mt-4 text-black text-lg text-blueGray-200">
                                
                            </textarea>   
                        </div>

                        <div v-if="editable == false">
                            <p class="mt-4 text-white text-lg text-blueGray-200">
                               {{ item.about }} 
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
                  <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                  </svg>
                </div>
              </div>

              <section v-for="item in items" :key="item.id + 'z'" class="-mt-24">
                <div class="container mx-auto px-4">
                  <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    </div>
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                          <h6 class="text-xl font-semibold">About the Cake Shop</h6>
                          <div v-if="editable == true" class="flex flex-col justify-center items-center">
                            <div class="flex flex-col">
                              <p class="mt-2 text-blueGray-500">Business Owner: </p>
                              <input class="bg-gray-200" type="text" v-model="owner">
                            </div>
                            <div class="flex flex-col">
                              <p class="text-blueGray-500">Contact Number: </p>
                              <input class="bg-gray-200" type="text" v-model="contact">
                            </div>
                              <div class="flex flex-col">
                                <p>Location: </p>
                                <textarea v-model="location" class="bg-gray-200" name="" id="" cols="25" rows="10">
                                </textarea>
                              </div>
                          </div>

                          <div v-if="editable == false">
                            <p class="mt-2 text-blueGray-500 font-bold">
                              Business owner:  {{ item.owner }}
                            </p>
                            <p class="text-blueGray-500 font-bold">Contact number: {{ item.contact_number }}</p>
                            <p class="font-bold">Location: {{ item.location }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   </div> 
                  </section>
                  </section>

          <section class="p-10">
              <div class="flex -mb-14 md:-mb-20 justify-center items-center">
                  <img class="rounded-full h-28 w-28 md:h-44 md:w-44" :src="pfp" alt="">
              </div>
              <div class="bg-white shadow-lg rounded-2xl h-[580px] md:h-[550px] pt-12 md:pt-20 px-10 pb-3 flex flex-col justify-center items-center gap-3 md:gap-2 text-center">
                  <h1 class="text-xl md:text-4xl font-bold text-black">Rate Us</h1>
                  <h1 class="md:text-2xl text-black">Your feedback means a lot to us.</h1>
                  <h1 class="md:text-2xl text-black">Your opinion helps us reach more people!</h1>
                  <textarea class="bg-gray-400 text-white rounded-2xl w-full md:w-4/5 h-36 md:h-28 p-3" v-model="feedback" placeholder="Enter message here....." name="feedback" id="" cols="30" rows="10"></textarea>
                  <p class="text-lg md:text-2xl font-bold">Select One: </p>
                  <div class="flex">
                    <label for="super-sad">
                    <input type="radio" name="rating" v-model="rating" class="hidden peer" id="super-sad" value="Poor" />
                    <svg class="w-10 h-10 peer-checked:fill-red-500 cursor-pointer" viewBox="0 0 24 24"><path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
                    </label>

                    <label for="sad">
                    <input type="radio" name="rating" v-model="rating" class="hidden peer" id="sad" value="Bad" />
                    <svg class="w-10 h-10 peer-checked:fill-blue-300 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
                    </label>

                    <label for="neutral">
                    <input type="radio" name="rating" v-model="rating" class="hidden peer" id="neutral" value="Neutral" />
                    <svg class="w-10 h-10 peer-checked:fill-gray-300 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
                    </label>

                    <label for="happy">
                    <input type="radio" name="rating" v-model="rating" class="hidden peer" id="happy" value="Good" checked />
                    <svg class="w-10 h-10 peer-checked:fill-green-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
                    </label>

                    <label for="super-happy">
                    <input type="radio" name="rating" v-model="rating" class="hidden peer" id="super-happy" value="Great!" />
                    <svg class="w-10 h-10 peer-checked:fill-yellow-500 cursor-pointer" viewBox="0 0 24 24"><path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
                    </label>
              </div>
                  <p class="text-lg md:text-xl font-bold">{{ rating }}</p>
                  <form @click.prevent="checkFeedback(), spinner = true">
                  <button type="submit" class="flex justify-center items-center rounded-md bg-pink-500 text-white p-2 md:p-3 w-[200px] md:w-[600px]">
                    <svg v-if="spinner" class="mr-3 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    Submit Review
                  </button>
                  </form>
              </div>
          </section>

    <div v-if="userRole == 'Admin'">
        <div v-for="item in items" :key="item.id + 'b'">
            <button @click="saveData(item.main, item.about)" id="roll_back" class="animate h-20 w-1/3 md:w-40" style="display: flex;">Save</button>
            <button @click="changeText()" id="roll_back" class="left-8 absolute inset-x-0 bottom-0 h-20 md:h-20 w-1/3 md:w-40" style="display: flex;">{{ text }}</button>  
        </div>
    </div>
  </div>

  <div v-if="showModal" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  style="z-index: 999;">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg> -->
                <svg class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11160)"> <circle cx="12" cy="11.9999" r="9" stroke="#292929" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></circle> <rect x="12" y="8" width="0.01" height="0.01" stroke="#292929" stroke-width="3.75" stroke-linejoin="round"></rect> <path d="M12 12V16" stroke="#292929" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11160"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>
                        <h2 class="text-xl font-bold py-4 ">Unverified Email</h2>
                        <p class="text-gray-800">Please check your email for a verification link.</p>      
                    </div>
        <!--footer-->
      <form id="logout-form" :action="logout" method="POST">
        <input type="hidden" name="_token" :value="csrf">
        <div class="p-3 mt-2 text-center space-x-4 md:block">
            <button type="submit" class="mb-2 md:mb-0 bg-blue-700 border border-blue-700 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-800">
              Resend Email
            </button>
            <button type="button" @click="showModal = false" class="mb-2 md:mb-0 bg-green-600 border border-green-600 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-700">
              Okay
            </button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- <div v-if="showMail" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  style="z-index: 999;">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      
      <div class="">
        
        <div class="text-center p-5 flex-auto justify-center">
          <svg class="w-16 h-16 -m-1 flex items-center text-blue-500 mx-auto" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="mail"> <g> <polyline fill="none" points="4 8.2 12 14.1 20 8.2" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline> <rect fill="none" height="14" rx="2" ry="2" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="18" x="3" y="6.5"></rect> </g> </g> </g> </g></svg>
          <h2 class="text-xl font-bold py-4 ">Subscribe to our Newsletter</h2>
          <p class="text-gray-800">Get the best of Agies Cakes, directly in your inbox.</p>      
        </div>
      
        <input type="hidden" name="_token" :value="csrf">
        <div class="p-3 mt-2 text-center space-x-4 md:block">
            <button type="button" @click="newsLetterSuccess()" class="mb-2 md:mb-0 bg-green-600 border border-green-600 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-700">
              Yes
            </button>
            <button type="button" @click="showMail = false" class="mb-2 md:mb-0 bg-blue-700 border border-blue-700 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-800" >
              No Thanks
            </button>
        </div>
      </div>
    </div>
  </div> -->

  </div> 
</template>
<script>
export default {
    props: ['userRole', 'guest', 'mainImg', 'notVerified', 'logout', 'mail', 'userEmail'],
    created() {
        this.getHomeData()
        this.getTestimonials()

        if(!this.guest && this.notVerified){
          console.log("User is not verified")
          this.showModal = true
        }

        if(!this.guest && !this.notVerified){
          console.log("User is logged in and verified")
          this.showMail = true
        }
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    data(){
        return{
            items:[],
            ratings:[],
            text: 'Edit Homepage',
            editText: false,
            editable: false,
            save: '',
            main: '',
            mainImage: null,
            gradient: 'linear-gradient(rgba(1,1,1,.7), rgba(1,1,1,.7)), url('+ "'"+ this.mainImg + "'" + ')',
            css: 'banner',
            pfp: 'photo/agies-logo.jpg',
            feedback: '',
            rating: 'Good',
            spinner: false,
            showModal: false,
            showMail: false,
            owner: 'Mariane Joy Peña',
            contact: '09487039430',
            location: 'Purok Marikina, Barangay Matuyatuya, Torrijos, Marinduque'

    }
    },
    methods: {
        changeText(){
            this.editText = !this.editText
            this.editable = !this.editable
            if (this.editText == true) {
                this.text = 'In Editing Mode'
            }
            if (this.editText == false) {
                this.text = 'Edit Homepage'
            }

        },

        async getHomeData(){
            let response = await axios.get('/home/get/items');
            this.items = response.data
        },

        async getTestimonials(){
            let response = await axios.get('/home/get/ratings');
            this.ratings = response.data
        },

        onFileSelected(event){
            this.mainImage = event.target.files[0]
        },

         formSubmit() {
            if(this.onFileSelected){
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('image', this.mainImage);
                axios.post('/upload', data, config)
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }else{

            }

            
            },

         async saveData(main, about){
            await axios.post('/save', {
                'main': main,
                'about': about,
                'owner': this.owner,
                'contact_number': this.contact,
                'location': this.location
                // 'image': this.mainImage
                })  
                .then(this.$toastr.s("Data Saved"))
                .then(this.formSubmit())
                .then(window.location.reload())
                .catch(error => {
                console.log("ERRRR:: ",error.response.data);
                this.$toastr.e("Something went wrong :(")
                });         
            
        },

        async checkFeedback(){
            const options = {
              method: 'GET',
              url: 'https://community-purgomalum.p.rapidapi.com/containsprofanity',
              params: {text: this.feedback},
              headers: {
                'X-RapidAPI-Key': '415a3c0629msh99f7445ad28361ep142050jsnc96b8351f5d6',
                'X-RapidAPI-Host': 'community-purgomalum.p.rapidapi.com'
              }
            };

            axios.request(options).then((response) => {
              if(response.data == false){
                  this.sendFeedback()
                  this.spinner = false
              }else if(response.data == true){
                  this.$toastr.e("The feedback you sent is inappropriate")
                  this.spinner = false
              }
            })
            .catch(function (error) {
              console.error(error);
            });


        },

        async sendFeedback(){
          if (this.guest) {
            this.$toastr.e("Please log in first")
          } else {
            await axios.post('/testimonial', {
                'message': this.feedback,
                'rating': this.rating
                }).then(this.$toastr.s("Feedback Sent!"))  
                // .then(setTimeout(()=> {
                //         window.location.reload()
                //     }, 2500))
                .catch(error => {
                console.log("ERRRR:: ",error.response.data);
                this.$toastr.e("Something went wrong :(")
                });
          }
        },

        async newsLetterSuccess(){
          await axios.post('newsletter/store')
            .then(this.$toastr.s("Email Subscription Successfull"))  
            .then(this.showMail = false)
            .catch(error => {
            console.log("ERRRR:: ",error.response.data);
            this.$toastr.e("Something went wrong :(")
            });
          },

    }
}
</script>


<style scoped>

.banner{
    width:100%;
    height:85vh;
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--white);
    position:relative;
}
</style>