import indexpage from "../vue/home_page"
import profile from "../vue/components/index/userprofile"
import joboffers from "../vue/components/userdashboard/userdataview"
import proficents from "../vue/components/index/usercardlist"
import settings from "../vue/components/userdashboard/settings"
import userinfo from "../vue/components/userdashboard/userinfo"
export default{
    mode: 'history',

    routes:[
        {
            path: '/',
            component:indexpage,
            name:'index'
        }, 
        {
            path:'/profile',
            component:profile
        },
        {
            path:'/account/my-jobs-offers', 
            component:joboffers,
            name:'myJobOffers'
        },
        {
            path:'/talent-hire',
            component:proficents
        },
        {
            path:'/account',
            component:settings
        },
        {
            path:'/account/user-info',
            component:userinfo,
            name:'UserInfo'
        }
    ] 

}