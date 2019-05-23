<template>
    <div>

        <!-- 可以正确接收到值,接收到的值是{{userId}} -->
        <!-- 头部 -->
        <header class="header">
            <img src="../../../../../static/img/alive.jpg" alt="">
        </header>

        <!-- main主体 -->
        <main class="main">
            <!-- 标题部分 -->
            <section class="detail-1">
                <div class="">
                    <h1>集团总部</h1>
                </div>
                <div class="detail-content">
                    <p class="">
                        <span>活动时间：</span>
                        <span id="activityTime">2018.12.08 19:00~20:30</span>
                    </p>
                </div>
            </section>

            <!-- 图片直播部分 -->
            <section class="list">
                <van-uploader :after-read="onRead" accept="image/gif, image/jpeg" multiple>
                    <van-icon name="photograph" />
                </van-uploader>
            </section>
        </main>
    </div>
</template>

<script>
import Vue from 'vue'
import { Uploader } from 'vant';

Vue.use(Uploader);
export default {
    data() {
        return {
            userId: this.$route.query.id, //接收传过来的值
        }
    },
    methods: {
       
            onRead(file, detail) {
                console.log(file);
                
            },
     
    },
}
</script>

<style lang="scss" scoped>
.header img {
    display: block;
    width: 100%;
    height: 100%;
}
.main {
    background-color: #111;
    color: #fff;
    padding: 0.8rem;
    .detail-1 {
        text-align: left;
        div {
            h1 {
                font-size: 0.8rem;
            }
        }
        .detail-content {
            font-size: 0.6rem;
            color: #ccc;
        }
    }
}
</style>