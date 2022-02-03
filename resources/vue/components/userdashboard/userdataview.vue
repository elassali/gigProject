<template> 
 <!-- opperation page Start --> 
<div :class="createjobform ? 'relative after:content after:absolute after:w-full after:h-screen	 after:top-0 after:opacity-80 after:bg-black' : ''">   
                    
                                <div class="w-full h-full  flex  py-4 my-4 border-b-2 justify-between">     
                                        <div class="flex items-center ml-4">
                                            <a class="text-gray-600 dark:text-gray-400 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                    <line x1="16" y1="5" x2="19" y2="8" />
                                                </svg>
                                            </a>
                                            <a class="text-gray-600 dark:text-gray-400 mx-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </a>
                                            <a class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2" />
                                                </svg>
                                            </a>
                                            <a class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <rect x="8" y="8" width="12" height="12" rx="2" />
                                                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                                </svg>
                                            </a>
                                            <a class="text-red-500 p-2 border-transparent border bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                    <line x1="4" y1="7" x2="20" y2="7" />
                                                    <line x1="10" y1="11" x2="10" y2="17" />
                                                    <line x1="14" y1="11" x2="14" y2="17" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </a>
                                        </div>
                                        <!--============================================================================== --> 
                                        <div class="w-full  flex  lg:flex-row items-start items-center justify-end mr-4">
                                            <div class="flex items-center lg:border-l lg:border-r border-gray-300 py-3 lg:py-0 lg:px-6">
                                                <p class="text-sm text-gray-600 dark:text-gray-400">Viewing 1 - 20 of 60</p>
                                                <a class="text-gray-600 dark:text-gray-400 ml-2 border-transparent border cursor-pointer rounded" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <polyline points="15 6 9 12 15 18" />
                                                    </svg>
                                                </a>
                                                <a class="text-gray-600 dark:text-gray-400 border-transparent border rounded focus:outline-none cursor-pointer" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                </a>
                                            </div>


                                            <div class="flex items-center">
                                                <div
                                                @click="createjobform = !createjobform"
                                                 class="text-white ml-4 cursor-pointer focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 w-8 h-8 rounded flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <line x1="12" y1="5" x2="12" y2="19" />
                                                        <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg> 
                                                </div>
                                            </div>
                                        </div>
                                </div>
               <div class="w-full">
                    <table class="min-w-full bg-white dark:bg-gray-800"> 
                        <thead>
                            <tr class="w-full h-16 border-gray-300 border-b py-8">
                                <th class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4 text-center">
                                    <input type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 outline-none"  />
                                </th>
                                <th class="text-gray-600 dark:text-gray-400 font-semibold pr-6 text-left text-sm tracking-normal leading-4 text-center">I need</th>
                                <th class="text-gray-600 dark:text-gray-400 font-semibold  pr-6 text-left text-sm tracking-normal leading-4 text-center">Job Date</th>
                                <th class="text-gray-600 dark:text-gray-400 font-semibold  pr-6 text-left text-sm tracking-normal leading-4 text-center">Expire at</th>
                                <th class="text-gray-600 dark:text-gray-400 font-semibold  pr-6 text-left text-sm tracking-normal leading-4 text-center">City</th>
                                <th class="text-gray-600 dark:text-gray-400 font-semibold  pr-6 text-left text-sm tracking-normal leading-4 text-center">Status</th>
                                <th class="text-gray-600 dark:text-gray-400 font-semibold  pr-6 text-left text-sm tracking-normal leading-4 text-center">
                                    <div class="opacity-0 w-2 h-2 rounded-full bg-indigo-400"></div>
                                </th>
                                <td class="text-gray-600 dark:text-gray-400 font-semibold  pr-8 text-left text-sm tracking-normal leading-4">More</td>
                            </tr>
                        </thead>
                        <!-- Table body start --> 
                        <tbody>
                        <!-- data table row start -->
                            <tr v-for="item in dataload" :key="item.id" class="h-24 border-gray-300 border-b">
                                <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-center">
                                    <input type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 outline-none"  /> 

                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-center">{{item.name+' '+ item.lastname}}</td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-center">{{item.email}}</td>
                                <td class="pr-6 whitespace-no-wrap text-center">
                                        {{item.phone}}
                                </td>
                                <td class=" text-center text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{item.city}}</td>
                                <td class=" text-center text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{item.created_at}}</td>
                                <td class="pr-6 ">
                                    <div class="w-2 h-2 rounded-full bg-indigo-400"></div>
                                </td>
                                <td class="pr-8 relative">
                                    <div :class="[ moreaction == item.id ? 'dropdown-content mt-8 absolute left-0 -ml-12 shadow-md z-10  w-32' : 'hidden']">
                                        <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                                            <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                                            <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                                            <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Details</li>
                                        </ul>
                                    </div>
                                    <button 
                                    v-on:click="actiontoggle(item.id)"
                                    class="text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical dropbtn" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        <!-- data table row start -->
                    
                        
                        </tbody>
                    </table>
                </div>
        <!-- create job component -->
        <div :class="createjobform ?  'absolute top-0 left-2/4 -translate-x-2/4 min-h-screen rounded-3xl flex flex-col justify-center z-10' : 'hidden'">
        <div class="relative sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="flex items-center space-x-5">
                <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                    <h2 class="leading-relaxed">Create an Event</h2>
                    <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                </div>
                </div>
                <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                   <div class="flex flex-col">
             
                        </div>
                        <div class="flex flex-col">
                        <c-baseinput
                        label="love"
                        >
                        </c-baseinput>
                        </div>
                        
                         <div class="flex items-center space-x-4">
                            <div class="flex flex-col">
                                <c-basedatepicker
                                label="Date Of Job"
                                >
                                </c-basedatepicker>
                            </div>
                            <div class="flex flex-col">
                                <c-basedatepicker
                                label="Expire at"
                                >
                                </c-basedatepicker>
                            </div>
                        </div>
                        <div class="flex flex-col">
                        <label class="leading-loose">Event Description</label>
                            <textarea required="" name="message" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 resize-none" placeholder="Enter your comapny info" spellcheck="false"></textarea>            </div>
                </div>
                </div>
                <div class="pt-4 flex items-center space-x-4">
                    <button
                     @click="createjobform = !createjobform"
                     class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                    </button>
                    <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- create job component end-->     
</div>

        
             



</div><!-- opperation page End -->  
</template>
<script>
import baseinput from '../../admin/components/inputs/baseinput'
import basedatepicker from '../../admin/components/inputs/basedatetime'
export default {
    props:["dataload"],
    components:{
        'c-baseinput': baseinput,
        'c-basedatepicker' : basedatepicker
    },
    data(){
        return{
            moreaction:false,
            ismoreactionopen:undefined,
            createjobform: false,
        }
    },
    methods:{
        actiontoggle:function(val){
            if(val == this.ismoreactionopen)
            {
                this.moreaction = -1
                this.ismoreactionopen =  -1
            }
            else{
                this.moreaction = val
                this.ismoreactionopen =  val
            }     
        },   
    },
 
    
    mounted(){
        
        
    },
}
    
</script>