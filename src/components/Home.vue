<template>
    <div class="home">
        <header class="header">
            <img src="../../static/img/lunbo3.jpg" alt="">
        </header>
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
            <!--  -->
            <van-row class="foot">
                <van-col span="24">
                    <div class="ch">彩生活服务集团上市5周年庆</div>
                    <div class="en">Fifth Anniversary of Colour Life Service Group's Listing</div>
                </van-col>
            </van-row>
        </main>
    </div>
</template>

<script>
import Vue from 'vue'
import { NavBar } from 'vant'
//vant按需引入
Vue.use(NavBar)
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
                    title: '图片直播',
                    english: 'PICTURE LIVE BROADCAST',
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
.home {
    background-color: #04223b;
    height: 40.88rem;
}
.header {
    height: 10.37rem;
}
.header img {
    width: 100%;
    height: 100%;
}

.main {
    height: 28.43rem;
}

.main > div {
    padding: 0 20px 20px 20px;
    height: 19rem;
}
.main img {
    width: 100%;
}

.main ul li {
    width: 8.1rem;
    background-color: #dce8eb;
    margin-top: 2rem;
    border-radius: 10px;
}
.main ul li:nth-child(odd) {
    float: left;
}
.main ul li:nth-child(even) {
    float: right;
    margin-left: 0.45rem;
}
.main ul li a {
    color: #455ea3;
}
.main ul li a h3 {
    height: 0.6rem;
    line-height: 0.6rem;
}
.main ul li a p {
    display: block;
    height: 0.5rem;
    line-height: 0.5rem;
    font-size: 0.2rem;
    /* 让文字一行显示 */
    word-break: keep-all;
    white-space: nowrap;
    /* 字体让它小于12px */
    transform: scale(0.8);
}
.foot {
    height: 8rem;
    color: #e5e7ea;
}
.foot .ch {
    font-size: 0.8rem;
}
.foot .en {
    font-size: 0.6rem;
}
</style>
