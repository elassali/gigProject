 <view-page
        :user="users"
         v-on:datafromsecondchild="fileDatafromcompo"
         v-on:Datafromdatecomponent="datafromdatecompo"
        >
</view-page> 




// later
  <home-admin>
            <admin-form
            :dataload="userses" 
            v-on:datafromthirdondchild="Imagefromcomponent"
            v-on:datecomponentdate="DateFromDateComponent"
            >
            
            </admin-form>
</home-admin>

<!-- start section -->

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