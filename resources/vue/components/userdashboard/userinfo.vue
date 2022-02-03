<template>
<div class="bg-gray-100">
 

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="relative image overflow-hidden rounded-full">
                        <img class="h-auto w-full mx-auto rounded-full"
                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                            alt="Profile Picture"
                        >
                        <div :class="editmode ? ' ease-in duration-300 opacity-100 absolute text-center  top-3/4  w-full h-full flex justify-center bg-black opacity-70' : 'hidden'">
                             <div class="relative underline text-secondary">
                             click to edit
                             <input type="file" class="absolute w-full h-full opacity-0 top-0 left-0 cursor-pointer"/>
                             </div>
                         </div>
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Jane Doe</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner at Her Company Inc.</h3>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">Nov 07, 2016</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
              
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-4 border-b justify-between">

                            <div class="flex items-center ">
                                <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                </span>
                                <span class="tracking-wide">About</span>
                            </div>
                            
                            <div
                            v-on:click="editmode = !editmode"
                             class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" :class="editmode ? 'h-5 w-5' : 'hidden'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <a :class="!editmode ? 'text-blue-700 text-xs' : 'hidden'">Save Change</a>
                            </div>
                            
                            
                    </div>
                        
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                   <div :class="editmode ? '':'px-4 py-2'">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                               </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                 <div :class="editmode ? '':'px-4 py-2'">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                   <div :class="editmode ? '':'px-4 py-2'">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                   <div :class="editmode ? '':'px-4 py-2'">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                   <div :class="editmode ? '':'px-4 py-2'">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                   <div :class="[editmode ? '':'px-4 py-2']">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                   <div :class="[editmode ? '':'px-4 py-2']">
                                        <c-baseinput
                                        :disabled="!editmode"
                                        :styleclass="editmode ? 'h-8 border mt-2 rounded  w-full bg-gray-50 pl-2 ' : 'bg-white'"
                                        ></c-baseinput>
                                    </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                   <div :class="[editmode ? '':'px-4 py-2']">
                                        <template v-if="editmode">
                                            <c-basedatepiker
                                            >                                       
                                            </c-basedatepiker>
                                        </template>
                                        <template v-else>
                                             <div class="px-4 py-2">Female</div>
                                        </template>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                        Full Information</button>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

             
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</template>
<script>
import inputfloatlabel from '../../admin/components/inputs/baseinput'
import basedatepiker from '../../admin/components/inputs/basedatetime'
export default {
    data(){
        editmode: false,
    }
}
</script>