<template>
<div>
        <section>
             <!--  Start section -->
            <div class="container px-6 py-16 pt-40 text-center">
                <div class="max-w-lg ">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white md:text-4xl">Create beautiful website layout with Meraki UI.</h1>
                    
                    <p class="mt-6 text-gray-500 dark:text-gray-300">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero similique obcaecati illum mollitia.
                    </p>

                    <div class=" relative w-full max-w-sm mx-auto mt-6 bg-transparent border rounded-md dark:border-gray-700 focus-within:border-blue-400 focus-within:ring focus-within:ring-blue-300 dark:focus-within:border-blue-300 focus-within:ring-opacity-40">
                        <form class="flex flex-col md:flex-row">

                        <span class="absolute inset-y-0 left-0 md:flex items-center pl-3 hidden">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                         </span>
                            <input type="text" placeholder="What are you looking for...." class="flex-1 h-10 pl-8 w-0.5 px-4 py-2 m-1 text-gray-700 placeholder-gray-400 bg-transparent border-none appearance-none dark:text-gray-200 focus:outline-none focus:placeholder-transparent focus:ring-0" /> 
                            
                            <button type="button" class="h-10 px-4 py-2 m-1 text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                                Join Us
                            </button>
                        </form>
                    </div>
                     <!-- tags -->
                    <div class="flex items-center mt-3">
                        <span class="flex pl-16 py-2 font-semibold">People Also Searsh for:</span>
                           <!-- kewords  --> 
                            <span class="py-2 ml-2 inline-flex bg-gray-700 text-white rounded-full h-6 px-3 justify-center items-center">
                                        keyword
                            </span>
                        
                    </div>
                </div>        
            </div>
        </section>

      

                

        <!-- footer start -->
    <footer class="border-t-2 flex justify-center px-4 text-gray-800 bg-white dark:text-white dark:bg-gray-800">
        <div class="container py-6">
            <h1 class="text-lg font-bold text-center lg:text-2xl">
                Join 31,000+ other and never miss <br> out on new tips, tutorials, and more.
            </h1>

            <div class="flex justify-center mt-6">
                <div class="bg-white border rounded-md focus-within:ring dark:bg-gray-800 dark:border-gray-600 focus-within:border-blue-400 focus-within:ring-blue-300 focus-within:ring-opacity-40 dark:focus-within:border-blue-300">
                    <div class="flex flex-wrap justify-between md:flex-row">
                        <input type="email" class="p-2 m-1 text-sm text-gray-700 bg-transparent appearance-none focus:outline-none focus:placeholder-transparent" placeholder="Enter your email" aria-label="Enter your email">
                        <button class="w-full px-3 py-2 m-1 text-sm font-medium tracking-wider text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded-md dark:hover:bg-gray-600 dark:bg-gray-700 lg:w-auto hover:bg-gray-700">subscribe</button>
                    </div>
                </div>
            </div>

            <hr class="h-px mt-6 border-gray-300 border-none dark:bg-gray-700">

            <div class="flex flex-col items-center justify-between mt-6 md:flex-row">
                <div>
                    <a href="#" class="text-xl font-bold text-gray-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Brand</a>
                </div>

                <div class="flex mt-4 md:m-0">
                    <div class="-mx-4">
                        <a href="#" class="px-4 text-sm font-medium text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 hover:underline">About</a>
                        <a href="#" class="px-4 text-sm font-medium text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 hover:underline">Blog</a>
                        <a href="#" class="px-4 text-sm font-medium text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 hover:underline">News</a>
                        <a href="#" class="px-4 text-sm font-medium text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 hover:underline">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
        <!-- footer End -->
</div> <!-- end root -->
</template>

<script>

export default {
   props:["users"],
   data(){
       return{
           isloginopen:false,
           isregisteropen:false

       }
   },
    methods:{
        isopen:function(){
            this.isregisteropen = false;
            return this.isloginopen = !this.isloginopen;
        },
        isregisteropened:function(){
            this.isloginopen = false;;
            return this.isregisteropen = !this.isregisteropen;
        }
    }
    
}
</script>
<style>
  <!-- Require css -->
    .scroll-hidden::-webkit-scrollbar {
        height: 0px;
        background: transparent; /* make scrollbar transparent */
    }
</style> 