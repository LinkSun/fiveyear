<template>
    <div class="home">
        <!-- <van-nav-bar title="彩生活上市五周年庆" left-text=""   /> -->
        <header class="header">
            <img src="../../static/img/header.jpg" alt="">
        </header>
        <main class="main">
            <div>

                <van-row type="flex" justify="space-between">
                    <van-col span="10">
                        <router-link :to="li1.route">
                            <h3>{{li1.title}}</h3>
                            <p>{{li1.english}}</p>
                        </router-link>
                    </van-col>
                    <van-col span="10">
                        <router-link :to="li2.route">
                            <h3>{{li2.title}}</h3>
                            <p>{{li2.english}}</p>
                        </router-link>
                    </van-col>
                </van-row>
                <van-row type="flex" justify="space-between">
                    <van-col span="12">
                        <router-link :to="li3.route">
                            <h3>{{li3.title}}</h3>
                            <p>{{li3.english}}</p>
                        </router-link>
                    </van-col>
                    <van-col span="12">
                        <router-link :to="li4.route">
                            <h3>{{li4.title}}</h3>
                            <p>{{li4.english}}</p>
                        </router-link>
                    </van-col>
                </van-row>
                <van-row type="flex" justify="space-between">
                    <van-col span="12">
                        <router-link :to="li5.route">
                            <h3>{{li5.title}}</h3>
                            <p>{{li5.english}}</p>
                        </router-link>
                    </van-col>
                    <van-col span="12">
                        <router-link :to="li6.route">
                            <h3>{{li6.title}}</h3>
                            <p>{{li6.english}}</p>
                        </router-link>
                    </van-col>
                </van-row>

            </div>
        </main>
        <van-row class="foot">
            <van-col span="24">
                <div class="ch">彩生活服务集团上市5周年庆</div>
                <div class="en">Fifth Anniversary of Colour Life Service Group's Listing</div>
            </van-col>
        </van-row>
    </div>
</template>

<script>
import Vue from 'vue'
import { Row, Col } from 'vant'

//vant按需引入
Vue.use(Row).use(Col)
export default {
    name: 'Home',
    data() {
        return {
            li1: {
                title: '欢迎信',
                english: 'WELCOME LETTER',
                route: { name: 'Welcome' },
            },
            li2: {
                title: '庆典流程',
                english: 'CELEBRATION PROCESS',
                route: { name: 'Celebration' },
            },
            li3: {
                title: '心 声',
                english: 'ASPIRATIONS',
                route: { name: 'Aspirations' },
            },
            li4: {
                title: '金 曲',
                english: 'GREAT HIT',
                route: { name: 'Great' },
            },
            li5: {
                title: '故事荟',
                english: 'STORY COLLECTION',
                route: { name: 'Story' },
            },
            li6: {
                title: '图片直播',
                english: 'PICTURE LIVE BROADCAST',
                route: { name: 'Regiment' },
            },
        }
    },
    created() {},
    mounted() {
        sessionStorage.removeItem('access_token')
        // console.log(location);
       let token= this.GetUrlParam("access_token");

       sessionStorage.setItem('access_token',token)
    },
    methods: {
        onClickLeft() {
            this.$router.go(-1)
        },
        // 获取token
        
        GetUrlParam(paraName) {
　　　　var url = document.location.toString();
　　　　var arrObj = url.split("?");
 
　　　　if (arrObj.length > 1) {
　　　　　　var arrPara = arrObj[1].split("&");
　　　　　　var arr;
 
　　　　　　for (var i = 0; i < arrPara.length; i++) {
　　　　　　　　arr = arrPara[i].split("=");
　　　　　　　　if (arr != null && arr[0] == paraName) {
　　　　　　　　　　return arr[1];
　　　　　　　　}
　　　　　　}
　　　　　　return "";
　　　　}
　　　　else {
　　　　　　return "";
　　　　}
　　}
    },
}
</script>


<style lang="scss" scoped>
@import '../../static/css/home.scss';
</style>
