<template>
<div id="root">
    <header v-if="!isconnected">
        <!--  Start navigationbar -->
    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container px-6 py-3 mx-auto">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex items-center justify-between">
                <!-- site logo-->
                    <div class="flex items-center">
                        <router-link :to="{name: 'index' }" class="text-2xl font-bold text-gray-800 transition-colors duration-200 transform dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300" href="#">Brand</router-link>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="items-center md:flex">
                    <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                        <a class="my-1 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:mx-4 md:my-0" href="#" >Home</a>
                        <a class="my-1 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:mx-4 md:my-0" href="#">Blog</a>
                        <a class="my-1 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:mx-4 md:my-0" href="#">Compoents</a>
                        <a class="my-1 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:mx-4 md:my-0" href="#">Courses</a>
                    </div>
                </div>

                <div class="items-center md:flex">
                    <div class="flex items-center py-2 -mx-1 md:mx-0">
                        <a class="block cursor-pointer w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-blue-600 md:mx-2 md:w-auto" v-on:click="isopen(1)">Login</a>
                        <a class="block cursor-pointer w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-blue-600 md:mx-0 md:w-auto" v-on:click="isopen(2)">Join free</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </nav>
    <!--  End navigationbar -->

        <!--  Start section -->
          
            <!-- login wraper --> 
            <div :class="[modalopen == 1 ? 'h-full fixed top-0 left-0  w-full z-10' : 'hidden']">
                    <div class="bg-black opacity-25 h-full absolute w-full -z-10"></div>
                     <div class="flex max-w-sm mx-auto mt-16 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6/12">
        
        <div class=" relative w-full px-6 py-8 md:px-8">
            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2>

             <button v-on:click="isopen(-1)" class="top-0 right-0 absolute p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <p class="text-xl text-center text-gray-600 dark:text-gray-200">Welcome back!</p>

            <a href="#" class="flex items-center justify-center mt-4 text-gray-600 transition-colors duration-200 transform border rounded-lg dark:border-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <div class="px-4 py-2">
                    <svg class="w-6 h-6" viewBox="0 0 40 40">
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                        <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                        <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                    </svg>
                </div>

                <span class="w-5/6 px-4 py-3 font-bold text-center">Sign in with Google</span>
            </a>

            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

                <a  class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">or login with email</a>

                <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Email Address</label>
                <input requiered v-model="email" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="email">
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">Password</label>
                    <a @click="isopen(3)" class="text-xs text-gray-500 dark:text-gray-300 hover:underline cursor-pointer">Forget Password?</a>
                </div>
                <div class="relative">
                    <input
                    :type=" passwordToggle ? 'password' : 'text' "
                     v-model="password" 
                     class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300">
                    <div 
                    @click="passwordToggle = !passwordToggle"
                    class="flex absolute inset-y-0 right-0 items-center pr-3 cursor-pointer">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                    </div>
                </div>
                <!-- // ! Error label -->
                <p :class=" erroMessage .length > 0 ?  'mt-2 text-sm text-red-600 dark:text-red-500 text-center' : 'hidden'">{{erroMessage}}</p>
            </div>

            <div class="mt-8">
                <button 
                @click="login()"
                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                    Login
                </button>
            </div>
            
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

                <a @click="isopen(2)" class="cursor-pointer text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or sign up</a>
                
                <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
            </div>
        </div>
    </div>
                
            </div>
            <!-- register wraper wraper --> 
            <div :class="[modalopen == 2 ? 'h-full fixed top-0 left-0  w-full z-10' : 'hidden']">
                    <div class="bg-black opacity-25 h-full absolute w-full -z-10"></div>
                     <div class="flex max-w-sm mx-auto mt-16 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6/12">
        
        <div class=" relative w-full px-6 py-8 md:px-8">
            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2>

             <button @click="isopen(-1)" class="top-0 right-0 absolute p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <p class="text-xl text-center text-gray-600 dark:text-gray-200">Sign up with:</p>

            <a href="#" class="flex items-center justify-center mt-4 text-gray-600 transition-colors duration-200 transform border rounded-lg dark:border-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <div class="px-4 py-2">
                    <svg class="w-6 h-6" viewBox="0 0 40 40">
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                        <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                        <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                    </svg>
                </div>

                <span class="w-5/6 px-4 py-3 font-bold text-center">Sign up with Google</span>
            </a>

            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

                <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">Or with email</a>

                <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
            </div>

            <div class="mt-4">
                <c-baseinput 
                label="Email"
                v-model="email"
                styleclass="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" 
                >
                </c-baseinput>
            </div>

            <div class="mt-4">
                <c-baseinput 
                label="Username"
                v-model="username" 
                styleclass="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" 
                >
                </c-baseinput>
            </div>

                <div class="mt-4">
                    <c-baseinput 
                    label="Password"
                    v-model="password"
                    styleclass="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" 
                    type="password"
                    >
                    </c-baseinput>            
                </div>

            <div class="mt-8">
                <button
                @click="register()"
                 class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-blue-600 focus:outline-none focus:bg-gray-600">
                    Sign up
                </button>
            </div>
            
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

                <a @click="isopen(1)" class="cursor-pointer text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">Or log in</a>
                
                <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
            </div>
        </div>
    </div>
                
  </div>
     <!-- recover password -->
     <div :class="modalopen == 3 ? 'h-full fixed top-0 left-0  w-full z-10 ' : 'hidden' ">
                    <div class="bg-black opacity-25 h-full absolute w-full -z-10"></div>
                     <div class="flex max-w-sm mx-auto mt-16 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6/12">
        
        <div class=" relative w-full px-6 py-8 md:px-8">
            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2>

             <button @click="isopen(-1)" class="top-0 right-0 absolute p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>



            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

                <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">Password Recovery</a>

                <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
            </div>

                <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">Email</label>
                </div>
                <input  class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password">
            </div>

            <div class="mt-8">
                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-blue-600 focus:outline-none focus:bg-gray-600">
                    Send
                </button>
            </div>
            
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

                <a @click="isopen(1)" class="cursor-pointer text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">Or log in</a>
                
                <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
            </div>
        </div>
    </div>
                
  </div>
        <!--  End section -->

</header>

    <!-- user header  -->
    <c-user-header v-if="isconnected"></c-user-header>
</div>
</template>
<script>
import baseinput from "../../admin/components/inputs/baseinput"
import userheader from '../userdashboard/header'
export default {
    props:{
        loginrequest:{
            type:Boolean,
            default:false
        }
    },
    components:{
        'c-baseinput' : baseinput,
        'c-user-header' : userheader
    },
   data(){
       return{
           modalopen : false,
           email:undefined,
           password:undefined,
           username:undefined,
           isconnected:undefined,
           erroMessage:false,
           passwordToggle:false
       }
   },
    methods:{
        isopen:function(val){
            this.modalopen = val
          
        },
        login:function(){
            axios.get('sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login',{
                    email:this.email,
                    password:this.password,
                    })
                    .then(response => {
                        response.data.status == 401 ?   this.erroMessage = response.data.message : [this.$router.go(), console.log(response)]
                    })
                    .catch(e => console.log(e))
                });
            
        },
        register:function(){
            axios.post('/api/register',{
                    username:this.username,
                    email: this.email,
                    password:this.password
                })
                .then(
                    response => console.log(response)
                )
                .catch(e => console.log(e)) 
        },
        checklogin:function(){
             axios.get('/api/check').then(response => this.isconnected =  response.data.islogedin)
        },
        loginpopup:function(){
            console.log("login from parent")
        }
    },
    watch:{
        isconnected:{
            handler:function(){
                axios.get('/api/check').then(response => this.isconnected =  response.data.islogedin)
            },
            deep:true
        },
    
        loginrequest: function(newVal, oldVal) { // watch it
          if(newVal){
              this.isopen(1)
          }
        }
         
    },
    mounted(){
        this.checklogin()
    }
    
}
</script>