<template>

<div id="root">

    <c-home-header
    :loginrequest="loginrequestToheader"
    ></c-home-header>

<main
 :class="[ actionmodals != -1 ? 'relative after:absolute after:content after:w-full after:h-full after:bg-black after:opacity-80 after:top-0' : '','flex flex-col']">
    <div class="relative h-[400px] w-full">
        <div class="absolute w-full">
            <img class="bg-cover h-[400px] w-full" src="https://www.antarestech.com/wp-content/uploads/2019/11/Landing-Page-Cover-Background.png">
            
        </div>
    </div>
     <div class=" relative container mx-auto bg-white rounded shadow">
                <div class="relative justify-between flex px-4">
                        <div class="flex items-start pt-2">
                            <div  v-for="item in user.portfolio">
                                <a @click="getreviews(item.id)" class="flex flex-col items-center mr-4 px-2 py-2 shadow-lg rounded-lg cursor-pointer">
                                    <h4 class="text-xl font-bold">{{item.title}}</h4>
                                    <h4 class="font-semibold text-lg text-stone-400	flex items-center">
                                        {{ item.reviews_avg}}
                                        <svg 
                                        class="w-3 h-3"
                                        viewBox="0 -32 576 576" xmlns="http://www.w3.org/2000/svg"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/>
                                        </svg>
                                    </h4>
                                    <span> {{ item.comments_count > 1 ? item.comments_count+' reviews' : item.comments_count+' review' }}</span>
                                </a>
                            </div>    
                       
                        </div>
                        <div class=" absolute  left-2/4 -translate-x-1/2 -top-full z-auto mb-4">
                            <img class="rounded-full h-36 w-36" :src="user.image">
                            
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

            <div v-if="user" class="text-center mt-12">
                    <div class="flex items-center justify-center">
                             <h4 class="mr-1 text-2xl font-semibold">{{user ? user.name+' '+user.lastname : ''}}</h4>
                             <template v-if="user.identity_verified_at">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                             </template>       
                        </div>     
                        <div class="flex justify-center items-center mb-6 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-stone-500" viewBox="0 0 20 20" fill="currentColor">
                           <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                                <span class="text-xl">
                                    {{user.city}}
                                </span>

                        </div>
                          <!-- User professions--> 
                          <template v-if="user.professions">
                                <div v-for="profession in user.professions" class="flex justify-center items-center mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-stone-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                    </svg>
                                    <span class="ml-1 text-lg">{{profession.title}}</span>
                                </div>
                          </template>       
                   
            </div>

        <!-- ================================================================== -->
        <div class="flex flex-col items-center mt-12 mb-4">
            <h3 class="text-xl font-semibold">About Me</h3>
            <p class="text-center">
                    An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, 
                    performs and records all of his own music, giving it a warm, 
                    intimate feel with a solid groove structure. An artist of considerable range.
            </p>   
        </div>
        <!-- =============Galery starts ========= -->
        <template v-if="user.professions && user.professions.length > 0">
                <div :class="showgalery ? returnwidthstyle(widthstyle)+' cursor-pointer  flex justify-around border-b-2 mb-8 relative after:content after:absolute  after:h-1  after:bg-red-400 after:left-0 after:top-full' : 'hidden'">
                   <!-- Galery header -->
                    <div v-for="profession in user.professions" >
                        <div 
                        class=" flex items-center mb-4"
                        @click="getportfoliogaleryimage(user.id,profession.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>{{profession.title}}</span>
                        </div>        
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
        </template>    
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
                     <div v-if="contacMethod == 'byMessage'"> <!-- wraper start -->
                        <!-- textarea starts-->
                        <div class="none flex flex-col px-6 py-5 bg-gray-50">
                            <p class="mb-2 font-semibold text-gray-700">Message</p>
                            <textarea
                                type="text"
                                v-model="messageBody"
                                placeholder="Type Your message..."
                                class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36 resize-none"
                            ></textarea>
                        </div>
                        <!-- textarea Ends-->
                        <!-- Buttons starts-->
                        <div
                        class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                        >
                            <p 
                            @click="actionmodaldisplay(-1)"
                            class="font-semibold text-gray-600 cursor-pointer"
                            >Cancel</p>
                            <button 
                            @click="contact()"
                            class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                                Send
                            </button>
                        </div>
                        <!-- Buttons Ends-->
                    </div><!-- wraper ends -->   
                     <div v-if="contacMethod == 'byPhone'"> <!-- wraper start -->
                        <!-- textarea starts-->
                        <div class="flex flex-col justify-center px-6 py-5 bg-gray-50">
                            <div class="flex items-center justify-center"> 
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </span>
                                <p class="ml-1 font-semibold text-gray-700">+212 6 11 75 10 53</p>   
                            </div>
                            
                        </div>
                        <!-- textarea Ends-->
                    </div><!-- wraper ends -->   

                    <!-- login to start contacting starts -->
                       <div v-if="contacMethod == 'pleaseLogIn'"> <!-- wraper start -->
                        <!-- textarea starts-->
                        <div class="flex flex-col justify-center px-6 py-5 bg-gray-50">
                             <!-- login to report starts-->
                          <div  class="bg-white flex items-center h-24 w-full justify-center  " >
                              <div  @click="actionmodaldisplay(-1)" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500">Cancel</div>
                               <div @click="loginrequested" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Log In</div>
                         </div>
                         <!-- login to report Ends-->
                            
                        </div>
                        <!-- textarea Ends-->
                    </div><!-- wraper ends -->  
                    <!-- login to start contacting Ends-->
                    
<!------- ---------------------------------------------------------------------------- -->
                    <div v-if="!isNaN(contacMethod)" class=""> <!-- wraper start  (main) -->
                        <!-- textarea starts-->
                             <div class="flex flex-col px-6 py-5 bg-gray-50">
                            <p class="mb-2 font-semibold text-gray-700">Available contact Methods</p>
                            <div class="flex items-center mb-4">
                                    <input id="country-option-1" type="radio" name="reportreason" 
                                    v-model="contacMethod"
                                    value="0" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
                                    <label class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                      <span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        </span>
                                      <span class="ml-1">Contact By Phone</span>
                                    </label>
                            </div>
                            <div class="flex items-center mb-4">
                                    <input id="country-option-1" 
                                    type="radio" name="reportreason" 
                                    v-model="contacMethod"
                                    value="1" 
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1">
                                      <label class="flex items-center ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                      <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        </span>
                                      <span class="ml-1">Contact By Message</span>
                                    </label>
                            </div>
                    </div>
                        <!-- textarea Ends-->
                        <!-- Buttons starts-->
                        <div
                        class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                        >
                            <p 
                            @click="actionmodaldisplay(-1)"
                            class="font-semibold text-gray-600 cursor-pointer"
                            >Cancel</p>
                            <button 
                            @click="contacmethod(contacMethod)"
                            class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                                Send
                            </button>
                        </div>
                        <!-- Buttons Ends-->
                    </div><!-- wraper ends --> 
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
                    <!-- Report form starts -->
                    <div v-if="report_status == 202"class="flex flex-col px-6 py-5 bg-gray-50">
                            <p class="mb-2 font-semibold text-gray-700">Report Reason</p>
                            <div class="flex items-center mb-4">
                                    <input id="country-option-1" type="radio" name="reportreason" 
                                    v-model="reason"
                                    value="0" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
                                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    an apropriate profile
                                    </label>
                            </div>
                            <div class="flex items-center mb-4">
                                    <input id="country-option-1" 
                                    type="radio" name="reportreason" 
                                    v-model="reason"
                                    value="1" 
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1">
                                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Fake profile
                                    </label>
                            </div>
                            <div class="flex items-center mb-4">
                                    <input id="country-option-1" type="radio" name="reportreason" 
                                    v-model="reason"
                                    value="3" 
                                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1">
                                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Identity thief
                                    </label>
                            </div>
                    </div>
                    <!-- Report form Ends -->
                    <!-- Succes-full report starts-->
                        <div v-if="report_status == 201 || report_status == 208" class="bg-white flex items-center h-24 w-full justify-center  " >
                            <span class="mr-2">
                                <svg 
                                class="h-8 w-8 fill-green-400 animate-ping"
                                viewBox="0 0 512 512" 
                                xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/></svg>
                            </span>
                            <h3>{{report_status == 201 ? 'Successfully Reported' : 'We are working on your report' }} <strong>Thank you !</strong></h3>
                        </div>
                        <!-- Succes-full report End-->
                        <!-- login to report starts-->
                          <div v-if="report_status == 401" class="bg-white flex items-center h-24 w-full justify-center  " >
                            <div  @click="actionmodaldisplay(-1)" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500">Cancel</div>
                             <div @click="loginrequested" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Log In</div>
                         </div>
                         <!-- login to report Ends--> 
                    <div
                    v-if="report_status == 202"
                    class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                    >
                    <p 
                    @click="actionmodaldisplay(-1)"
                    class="font-semibold text-gray-600 cursor-pointer"
                    >Cancel</p>
                    <button 
                    v-on:click="report"
                    class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                        Report
                    </button>
                    </div>
                </div>
            </div>
    <!-- Contact modal Ends --> 
    
    <!-- comments section foreach profession -->
            <div :class="actionmodals == 3 ? 'absolute top-0 left-2/4 -translate-x-2/4 -translate-y-2/4  z-40 flex' : 'hidden' ">
                <c-comments
                    v-bind:comments="comments_data"
                    v-bind:isconnected="belongsto"
                    v-on:input-edit-comment="editcommentvalue"
                    v-on:input-edit-reply="editreplyvalue"
                    v-on:input-reply="getreplyvalue"
                    v-on:input-comment="getcommentvalue"
                    v-on:delete-reply="deletecomment"
                    v-on:delete-comment="deletereply"
                    v-on:save-updated-comment="updatecomment"
                    v-on:save-updated-reply="updatereply"
                    v-on:canceltrigger="actionmodals = -1"
                ></c-comments>
            </div>
        

    

    </div><!-- container -->
</main>
</div><!-- end root -->
</template>
<script>
import comments from './comments'
import header from './header'
export default {
    components:{
        'c-comments' : comments,
        'c-home-header' : header,
    },
    data(){
        return{
        showgalery:false,
        actionmodals:-1,
        user:undefined,
        widthstyle:undefined,
        comment:'',
        reply:'',
        edit_comment:'',
        edit_reply:'',
        portfolio_id:undefined,
        comments_data:undefined,
        belongsto:undefined,
        reason:0,
        report_status:undefined,
        messageBody:undefined,
        contacMethod:0,
        phoneNumber:undefined,
        isconnected:undefined,
        loginrequestToheader:undefined
        }
    },
 
    methods:{
        // ? pusher setup
        connect:function(roomId){
            if(roomId){
                let vm = this
                this.loadCurrentConversation(roomId) ;
                window.Echo.private("chat-" +roomId).
                listen('newChatMessage', (e) =>{
                 vm.loadCurrentConversation(roomId);
                 console.log(e)
                });                           
            }
        },
         // ? disconnect from a chatroom
        disconnect:function(roomId){
            window.Echo.leave("chat-"+roomId)
        },
        loadCurrentConversation:function(value){
            axios.get('/api/load-conversation',{
                params:{
                    conversation:value
                }
            }).then()
        },
        contacmethod:function(method){
            if(method == 0){
                axios.get('/api/check').then(response => this.isconnected = response.data.islogedin)
                if(this.isconnected){
                    this.contacMethod = 'byPhone'
                    axios.get('/api/user-phone',{
                        params:{
                            username: this.$route.query.username
                        }
                    }).then(response => {
                        console.log(response.data)
                        this.phoneNumber = response.data.phone
                    })
                }
                else{
                    this.contacMethod = 'pleaseLogIn'
                }
            }
            else if(method == 1){
                 axios.get('/api/check').then(response => this.isconnected = response.data.islogedin)
                if(this.isconnected){
                 this.contacMethod = 'byMessage'
                }
                else{
                    this.contacMethod = 'pleaseLogIn'
                }
            }
            
        },
        // ? request login fom pop-up
        loginrequested:function(){
            this.actionmodaldisplay(-1)
            this.loginrequestToheader = true
        },
        getcommentvalue:function(value){
            this.comment = value
        },
        getreplyvalue:function(value){
            this.reply = value
        },
        editcommentvalue:function(value){
            this.edit_comment = value
        },
        editreplyvalue:function(value){
            this.edit_reply = value
        },

        // *-------------------------
     actionmodaldisplay:function(val){
         this.loginrequestToheader = false
         if(val == 1){
             this.contacMethod = 0
         }
            this.actionmodals = val
            
            if(val === 2 ){
                this.checkreport()
            }
        },
        getuserprofile:function(){
            let profiletofetch = this.$route.query.username
            axios.get('/api/user-profile',{
                params:{
                    username:profiletofetch
                }
            }).then(response => response.status == 200 ? [this.user = response.data, this.widthstyle = response.data.professions.length  ,console.log(response)] : console.log("error"))
     
        },
        returnwidthstyle:function(value){
            if(this.widthstyle == 2){
                return  'after:w-2/4'
            }
            else if(this.widthstyle == 3){
                return 'after:w-1/3'
            }
            else{
                return 'after:w-full'
            }
        },
        getportfoliogaleryimage:function(user,value){
            axios.get('/api/profession-galery',{
                params:{ 
                    profession:value,
                    username:user
                }
            }).then(response => console.log(response))
        },
        // ? get reviews
        getreviews:function(value){
            this.actionmodals = 3
            this.portfolio_id = value
            axios.get('/api/comments',{
                params:{
                    portfolio:value 
                }
            }).then(response => {
                this.comments_data = response.data.comments, 
                this.belongsto = response.data.isconnected
                })
        },
        // ? create new comment
        createcomment:function(){
            axios.post('/api/comments/create',{
                portfolio:this.portfolio_id,
                body:this.comment
            }).then(response=> console.log(response))
        },
        // ? update comment 
        updatecomment:function(value){
            axios.put('/api/comments/update',{
                comment:value,
                body:this.comment
            }).then(response => console.log(response))
        },
        // ? delete comment
        deletecomment:function(value){
            axios.delete('/comments/delete',{
                data:{
                    comment:value
                }
            })
        },
        // ? create reply 
        createreply:function(){
            axios.post('/api/reply/create',{
                comment:this.comment_id,
                body:this.reply
            })
        },
        // ? update reply
        updatereply:function(value){
            axios.put('/api/reply/update',{
                reply:value,
                body:this.reply
            }).then(response => console.log(response))
        },
        // ? delete reply
        deletereply:function(value){
            axios.delete('/api/reply/delete',{
                data:{
                    reply:value
                }    
            }).then(response => console.log(response))
        },
        // * ================= Report method ===============
        report:function(){
            axios.post('/api/new-report',{
                params:{
                    username:this.$route.query.username,
                    reason:this.reason
                }
            }).then(response => this.report_status = response.data.status)
        },
        checkreport:function(){
            axios.get('/api/report-status',{
                params:{
                    username:this.$route.query.username,
                }
            }).then(response => this.report_status = response.data.status) //
        },
        contact:function(){
            if(this.messageBody !=''){
                 axios.post('/api/contact',{
                message:this.messageBody,
                username:this.$route.query.username,
                }).then(response => {
                    this.messageBody = ''
                    this.connect(response.data)
                }) 
            }
           
        }
     },//methods
 
    mounted(){
        this.getuserprofile()
    }
}
</script>