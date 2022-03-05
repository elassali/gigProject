<template>
 <div 
v-loosefocus="truenitfalse"
 class="h-16 z-0 clickdetection" >
                <label :for="label">{{label}}</label> 
                <div class="relative">
                <div class="flex absolute inset-y-0 w-full left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <!--  testing area-->
                <input
                v-bind="$attrs"
                @click="iscalenderopen = !iscalenderopen"
                v-bind:value="valueupdate ? valueupdate : value" 
                v-on:input="$emit('input',$event.target.value)" 
                type="text" 
                :placeholder="dateobject.currentdate ? dateobject.currentdate.toLocaleString('en-NZ',{year:'numeric',month:'long',day:'numeric'}) : ''"
                :class="styleclass"
                >
                </div> 
                <!-- date time piker -->
                <div 
                v-bind="$attrs"       
                :class="[iscalenderopen   ? 'datepicker-picker z-auto inline-block  rounded-lg bg-white dark:bg-gray-700 shadow-lg p-4' : 'hidden']">
                <div class="datepicker-header">
                    <div
                    class="datepicker-title bg-white dark:bg-gray-700 dark:text-white px-2 py-3 text-center font-semibold"
                    style="display: none;"
                    >
                    </div>
                <div class="datepicker-controls flex justify-between mb-2">
                <!-- previous month -->
            <button
                @click="previousMonth()"
                type="button"
                class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 prev-btn"
            >
                <svg
                class="w-4 h-4"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    fill-rule="evenodd"
                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                    clip-rule="evenodd"
                ></path>
                </svg>
            </button>
            <button
                type="button"
                class="text-sm rounded-lg text-gray-900 dark:text-white bg-white dark:bg-gray-700 font-semibold py-2.5 px-5 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 view-switch"
            >
                {{dateobject.monthString}} {{dateobject.today_year}}
            </button>
            <!-- next month button -->
            <button
                v-on:click="nextMonth()"
                type="button"
                class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 next-btn"
            >
                <svg
                class="w-4 h-4"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                ></path>
                </svg>
            </button>
            </div>
        </div>
        <div class="datepicker-main p-1 flex justify-center">
            <div class="datepicker-view">
            <div class="days">
                <div class="days-of-week grid grid-cols-7 mb-1">
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Su
                </span>
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Mo
                </span>
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Tu
                </span>
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    We
                </span>
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Th
                </span>
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Fr
                </span>
                <span class="dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Sa
                </span>
                </div>
                <div class="datepicker-grid w-64 grid grid-cols-7">


                        <span
                        v-for="i in dateobject.daysInMonth"
                        v-on:click="selectedDay(i)"
                        :class="[dateobject.todayday == i ? 'bg-blue-700 text-white hover:bg-blue-600': 'text-gray-900','datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center dark:text-white font-semibold text-sm day']"
                        >
                            {{i}}
                        </span>

               
                </div>
            </div>
            </div>
        </div>
        <div class="datepicker-footer">
            <div class="datepicker-controls flex space-x-2 mt-2">
            <button
                type="button"
                class="button today-btn text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2"
            >
                Today 
            </button>
            <button
                type="button"
                class="button clear-btn text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2"
                >
                Clear
            </button>
            </div>
        </div>
        </div>
</div>
</template>

<script>
export default {
    props:{
        label:{
            type:String,
            default:''
        },
        styleclass:{
            type:String,
            default:'mt-1 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded h-8 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-5000'
        },
        // value:'',
        valueupdate:'',
    },

    data(){
        return{
          dateobject : {},
          iscalenderopen: false,
          value:undefined
          
          
        }
    },
    computed:{
    
    },

    watch:{
        dateobject:{
           handler:function(){
               let year = this.dateobject.today_year;
               let month = this.dateobject.todaymonth+1;
                   this.dateobject["daysInMonth"] = new Date(year,month,0).getDate();

               let currentdate = new Date(this.dateobject.today_year,this.dateobject.todaymonth,this.dateobject.todayday)
                   this.dateobject["monthString"] = currentdate.toLocaleString('default', { month: 'long' })
               },
           deep: true
        },
        value:{
            handler:function(){
                

            },
            deep: true
        },
      
    },
  
    methods:{
            loadCalander(nextpreviousmonth = 0) {
            let currentdate = new Date();
            let date = {
                        todayday:currentdate.getDate(),
                        todaymonth:currentdate.getMonth() + nextpreviousmonth,
                        today_year:currentdate.getFullYear(),
            };
            date["currentdate"] = new Date(date.today_year,date.todaymonth,date.todayday)
            date["monthString"] = date.currentdate.toLocaleString('default', { month: 'long' })
            date["daysInMonth"] = new Date(date.today_year,date.todaymonth,0).getDate();
            return date;
            },
            nextMonth:function(){
              if(this.dateobject.todaymonth < 11){
                    this.dateobject.todaymonth++
                    this.dateobject.currentdate = new Date(this.dateobject.today_year,this.dateobject.todaymonth,this.dateobject.todayday)
              }else{
                  this.dateobject.todaymonth = 0;
                  this.dateobject.today_year++; 
                  this.dateobject.currentdate = new Date(this.dateobject.today_year,this.dateobject.todaymonth,this.dateobject.todayday)

                  
              }  
            },
            previousMonth:function(){
               if(this.dateobject.todaymonth > 0){
                   this.dateobject.todaymonth--
                  this.dateobject.currentdate = new Date(this.dateobject.today_year,this.dateobject.todaymonth,this.dateobject.todayday)
               }else{ 
                   this.dateobject.todaymonth = 11
                   this.dateobject.today_year--;
                  this.dateobject.currentdate = new Date(this.dateobject.today_year,this.dateobject.todaymonth,this.dateobject.todayday)
               };
            },
            selectedDay:function(val){
                this.dateobject.todayday = val
                this.dateobject.currentdate = new Date(this.dateobject.today_year,this.dateobject.todaymonth,val)
                this.value = this.dateobject.currentdate.toLocaleString('en-NZ',{year:'numeric',month:'long',day:'numeric'})
                this.$emit("dateComponentvalue", this.dateobject.currentdate)
                this.iscalenderopen = false
            },
            // ! -----------------------------------------------
          truenitfalse:function(){
            this.iscalenderopen = false

          }
         
            
    

    },
    mounted(){
       this.dateobject = this.loadCalander()
       
    },
    // ? used for hide select date div when click outside of it
    directives:{
        loosefocus:{
            bind: function (el, binding, vnode) {
                el.clickOutsideEvent = function (event) {
                // here I check that click was outside the el and his children
                if (!(el == event.target || el.contains(event.target))) {
                    // and if it did, call method provided in attribute value
                  
                    vnode.context[binding.expression](event);
                }
                };
                document.body.addEventListener('click', el.clickOutsideEvent)
            },
            unbind: function (el) {
                document.body.removeEventListener('click', el.clickOutsideEvent)
            },
        }

    }

}
</script>