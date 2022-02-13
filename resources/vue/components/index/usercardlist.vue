<template>
    <section class="">
         <!-- This is an example component -->
        <div class="flex items-center mx-4 my-4 h-full justify-center grid lg:grid-cols-4 sm:grid-cols-1 md:grid-cols-2  gap-1 ">
            <div class='flex max-w-xl rounded shadow-lg bg-neutral-400 ' v-for="item in 6">
                <div class='  flex items-center px-6 py-6 md:flex-wrap lg:flex-nowrap md:justify-center lg:justify-start'>
                    <img class='w-16 h-16 rounded-full object-cover' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                    
                    <div class='mx-2'>
                        <p class='text-blue-600'>@ayamsayur</p>
                        <p class='text-gray-400'>ayam sayur</p>   
                        <p class="flex items-center justify-center">
                                        3.2
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                                        
                        </p>             
                    </div>

                
                <div class="sm:flex">
                    <div class='mx-2'>
                            <div class="flex items-center justify-center  ">
                            <div class="flex relative items-center"> 
                                <p class=" font-semibold text-center mr-1 sm:text-xs ">Jobs</p>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                  class="h-4 w-4 stroke-sky-600" 
                                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg> 
                            <!-- tool tips  -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                @mouseover="isToolTipHover = 1"
                                @mouseleave="isToolTipHover = 0"
                                 class="h-5 w-5 cursor-pointer  fill-sky-500 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div :class="[isToolTipHover == 1 ? 'absolute bg-black bg-opacity-50 text-white text-xs rounded py-1 px-4 left-[37%] bottom-full' : 'hidden']">
                                    Tooltip center 1
                                    <svg class="absolute text-black h-2 w-full left-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"/></svg>
                                </div>
                            </div> 
                            
                            </div>
                            <p class='text-blue-500 text-center'>50</p>                
                    </div>
                    <div class='mx-2'>
                            <div class="flex items-center justify-center ">
                            <div class="flex relative items-center"> 
                                <p class="font-bold text-center sm:text-xs ">Jobs</p>
                            <!-- tool tips  -->
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                @mouseover="isToolTipHover = 2"
                                @mouseleave="isToolTipHover = 0"
                                class="h-5 w-5 fill-sky-500 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div :class="[isToolTipHover == 2 ? 'absolute bg-black bg-opacity-50 text-white text-xs rounded py-1 px-4 left-[16%] bottom-full' : 'hidden']">
                                    Tooltip center 2
                                    <svg class="absolute text-black h-2 w-full left-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"/></svg>
                                </div>
                            </div> 
                            
                            </div>
                            <p class='text-blue-500 text-center'>50</p>
                    </div>
                </div>  

                     <div class="">
                          <button class="bg-black text-white px-4 py-1 rounded md:mt-1">Details</button>              
                    </div>
                </div>
                   
            </div>
        </div>
    <!-- This is an example component -->
    </section>

</template>
<script>
export default {
    
    data(){
        return{
            isToolTipHover:undefined
        }
    },
  
    
    
}
</script>
