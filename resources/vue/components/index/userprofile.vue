<template>



<main
  id="main"
 :class="[ actionmodals != -1 ? 'relative after:absolute after:content after:w-full after:h-full after:bg-black after:opacity-80 after:top-0' : '','flex flex-col']">
    <div class="relative h-[400px] w-full">
        <div class="absolute w-full">
            <img class="bg-cover h-[400px] w-full " src="https://www.antarestech.com/wp-content/uploads/2019/11/Landing-Page-Cover-Background.png">
            
        </div>
    </div>
     <div class=" relative container mx-auto bg-white rounded shadow">
                <div class="relative justify-between flex px-4">
                        <div class="flex items-start pt-2">
                                    <a class="flex flex-col items-center  mr-4">
                                        <h4 class="font-bold text-xl">50</h4>
                                        <span> reviews</span>
                                    </a>
                                    <a class="flex flex-col items-center  mr-4">
                                        <h4 class="font-bold text-xl">50</h4>
                                        <span> reviews</span>
                                    </a>
                                    <a class="flex flex-col items-center  mr-4">
                                        <h4 class="font-bold text-xl">50</h4>
                                        <span> reviews</span>
                                    </a>
                        </div>
                        <div class=" absolute  left-2/4 -translate-x-1/2 -top-full z-10 mb-4">
                            <img class="rounded-full h-36" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260">
                            
                        </div>
                        <div class="items-start flex pt-2">
                            <button 
                            @click="actionmodaldisplay(1)"
                            class="flex items-center mx-2 my-2 bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-200 rounded text-indigo-700 px-6 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-indigo-700">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                               </svg>
                               <span class="ml-1">Contact</span>
                            </button>
                            <!-- report user -->
                            <button 
                             @click="actionmodaldisplay(2)"   
                            class="flex items-center mx-2 my-2 bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-200 rounded text-indigo-700 px-6 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-indigo-700">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                               </svg>
                               <span class="ml-1">Report</span>
                            </button>
                        </div>
                </div>   
                
                     
                 <!-- ============================================================ -->

            <div class="text-center mt-12">
                    <div class="flex items-center justify-center">
                             <h4 class="mr-1 text-2xl font-semibold">hmad weld ba</h4>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                             </svg>
                        </div>     
                        <div class="flex justify-center items-center mb-6 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-stone-500" viewBox="0 0 20 20" fill="currentColor">
                           <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                                <span class="text-xl">
                                    Casablanca
                                </span>

                        </div>

                        <div class="flex justify-center items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-stone-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                            </svg>
                            <span class="ml-1 text-lg">Painter</span>
                        </div>
                        <div class="flex justify-center items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-stone-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                            </svg>
                            <span class="ml-1 text-lg">Painter</span>
                        </div>
            </div>

        <!-- ================================================================== -->
        <div class="flex flex-col items-center mt-12 mb-4">
            <h class="text-xl font-semibold">About Me</h>
            <p class="text-center">
                    An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, 
                    performs and records all of his own music, giving it a warm, 
                    intimate feel with a solid groove structure. An artist of considerable range.
            </p>   
        </div>
        <!-- ================================================================== -->
                <div :class="showgalery ? 'cursor-pointer  flex justify-around border-b-2 mb-8 relative after:content after:absolute after:w-2/4 after:h-1  after:bg-red-400 after:left-0 after:top-full' : 'hidden'">
                    <div class=" flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Painter</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Construction</span>
                    </div>
                           <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Construction</span>
                    </div>
                </div>
                <!--galery style start -->
                 <section :class=" showgalery ? 'overflow-hidden text-gray-700 transition duration-300 ease-out' : 'hidden' ">
                        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                            <div class="flex flex-wrap -m-1 md:-m-2">
                            <div class="flex flex-wrap w-1/3">
                                <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp">
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/3">
                                <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp">
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/3">
                                <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp">
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/3">
                                <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp">
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/3">
                                <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(76).webp">
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/3">
                                <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp">
                                </div>
                            </div>
                            </div>
                        </div>
                </section>
                <!--galery style end -->

            <div class="text-center">
                <button 
                @click="showgalery = !showgalery"
                class="mx-2 my-2 bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-200 rounded text-indigo-700 px-6 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-indigo-700">Show More</button>
            </div>
    <!-- Contact modal start -->
            <!-- component -->
            <div :class="actionmodals == 1 ? 'absolute w-full z-40 top-0 -translate-y-2/4 flex justify-center items-center' : 'hidden'">
                <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
                    <div
                    class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
                    >
                    <p class="font-semibold text-gray-800">Contact Mohamed EL Allaoui</p>
                    <svg
                    @click="actionmodaldisplay(-1)"
                        class="w-6 h-6 cursor-pointer"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                        ></path>
                    </svg>
                    </div>
                    <div class="flex flex-col px-6 py-5 bg-gray-50">
                    <p class="mb-2 font-semibold text-gray-700">Message</p>
                    <textarea
                        type="text"
                        name=""
                        placeholder="Type Your message..."
                        class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36 resize-none"
                        id=""
                    ></textarea>
                    </div>
                    <div
                    class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                    >
                    <p 
                    @click="actionmodaldisplay(-1)"
                    class="font-semibold text-gray-600 cursor-pointer"
                    >Cancel</p>
                    <button class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                        Send
                    </button>
                    </div>
                </div>
            </div>
    <!-- Contact modal Ends -->
    <!-- Contact modal start -->
            <!-- component -->
            <div :class="actionmodals == 2 ? 'absolute w-full z-40 top-0 -translate-y-2/4 flex justify-center items-center' : 'hidden'">
                <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
                    <div
                    class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
                    >
                    <p class="font-semibold text-gray-800">Report Mohamed EL Allaoui</p>
                    <svg
                    @click="actionmodaldisplay(-1)"
                        class="w-6 h-6 cursor-pointer"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                        ></path>
                    </svg>
                    </div>
                    <div class="flex flex-col px-6 py-5 bg-gray-50">
                    <p class="mb-2 font-semibold text-gray-700">Report Reason</p>
                    <div class="flex items-center mb-4">
                            <input id="country-option-1" type="radio" name="countries" value="USA" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
                            <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            United States
                            </label>
                    </div>
                      <div class="flex items-center mb-4">
                            <input id="country-option-1" type="radio" name="countries" value="USA" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
                            <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            an apropriate profile
                            </label>
                    </div>
                      <div class="flex items-center mb-4">
                            <input id="country-option-1" type="radio" name="countries" value="USA" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
                            <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Fake profile
                            </label>
                    </div>
                    </div>
                    <div
                    class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                    >
                    <p 
                    @click="actionmodaldisplay(-1)"
                    class="font-semibold text-gray-600 cursor-pointer"
                    >Cancel</p>
                    <button class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                        Report
                    </button>
                    </div>
                </div>
            </div>
    <!-- Contact modal Ends --> 

    </div><!-- container -->
</main>

</template>
<script>
export default {
    data(){
        return{
        showgalery:false,
        actionmodals:-1,
        }
    },
    methods:{
        actionmodaldisplay:function(val){
            this.actionmodals = val
        },

    }//methods
}
</script>