<template>
<div>

    <c-header></c-header> <!--header--> 



        <div class="flex  antialiased text-gray-800">
            <div class="flex flex-row h-full w-full overflow-x-hidden">
            <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
                <div class="flex flex-row items-center justify-center h-12 w-full">
                <div
                    class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10"
                >
                    <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    ></path>
                    </svg>
                </div>
                <div class="ml-2 font-bold text-2xl">QuickChat</div>
                </div>
               
                <div class="flex flex-col mt-8">
                <div class="flex flex-row items-center justify-between text-xs">
                    <span class="font-bold">Active Conversations</span>
                    <span
                    class="flex items-center justify-center bg-green-400 h-4 w-4 rounded-full">
                        {{conversations.length}}
                    </span
                    >
                </div>
                <div class="flex flex-col space-y-1 mt-4 -mx-2 h-140 overflow-y-auto">

                    <!-- One chat starts -->
                    <div v-for="(conversation,index) in conversations" :key="index"> <!-- div Wrapper -->
                        <button 
                        @click="loadCurrentConversation(conversation.conversation)"    
                        :class="[currentconversation == conversation.conversation ? 'ml-8 bg-blue-400':'','flex flex-row items-center hover:bg-gray-100 rounded-xl p-2']"
                        >
                        <div 
                        class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                        {{conversation.sender.charAt(0)}} <!-- Avatar place holder -->
                        </div>
                        <div class="ml-2 text-sm font-semibold">{{conversation.sender}}</div> <!-- Chat User -->
                        </button>
                    </div>    
                    <!-- One chat ends -->

                    <!-- One chat  with message notification starts-->
                    <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                    <div
                        class="flex items-center justify-center h-8 w-8 bg-gray-200 rounded-full"
                    >
                        L
                    </div>
                    <div class="ml-2 text-sm font-semibold">Marta Curtis</div>
                    <div class="flex items-center justify-center ml-auto text-xs text-white bg-red-500 h-4 w-4 rounded leading-none">
                        2 <!-- notification -->
                    </div>
                    </button>
                    <!-- One chat  with message notification Ends-->
                    
                </div>
            
                </div>
            </div>
            <div class="flex flex-col flex-auto  p-6 h-80vh">
                <div
                class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4"
                >
                <div class="flex flex-col h-full overflow-x-auto mb-4">
                    <div class="flex flex-col-reverse h-full overflow-y-auto">
                    <div class="grid grid-cols-12 gap-y-2 ">
                        <!-- message sender start -->
                        <template v-for="message in messages"> <!-- message wrapper -->
                            <div v-if="message.connecteduser != message.correspondent" class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                    A
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>{{message.message}}</div> <!-- who im chating with message -->
                                        <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                                            Seen
                                        </div> <!-- who im chating with time info -->
                                    </div>
                                </div>
                            </div>
                           
                         <!-- message sender end -->

                        <!-- connected user message start -->
                        <div v-else class="col-start-6 col-end-13 p-3 rounded-lg"> 
                            <div class="flex items-center justify-start flex-row-reverse">
                                <div
                                class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                >
                                A
                                </div>
                                <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                <div>{{message.message}}</div> <!-- my chating  message -->
                                <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                                    Seen
                                </div> <!-- my chating  message time info -->
                                </div>
                            </div>
                        </div>
                        <!-- connected user message start -->
                    </template> 
        

                    </div>
                    </div>
                </div>

                <!-- input form -->
                <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">

                    <div class="flex-grow">
                    <div class="relative w-full">
                        <textarea
                        v-on:keyup.enter="newMessage(currentconversation)"
                        v-model="messageBody"
                        type="text"
                        class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10 resize-none no-scrollbar"
                        >
                        </textarea>
            
                    </div>
                    </div>
                    <div class="ml-4">
                    <submit 
                    @click="newMessage(currentconversation)"
                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                        <span>Send</span>
                        <span class="ml-2">
                        <svg
                            class="w-4 h-4 transform rotate-45 -mt-px"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                            stroke-linecap="round" 
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                            ></path>
                        </svg>
                        </span>
                    </submit>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

</div>
</template>
<script>
import header from '../index/header'
export default {
    components:{
        'c-header' :header,
    },
    data(){
        return{
            conversations: undefined,
            messages : undefined,
            currentconversation:undefined,
            messageBody:undefined
        }
    },
    watch:{
        currentconversation:function(val, oldval){
            if( oldval ){
                this.disconnect( oldval )
            }
                this.connect()
          
        }
    },
    methods:{
        // ? pusher setup
        connect:function(){
            if(this.currentconversation){
                let roomId = this.currentconversation
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
        // ? get connected user  ALL conversations
        getuserconversations:function(){
            axios.get('/api/get-all-conversation').then(response => {
                            this.conversations = response.data ,
                            response.data.length > 0 ? this.loadCurrentConversation(response.data[0].conversation) : console.log('no active conversation'),
                            response.data.length > 0 ?  this.currentconversation = response.data[0].conversation : ''
                            })

        },
        loadCurrentConversation:function(value){
            this.currentconversation = value
            axios.get('/api/load-conversation',{
                params:{
                    conversation:value
                }
            }).then(response => { this.messages = response.data,
                                 console.log(response)                             
                                 })
        },
        newMessage:function(value){
            if(this.message != ''){
                axios.post('/api/new-message',{        
                    conversation:this.currentconversation,
                    message:this.messageBody
                }).then(response => {
                         this.messages.push(response.data),
                         this.messageBody = ''

                })
            }
            
        }
    },
    mounted(){
        this.getuserconversations()

    }
    
}
</script>