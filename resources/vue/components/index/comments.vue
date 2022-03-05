<template>
<div class="antialiased mx-auto max-w-screen-sm bg-white shadow-lg px-4 py-4 rounded-lg">
  <div class="flex justify-between">
    <h3 class="mb-4 text-lg font-semibold text-gray-900">Reviews</h3>
     <button @click="cancelcomment()" class="top-0 right-0 absolute p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
      </button>
  </div>


  <div class="space-y-4 overflow-x-auto max-h-96 px-4">

    <div class="flex" v-for="item in comments">
      <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
      </div>
      <div class="relative flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
               <!-- edit button -->
            <div :class="isconnected == item.user_id ? 'absolute top-0.5 right-0.5' : 'hidden'">

                <button
                @click="keeppdatacomment(item.id, item.comment)"
                :class="editcomment == item.id ? 'hidden' : ''"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" 
                      :class="editcomment == item.id ? 'hidden' : 'h-5 w-5 stroke-black'" 
                      fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>    


                <div :class="editcomment == item.id ? 'flex p-0.5 space-x-2' : 'hidden'">
                  <button 
                  @click="editcomment = -1"
                  class="text-xs text-red-400">
                        Cancel
                  </button>
                  <button 
                  @click="$emit('save-updated-comment',item.id)"
                  class="text-xs text-green-400">
                        Save
                  </button>
                  <button
                        @click="$emit('delete-comment',item.id)"
                        class="text-xs text-red-800">
                        Delete                      
                  </button>
                
                </div>
            </div>
            <!-- End Edit button -->
          <div class="flex justify-between">
              <div>
                  <strong>{{item.full_name}}</strong> <span class="text-xs text-gray-400">{{item.comment_date.replace(/^(0)/,"")}}</span> 
              </div>    
      
         </div>

   <!-- when edit mode active show textarea else show paragraph (comment text) -->
            <textarea 
             v-bind:value="edited_comment"
             v-on:input="$emit('input-edit-comment', edited_comment = $event.target.value)"
             :class="editcomment == item.id ? 'description no-scrollbar max-h-28  w-full rounded-lg  resize-none bg-gray-100 sec p-3 h-40 border border-gray-300 outline-none' : 'hidden'"
             >{{item.comment.trim()}}</textarea>
   

            <p :class="editcomment == item.id ? 'hidden' : 'text-sm' ">
              {{item.comment.trim()}}
            </p>
  <!-- Ends when edit mode active show textarea else show paragraph (comment text) -->
  
   <div class="mt-4 flex items-center justify-between mb-8">
              <!-- reply with avatars and number of replies --> 
                 <div class="flex items-center cursor-pointer" @click="editreply = item.id">

                        <div class="flex -space-x-2 mr-2 " v-if="item.replies.length > 1" >
                          <img class="rounded-full w-6 h-6 border border-white"  :src="item.replies[0].avatar" alt="">
                          <img class="rounded-full w-6 h-6 border border-white"  :src="item.replies[1].avatar" alt="">
                        </div>
                        <div class="flex -space-x-2 mr-2 " v-else-if="item.replies.length > 0" >
                          <img class="rounded-full w-6 h-6 border border-white"  :src="item.replies[0].avatar" alt="">
                        </div>
                        
                        <div class="text-sm text-gray-500 font-semibold">
                          {{item.replies.length > 1 ? item.replies.length+' Replies' : item.replies.length > 0 ?'1 Reply' : 'Reply' }}
                        </div>
                  </div>
          <!-- reply with avatars and number of replies -->   

          <!-- review stars Start -->
                  <div class="flex mr-1 self-center">
                      <!-- full star -->
                      <svg v-for="star in item.comment_score"
                          class="w-4 h-4"
                      viewBox="0 -32 576 576" xmlns="http://www.w3.org/2000/svg"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>

                      <!-- empty star -->
                      <svg  class="w-4 h-4"  
                             v-for="star in 5 - item.comment_score" 
                            viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                         <path fill="var(--ci-primary-color, currentColor)" d="M494,198.671a40.536,40.536,0,0,0-32.174-27.592L345.917,152.242,292.185,47.828a40.7,40.7,0,0,0-72.37,0L166.083,152.242,50.176,171.079a40.7,40.7,0,0,0-22.364,68.827l82.7,83.368-17.9,116.055a40.672,40.672,0,0,0,58.548,42.538L256,428.977l104.843,52.89a40.69,40.69,0,0,0,58.548-42.538l-17.9-116.055,82.7-83.368A40.538,40.538,0,0,0,494,198.671Zm-32.53,18.7L367.4,312.2l20.364,132.01a8.671,8.671,0,0,1-12.509,9.088L256,393.136,136.744,453.3a8.671,8.671,0,0,1-12.509-9.088L144.6,312.2,50.531,217.37a8.7,8.7,0,0,1,4.778-14.706L187.15,181.238,248.269,62.471a8.694,8.694,0,0,1,15.462,0L324.85,181.238l131.841,21.426A8.7,8.7,0,0,1,461.469,217.37Z"/>
                      </svg>
                  </div>
    <!-- review stars Ends -->
    </div>

        <div :class="editreply == item.id ? 'space-y-4' : 'hidden'">
          <!-- One reply Starts -->
          <div class="flex ml-4" v-for="reply in item.replies ">
            <div class="flex-shrink-0 mr-3">
              <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" :src="reply.avatar"  alt="">
            </div>
            <div class="relative flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">

              <!-- edit button -->
            <div :class="isconnected == item.user_id ? 'absolute top-0.5 right-0.5' : 'hidden'">
                  <button
                      @click="keeppdatareply(reply.id,reply.reply)"
                      :class="editreply == reply.id ? 'hidden' : ''"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" 
                        :class="editreply == reply.id ? 'hidden' : 'h-5 w-5 stroke-black'" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                  </button>    
                  <div :class="editreply == reply.id ? 'flex p-0.5 space-x-2' : 'hidden'">
                      <button 
                      @click="editreply = -1"
                      class="text-xs text-red-400">
                            Cancel
                      </button>
                      <button 
                      @click="$emit('save-updated-reply',reply.id)"
                      class="text-xs text-green-400">
                            Save
                      </button>
                      <button
                      @click="$emit('delete-reply',reply.id)"
                        class="text-xs text-red-800">
                        Delete                      
                      </button>
                  </div>
            </div>
            <!-- End Edit button -->
              <strong>{{reply.full_name}}</strong> <span class="text-xs text-gray-400">{{reply.reply_date}}</span>
              <p :class="editreply == reply.id ?  'hidden' : 'text-xs sm:text-sm'"> <!-- remove hidden after finish textarea -->
               {{reply.reply}}
              </p>
              <textarea
              v-bind:value="edited_reply"
              v-on:input="$emit('input-edit-reply', edited_reply = $event.target.value)"
                :class="editreply == reply.id ? 'description rounded-lg no-scrollbar max-h-28 resize-none bg-white-100 sec p-3  border border-gray-300 outline-none bg-white  w-full mt-2' : 'hidden'" 
              >{{reply.reply}}</textarea>
              
            </div>
          </div>
          <!-- One reply Ends -->

          <!--  new reply form  to submit a reply Starts -->
          <div :class="new_reply == reply.id ? 'flex' : 'hidden'">
            <div class="flex-shrink-0 mr-3">
              <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
            </div>
            <div class="flex w-full bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
              <textarea
                  class="description rounded-lg  resize-none bg-gray-100 sec p-3  border border-gray-300 outline-none bg-white h-14 w-full" 
                  spellcheck="false" 
                  placeholder="Reply....."
                   v-bind="$attrs"
                   v-bind:value="reply"
                   v-on:input="$emit('input-reply', reply = $event.target.value)"
              ></textarea>
                <div class="btn border border-indigo-500 p-1 h-fit self-center font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</div>
            </div>
          </div>
          <!--  reply form Ends -->
        </div>
      </div>
    </div>
  </div>
  <!-- Post new review form -->
  <div class="flex mt-3.5">
        <!-- side avatar -->
        <div class="flex-shrink-0 mr-3 h-0">
                <img src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=200&amp;h=200&amp;q=80" 
                alt="" class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10">
        </div>
          <!-- side avatar/ -->

        <div class="editor w-full flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg">
               <!-- stars -->
                  <div class="flex mr-1  mb-4">
                      <div class="flex items-center">
                          <!-- full star -->
                          <svg v-for="item in items"
                              @mouseover="reviewsui(item.id)"
                             
                              class="w-4 h-4 cursor-pointer"
                              :viewBox="selected.includes(item.id) ? '0 -32 576 576' : '0 0 512 512'" xmlns="http://www.w3.org/2000/svg">
                              <path :d="selected.includes(item.id) ? 'M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z' : 'M494,198.671a40.536,40.536,0,0,0-32.174-27.592L345.917,152.242,292.185,47.828a40.7,40.7,0,0,0-72.37,0L166.083,152.242,50.176,171.079a40.7,40.7,0,0,0-22.364,68.827l82.7,83.368-17.9,116.055a40.672,40.672,0,0,0,58.548,42.538L256,428.977l104.843,52.89a40.69,40.69,0,0,0,58.548-42.538l-17.9-116.055,82.7-83.368A40.538,40.538,0,0,0,494,198.671Zm-32.53,18.7L367.4,312.2l20.364,132.01a8.671,8.671,0,0,1-12.509,9.088L256,393.136,136.744,453.3a8.671,8.671,0,0,1-12.509-9.088L144.6,312.2,50.531,217.37a8.7,8.7,0,0,1,4.778-14.706L187.15,181.238,248.269,62.471a8.694,8.694,0,0,1,15.462,0L324.85,181.238l131.841,21.426A8.7,8.7,0,0,1,461.469,217.37Z'"/>
                          </svg>
                          
                       </div>   
                      <span class="text-sm text-black tracking-wide	ml-1 antialiased"> {{ items[selected.length -1] !== undefined ? items[selected.length -1]['advice'] : items[0]['advice']  }}</span>
                  </div>          
                  <textarea
                  v-bind="$attrs"
                   v-bind:value="comment"
                   v-on:input="$emit('input-comment',comment = $event.target.value)"
                   class="description rounded-lg  resize-none bg-gray-100 sec p-3 h-40 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this experience here">
                   </textarea>
          
          <!-- icons -->
          <div class="icons flex text-gray-500 m-2">
          <!-- ? Feature to add in the future < comment will accept images >
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
            -->
            <div class="count ml-auto text-gray-400 text-xs font-semibold">{{descriptionlength +'/300'}}</div>
          </div>
          <!-- buttons -->
          <div class="buttons flex">
            <div @click="cancelcomment()" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div>
            <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</div>
          </div>
        </div>
      </div>  
</div><!-- Root -->


</template>
<script> 
const items = [
             {id:1,advice:"Avoid"},
             {id:2,advice:"Bad"},
             {id:3,advice:"Acceptable"},
             {id:4,advice:"Good"},
             {id:5,advice:"Exceptional !"}, 
]
export default {
     props:["comments","isconnected"],
    data(){
      return{
        new_reply:undefined,
        // reviews section
        items,
        selected:[], 
        svghover:false,
        comment:'',
        edited_comment:'',
        reply:'',
        edited_reply:'',
        editcomment:undefined,
        editreply:undefined,
      }
    },
    methods:{
      // ? reviews ui method
      reviewsui:function(value){
        var j =1
        this.selected = []
        for(j ; j<=value ; j++){
          this.selected.push(j)
        }
      },
      cancelcomment:function(){
        this.$emit('canceltrigger')
      },
      keeppdatacomment:function(index ,comment){
        this.editcomment = index,
        this.edited_comment = comment

      },
      keeppdatareply:function(index , reply){
        this.editreply = this.new_reply = index,
        this.edited_reply = reply
      },
  
    },
    computed:{
      descriptionlength(){
        return this.comment.length
      },
  
    },
    watch:{
      comment:{
        handler:function(){
            var max = 299
            if(this.comment.length > max){
            this.comment = this.comment.substring(0,max+1)
            console.log(this.comment.length)
            }
        },
        deep:true
      }
    },

}
</script>
<style scooped>
/* Chrome, Safari and Opera */
.no-scrollbar::-webkit-scrollbar {
  display: none;
}

.no-scrollbar {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>