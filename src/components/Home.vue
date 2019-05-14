<template>
    <div class="home">
        <van-swipe :autoplay="3000" indicator-color="white" >
            <van-swipe-item>
                <img src="../../static/img/lunbo3.jpg" alt="">
            </van-swipe-item>
            <van-swipe-item>
                <img src="../../static/img/lunbo2.jpg" alt="">
            </van-swipe-item>
             <van-swipe-item>
                <img src="../../static/img/lunbo3.jpg" alt="">
            </van-swipe-item>
             <van-swipe-item>
                <img src="../../static/img/lunbo2.jpg" alt="">
            </van-swipe-item>
             <van-swipe-item>
                <img src="../../static/img/lunbo3.jpg" alt="">
            </van-swipe-item>
        </van-swipe>
        <main class="main">
            <div>
                <ul>
                    <li v-for="(item, index) in menus" :key="index"> 
                            <router-link :to="item.route">
                                <h3>{{item.title}}</h3>
                                <p>{{item.english}}</p>
                            </router-link>
                        

                    </li>

                </ul>
            </div>
        </main>
    </div>
</template>

<script>
import Vue from 'vue'
import { NavBar, Swipe, SwipeItem } from 'vant'
//vant按需引入
Vue.use(NavBar)
    .use(Swipe)
    .use(SwipeItem)
export default {
    name: 'Home',
    data() {
        return {
            menus: [
                {
                    title: '欢迎信',
                    english: 'WELCOME LETTER',
                    route: { name: 'Welcome' },
                },
                {
                    title: '庆典流程',
                    english: 'CELEBRATION PROCESS',
                    route: { name: 'Celebration' },
                },
                {
                    title: '心声',
                    english: 'ASPIRATIONS',
                    route: { name: 'Aspirations' },
                },
                {
                    title: '金曲',
                    english: 'GREAT HIT',
                    route: { name: 'Great' },
                },
                {
                    title: '故事荟',
                    english: 'STORY COLLECTION',
                    route: { name: 'Story' },
                },
                {
                    title: '团建活动',
                    english: 'REGIMENT BUILDING',
                    route: { name: 'Regiment' },
                },
            ],
        }
    },
    created() {
        // this.$axios.get('getlunbo').then(res=>{
        //   console.log(res);
        // }).catch(error=>{
        //   console.log(error);
        // })
    },
    methods: {},
}
</script>


<style scoped>
.van-swipe {
    height: 220px;
}


.main{
    height: 28rem;
    background-color: #dadbf0;
}

.main > div {
    padding:0 20px 20px 20px;
}
.main img {
    width: 100%;
    height: 100%;
}


.main ul li {
      width: 8.1rem;
      background-color: hotpink;
      margin-top: 2rem;
      border-radius: 10px;
    
}
.main ul li:nth-child(odd){
    float: left;
}
.main ul li:nth-child(even){
    float: right;
    margin-left: 0.45rem;
}
.main ul li a {
    color: #6f1e9d;  
   
}
.main ul li a h3{
    height: .6rem;
    line-height: .6rem;
}
.main ul li a p{
    display: block;
    height: .5rem;
    line-height: 0.5rem;   
    font-size: .2rem;
}





</style>
