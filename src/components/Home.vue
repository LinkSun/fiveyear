<template>
    <div class="home">
        <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" />
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
    methods: {
        onClickLeft() {
            this.$router.go(-1)
        },
    },
}
</script>


<style lang="scss" scoped>
.van-nav-bar .van-icon {
    color: #000;
}
.van-nav-bar__title {
    font-size: 0.9rem;
}

.home {
    background-color: #04223b;
    // height: 40.88rem;
}
.header {
    height: 10.37rem;
    img {
        width: 100%;
        height: 100%;
    }
}

.main {
    // height: 28.43rem;
    img {
        width: 100%;
    }
}

.main > div {
    padding: 0 20px 20px 20px;
    height: 19rem;
}

.main > div .van-col {
    width: 8.1rem;
    // background-color: #dce8eb;
    background: url("../../static/img/icon_bg@2x.png") center center no-repeat;
    margin-top: 1.8rem;
    border-radius: 10px;
    color: #455ea3;
    h3 {
        height: 0.6rem;
        line-height: 0.6rem;
        color: #455ea3;
    }
    p {
        color: #455ea3;
        display: block;
        height: 0.5rem;
        line-height: 0.5rem;
        font-size: 0.6rem;
        /* 让文字一行显示 */
        word-break: keep-all;
        white-space: nowrap;
        /* 字体让它小于12px */
        // transform: scale(0.8);
    }
}
.main > div .van-row {
    height: 6.1rem;
}
.foot {
    height: 10.46rem;
    color: #e5e7ea;
    .ch {
        font-size: 0.8rem;
    }
    .en {
        font-size: 0.6rem;
    }
}

</style>
