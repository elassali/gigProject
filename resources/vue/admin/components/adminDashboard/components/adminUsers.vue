<template>
<!-- //! users data table -->
 <!-- component -->
<div class=" relative overflow-x-auto w-full">
        <div class="min-w-screen min-h-screen bg-gray-100 p-2 flex justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-6/6">

               <!-- header of data table start -->
                <div class="sm:flex items-center justify-between bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="flex items-center">
                        <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href=" javascript:void(0)">
                            <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                <p>All</p>
                            </div>
                        </a>
                        <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Done</p>
                            </div>
                        </a>
                        <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Pending</p>
                            </div>
                        </a>
                    </div>
                    <div class="flex space-x-2">
                            <div class=" relative flex items-center rounde-md rounded-md">
                                <input class="flex-grow outline-none text-gray-600 focus:text-blue-600" type="text" placeholder="Search Customer..." />
                                <span class="absolute right-0 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-blue-400 transition duration-100 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                            </div>
                            <button onclick="popuphandler(true)" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                               <p class="text-sm font-medium leading-none text-white">Add Task</p>
                            </button>
                    </div>    
                </div>
        <!-- header od data table end -->

                <div class="bg-white shadow-md rounded mb-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">User Name</th>
                                <th class="py-3 px-6 text-left">Full Name</th>
                                <th class="py-3 px-6 text-center">Date Of Birth</th>
                                <th class="py-3 px-6 text-center">last session</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">

                            <tr v-for="user in users" class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" :src="user.profilePicture"/>
                                        </div>
                                        <span>{{user.username}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{user.fullname}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ReadableDate(user.date_of_birth)}}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ReadableDate(user.last_session)}}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span :class="[user.isrestricted ? 'bg-red-600' : 'bg-green-600' ,'font-medium  text-purple-200 py-1 px-3 rounded-full text-xs']">
                                        {{user.isrestricted ? 'Suspended' : 'Active'}}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a 
                                        :href="'/profile?username='+user.username"
                                        target="_blank"
                                        class="cursor-pointer w-4 mr-3 transform hover:text-purple-500 hover:scale-110">
                                            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            
                                        </a>
                                        <div class=" cursor-pointer  w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div
                                    @click="[deleteconfirmation = true,userid = user.id]" 
                                        class=" cursor-pointer  w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg v-show="!user.isrestricted" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" fill="currentColor">
                                             <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                            </svg>
                                            <svg v-show="user.isrestricted" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" fill="currentColor">
                                             <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            
                        </tbody>
                    </table>
                    <!-- navigation section start-->
                    <div
						class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
						<span class="text-xs xs:text-sm text-gray-900">
                            Showing {{pagination.showingFrom}} to {{pagination.showingTo}} of {{pagination.totalrecorde}} Entries
                        </span>
						<div class="inline-flex mt-2 xs:mt-0">
							<button
                                @click="allusers(pagination.previous)"
                                :disabled= "pagination.previous  ? false : true "
                                :class="[pagination.previous ? '' : 'cursor-not-allowed bg-indigo-300' ,'text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l']">
                                Prev
                            </button>
							&nbsp; &nbsp;
							<button
                                @click="allusers(pagination.next)"
                                :disabled= "pagination.next  ? false : true "
                                :class="[pagination.next ? '' : 'cursor-not-allowed bg-indigo-300' ,'text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l']">
                                Next
                            </button>
						</div>
					</div>
                    <!-- navigation section end-->
                </div>
            </div>
        </div>
            <c-confirmation
                :showConfirmation="deleteconfirmation"
                :text="'after your confirmation user will be suspended '"
                v-on:cancelActon="confirmation"
                v-on:confirmActon="confirmation"
            >
            </c-confirmation>
            <c-alert
            :called="alertCall"
            :text="alertText"
            >
            </c-alert>
    </div>   


</template>
<script>
import confirmation from '../../confirmationModal'
import alert from '../../alert'
export default {
    components:{
        'c-confirmation' : confirmation,
        'c-alert' : alert
    },
    data(){
        return{
            users:undefined,
            pagination:{
                totalrecorde:undefined,
                previous:undefined,
                current:undefined,
                next:undefined,
                showingFrom:undefined,
                showingTo:undefined,
            },
            deleteconfirmation:false,
            alertCall:false,
            alertText:undefined,
            userid:undefined

        }
    },
    methods: {
        allusers:function(page = 1 ){
            axios.get('/api/admin/allusers?page='+page)
            .then(response => {
                this.users = response.data.data.data,
                this.pagination.totalrecorde = response.data.data.total,
                response.data.data.current_page == 1 ?  this.pagination.previous = null : this.pagination.previous = response.data.data.current_page - 1
                this.pagination.current = response.data.data.current_page
                if(response.data.data.current_page < response.data.data.last_page && response.data.data.current_page > 1 ){
                    this.pagination.next = response.data.data.current_page + 1
                }
                else if( response.data.data.current_page == response.data.data.last_page ){
                    this.pagination.next = null
                }
                else{
                 this.pagination.next = 2
                }
                this.pagination.showingFrom = response.data.data.from
                this.pagination.showingTo = response.data.data.to
                
                console.log(response.data.data)
            })
            .catch(e => console.log(e))
        },
        ReadableDate:function(DOB){
            let date = new Date(DOB)
             return date.toLocaleString('en-Nz',{year:'numeric', month:'long' , day:'numeric'})   
        },
        banuser:function(userid){ //* restrict or unrestrict user
            try{
               let index =  this.users.findIndex(object =>{
                    return object.id == userid
                })
                if(this.users[index].isrestricted)
                {
                    console.log(userid)
                    axios.post('/api/admin/unsuspenduser',{userID:userid })
                    .then(response => {
                        console.log(response)
                        response.data.status == 201 ? this.users[index].isrestricted = 0 : console.log("error")
                        
                    })
                    
                }else{
                    console.log(userid)
                    axios.post('/api/admin/suspenduser',{userID:userid })
                    .then(response => {
                        console.log(response)
                        this.users[index].isrestricted = 1
                    })
                }        
                
                
            }catch(e){
                console.log(e)
            }
        },
        confirmation:function(value){
            if(value){
                this.deleteconfirmation = false
                this.banuser(this.userid)
                this.alertText="User succefully suspended"
                this.alertCall = true
                setTimeout(() => {   this.alertCall = false; }, 1500) 

            }
            else{
                this.deleteconfirmation = false
            }
        },
    },
    computed:{
      
    },
    mounted() {
        this.allusers()
    },

}
</script>