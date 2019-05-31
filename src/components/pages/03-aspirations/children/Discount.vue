<template>
    <div class="discount">
        <!-- <van-nav-bar title="领取记录" left-text="" left-arrow @click-left="onClickLeft" /> -->
        <div class="yh-main">
            <van-row class="first" v-show="caihui_coupon==1">
                <van-col span="8" class="left">
                    <div class="title">5</div>
                    <div class="content">
                        满20元可以使用
                    </div>
                </van-col>
                <van-col span="13" class="right">
                    <p>彩惠优惠券(京东,社区速达使用)</p>
                    <div>
                        <div class="content">自领用之日起7天</div>
                        <div class="btn" @click="goCaihui">去使用</div>
                    </div>
                </van-col>
            </van-row>
            <van-row class="secend" v-show="caifu_coupon==1">
                <van-col span="8" class="left">
                    <div class="title">188</div>
                    <div class="content">
                        购买财富1号赠送
                    </div>
                </van-col>
                <van-col span="13" class="right">
                    <p>彩富优惠券</p>
                    <div>
                        <div class="content">2019.06.01-2019.06.30</div>
                        <div class="btn" @click="goCaifu">去使用</div>
                    </div>
                </van-col>
            </van-row>
            <van-row class="three" v-show="caipark_coupon==1">
                <van-col span="8" class="left">
                    <div class="title">1000</div>
                    <div class="content">
                        车位直抵1000元
                    </div>
                </van-col>
                <van-col span="13" class="right">
                    <p>彩车位抵扣券</p>
                    <div>
                        <div class="content">2019.06.01-2019.06.30</div>
                        <div class="btn" @click="goCaiche">去使用</div>
                    </div>
                </van-col>
            </van-row>
            <!-- <p v-show="isShow">{{msg}}</p> -->
               <!-- <van-row class="first" >
                <van-col span="8" class="left">
                    <div class="title">5</div>
                    <div class="content">
                        满20元可以使用
                    </div>
                </van-col>
                <van-col span="13" class="right">
                    <p>彩惠优惠券(京东,社区速达使用)</p>
                    <div>
                        <div class="content">自领用之日起7天</div>
                        <div class="btn">去使用</div>
                    </div>
                </van-col>
            </van-row>
            <van-row class="secend" >
                <van-col span="8" class="left">
                    <div class="title">188</div>
                    <div class="content">
                        购买财富1号赠送
                    </div>
                </van-col>
                <van-col span="13" class="right">
                    <p>彩富优惠券</p>
                    <div>
                        <div class="content">2019.06.01-2019.06.30</div>
                        <div class="btn">去使用</div>
                    </div>
                </van-col>
            </van-row>
            <van-row class="three" >
                <van-col span="8" class="left">
                    <div class="title">1000</div>
                    <div class="content">
                        车位直抵1000元
                    </div>
                </van-col>
                <van-col span="13" class="right">
                    <p>彩车位抵扣券</p>
                    <div>
                        <div class="content">2019.06.01-2019.06.30</div>
                        <div class="btn">去使用</div>
                    </div>
                </van-col>
            </van-row> -->
        </div>

    </div>
</template>

<script>
import Vue from 'vue'

import { Row, Col } from 'vant'
Vue.use(Row).use(Col)
import bus from "../../../bus/bus.js"
export default {
    data() {
        return {
            caihui_coupon:0,
            caifu_coupon:0,
            caipark_coupon:0,
            msg:'没有优惠券呢,第一次留言才有哦',
            isShow:false,
            urlCaihui:"https://caihui.test.colourlife.com/redirect",//去彩惠
            urlCaifu:"https://caifu-czytest.colourlife.com/h5/v35/index",//去彩富
            urlCaiche:"https://salesv2-ccw-test.colourlife.com/oauth",//去彩车位
        }
    },
    created() {

      this.caihui_coupon=localStorage.getItem('caihui_coupon')
      this.caifu_coupon=localStorage.getItem('caifu_coupon')
      this.caipark_coupon=localStorage.getItem('caipark_coupon')
    
    },
    mounted() {
        console.log(11);
        
       
    },
    methods: {
        // onClickLeft() {
        //     this.$router.go(-1)
        // },

        goCaihui(){
            
           window.location.href=this.urlCaihui;
        
        },
        goCaifu(){
            window.location.href=this.urlCaifu;
        },
        goCaiche(){
            window.location.href=this.urlCaiche;
        },
    },
}
</script>

<style lang="scss" scoped>
.van-nav-bar .van-icon {
    color: #000;
    font-weight: 600;
}
.van-nav-bar__title {
    font-size: 0.9rem;
    font-weight: 530;
}

.discount {
    background-color: #f2f3f5;
    height: 100vh;
    .yh-main {
        .first {
            font-size: 0.8rem;
            width: 19.43rem;
            height: 6.43rem;
            background: url('../../../../../static/img/icon_yhq@2x.png')
                no-repeat center center;
            background-size: 100% 100%;
            .left {
                height: 100%;
                width: 7.8rem;
                color: #fff;

                .title {
                    text-align: center;
                    font-size: 1.8rem;
                    /* height: 2rem; */
                    line-height: -2rem;
                    margin: 1.0625rem;
                    position: relative;
                }
                .title::before {
                    content: '¥';
                    font-size: 0.9rem;
                    position: absolute;
                    top: 0;
                    top: 0.2rem;
                    left: 1.8rem;
                }
                .content {
                }
            }
            .right {
                height: 100%;
                p {
                    word-break: keep-all;
                    white-space: nowrap;
                    margin-top: 1.2rem;
                    font-weight: 500;
                    text-align: left;
                }
                > div {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 2rem;
                    .content {
                        color: #b8b8b8;
                        font-size: 0.6rem;
                    }
                    .btn {
                        color: #f28752;
                        border: 1px solid #f28752;
                        border-radius: 1.25rem;
                        width: 3.2rem;
                    }
                }
            }
        }
        .secend {
            font-size: 0.8rem;
            width: 19.43rem;
            height: 6.43rem;
            background: url('../../../../../static/img/icon_yhq@2x.png')
                no-repeat center center;
            background-size: 100% 100%;
            .left {
                height: 100%;
                width: 7.8rem;
                color: #fff;

                .title {
                    text-align: center;
                    font-size: 1.8rem;
                    /* height: 2rem; */
                    line-height: -2rem;
                    margin: 1.0625rem;
                    position: relative;
                }
                .title::before {
                    content: '¥';
                    font-size: 0.9rem;
                    position: absolute;
                    top: 0;
                    top: 0.2rem;
                    left: 0.8rem;
                }
            }
            .right {
                height: 100%;
                p {
                    word-break: keep-all;
                    white-space: nowrap;
                    margin-top: 1.2rem;
                    font-weight: 500;
                    text-align: left;
                }
                > div {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 2rem;
                    .content {
                        color: #b8b8b8;
                        font-size: 0.6rem;
                        word-break: keep-all;
                        white-space: nowrap;
                    }
                    .btn {
                        color: #f28752;
                        border: 1px solid #f28752;
                        border-radius: 1.25rem;
                        width: 3.2rem;
                    }
                }
            }
        }
        .three {
            font-size: 0.8rem;
            width: 19.43rem;
            height: 6.43rem;
            background: url('../../../../../static/img/icon_yhq@2x.png')
                no-repeat center center;
            background-size: 100% 100%;
            .left {
                height: 100%;
                width: 7.8rem;
                color: #fff;

                .title {
                    text-align: center;
                    font-size: 1.8rem;
                    /* height: 2rem; */
                    line-height: -2rem;
                    margin: 1.0625rem;
                    position: relative;
                }
                .title::before {
                    content: '¥';
                    font-size: 0.9rem;
                    position: absolute;
                    top: 0;
                    top: 0.2rem;
                    left: 0.4rem;
                }
            }
            .right {
                height: 100%;
                p {
                    word-break: keep-all;
                    white-space: nowrap;
                    margin-top: 1.2rem;
                    font-weight: 500;
                    text-align: left;
                }
                > div {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 2rem;
                    .content {
                        color: #b8b8b8;
                        font-size: 0.6rem;
                        word-break: keep-all;
                        white-space: nowrap;
                    }
                    .btn {
                        color: #f28752;
                        border: 1px solid #f28752;
                        border-radius: 1.25rem;
                        width: 3.2rem;
                    }
                }
            }
        }
    }
}
.yh-main {
    font-size: 1rem;
    padding: 0.3rem;
}
</style>