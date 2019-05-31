<template>
    <div class="great">
        
        <!-- 引入fullpage -->
        <full-page ref="fullpage" :options="options">
            <div class="section">
               <!-- <router-link :to="{ path: '/' }">
                <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow  />
                </router-link> -->
                <div class="content1">
                    <!-- <p>第一页</p> -->
                    <!-- 动画 -->
                    <div>
                        <div class="ballon"></div>
                    </div>

                </div>
            </div>
            <div class="section">
                <div class="content2 content2-1">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/yueguoshanqiu.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
            <div class="section">
                <div class="content2 content2-2">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/wubainian.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
            <div class="section">
                <div class="content2 content2-3">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/juejiang.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
            <div class="section">
                <div class="content2 content2-4">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/guangyinggushi.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
            <div class="section">
                <div class="content2 content2-5">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/weilai.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
               <div class="section">
                <div class="content2 content2-6">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/friends.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
               <div class="section">
                <div class="content2 content2-7">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/nizhan.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
               <div class="section">
                <div class="content2 content2-8">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/buyiyang.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
               <div class="section">
                <div class="content2 content2-9">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/xiangwo.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
               <div class="section">
                <div class="content2 content2-10">
                    <!-- <p>第二页</p> -->
                    <video controls >
                        <source src="../../../../static/video/xingfu.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
            <div class="section">
                <div class="content3">
                    <!-- <p>第三页</p> -->
                    <div class="music">
                        <van-row>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" /> 逆战</label>
                            </van-col>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" />我们不一样</label>
                            </van-col>
                        </van-row>
                        <van-row>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" /> 我的未来不是梦</label>
                            </van-col>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" />光阴的故事</label>
                            </van-col>
                        </van-row>
                        <van-row>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" /> 向天再借五百年</label>
                            </van-col>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" />越过山丘</label>
                            </van-col>
                        </van-row>
                        <van-row>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" />幸福成长</label>
                            </van-col>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" />倔强</label>
                            </van-col>
                        </van-row>
                        <van-row>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" /> 像我这样的人</label>
                            </van-col>
                            <van-col span="12">
                                <label><input name="Fruit" type="checkbox" value="" />朋友</label>
                            </van-col>
                        </van-row>

                    </div>
                    <van-button type="default" class="my-btn">提交</van-button>
                </div>
            </div>

        </full-page>

    </div>
</template>
<script>
import Vue from 'vue'

import { Row, Col } from 'vant'
import { Button } from 'vant'
import { Swipe, SwipeItem } from 'vant'

Vue.use(Row)
    .use(Col)
    .use(Button)
    .use(Swipe)
    .use(SwipeItem)
export default {
    name: 'great',
    data() {
        return {
              options: {
                // menu: '#menu',
                anchors: ['page1', 'page2', 'page3','page4','page5','page6','page7','page8','page9','page10','page11','page12'],
                sectionsColor: ['#1f0d33', '#1f0d33', '#1f0d33','#1f0d33', '#1f0d33', '#1f0d33','#1f0d33'],
                
            },
        }
    },
    methods: {
        // onClickLeft() {
        //     this.$router.go(-1)
        // },
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
.van-nav-bar__text{
    color: #000;
}
.great {
    width: 100%;
    // height: 111.25rem;
    .content1 {
        background: url('../../../../static/img/great1-2-1.jpg') no-repeat
            center top;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        > div {
            padding-bottom: 3.87rem;
        }
        p {
            text-align: center;
        }
    }
    .content2-1 {
        background: url('../../../../static/img/great2.jpg') no-repeat center
            top;
    }
    .content2-2 {
        background: url('../../../../static/img/great2-wubainian.jpg') no-repeat
            center top;
    }
    .content2-3 {
        background: url('../../../../static/img/great2-juejiang.jpg') no-repeat
            center top;
    }
    .content2-4 {
        background: url('../../../../static/img/great2-guangying.jpg') no-repeat
            center top;
    }
    .content2-5 {
        background: url('../../../../static/img/great2-weilai.jpg') no-repeat
            center top;
    }
    .content2-6 {
        background: url('../../../../static/img/great2-fridends.jpg') no-repeat
            center top;
    }
    .content2-7 {
        background: url('../../../../static/img/great2-nizhan.jpg') no-repeat
            center top;
    }
    .content2-8 {
        background: url('../../../../static/img/great2-buyiyang.jpg') no-repeat
            center top;
    }
    .content2-9 {
        background: url('../../../../static/img/great2-xiangwo.jpg') no-repeat
            center top;
    }
    .content2-10 {
        // 这里要改
        background: url('../../../../static/img/great2-xingfu.jpg') no-repeat
            center top;
    }
    .content3 {
        background: url('../../../../static/img/great3.jpg') no-repeat center
            top;
    }
    

    .content1,
    .content2,
    .content3 {
        width: 100%;
        height: 100%;
        background-size: 100% 100%;
        color: white;
        p {
            margin-top: 0;
        }
    }
}
//下面是动画
@keyframes scaleDraw {
    /*定义关键帧、scaleDrew是需要绑定到选择器的关键帧名称*/
    0% {
        transform: scale(1); /*开始为原始大小*/
    }
    25% {
        transform: scale(1.1); /*放大1.1倍*/
    }
    50% {
        transform: scale(1);
    }
    75% {
        transform: scale(1.1);
    }
}
.ballon {
    border-radius: 50%;
    width: 60px;
    height: 60px;
    background: url('../../../../static/img/Downarrow@3x.png');
    background-size: 60px 60px;
    -webkit-animation-name: scaleDraw; /*关键帧名称*/
    -webkit-animation-timing-function: ease-in-out; /*动画的速度曲线*/
    -webkit-animation-iteration-count: infinite; /*动画播放的次数*/
    -webkit-animation-duration: 5s; /*动画所花费的时间*/
}

.music {
    padding-top: 10rem;
}
.van-row {
    text-align: left;
    padding-left: 1.8rem;
    margin-top: 1.25rem;
}
.my-btn {
    width: 12rem;
    margin-top: 2.37rem;
}

.content2 {
    video {
        margin-top: 7.4rem;
        width: 17rem;
        height: 13rem;
    }
}
</style>
