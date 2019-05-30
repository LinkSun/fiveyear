<template>
    <div class="aspirations">
        <!-- <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" /> -->
        <!-- <div class="top">
            <img src="../../../../static/img/lunbo2.jpg" alt="">
        </div> -->
        <header class="header" id="myheader">

            <div>
                1205个日夜，因为有你，
            </div>
            <div>彩生活一直走在服务社区的前进道路上。 </div>
            <div>5年的风雨兼程，5年的患难与共。</div>
            <div>我们的每一个小区，都是彩生活的一颗颗宝贵珍珠， </div>
            <div>每一个工作岗位，都是彩生活前进的螺丝钉。</div>
            <div> 你的心里话，我很想听…… </div>
            <div>上市5周年，感恩与我共5 ，留下你的心声，</div>
            <div>共同追溯过往，展望美好未来！</div>

        </header>

        <div class="main">
            <!-- 下面是显示的背景 -->
            <!-- <img class="bgc" src="../../../../static/img/xs-bgc.jpg" alt="" v-if="isShow"> -->
            <!-- van-pull-refresh下拉刷新 -->
            <!-- <van-pull-refresh v-model="isLoading" @refresh="onRefresh" :success-duration='100'> -->
            <!-- 2019年5月24日15:30:50q做心声页优化 -->
            <div class="wxchat-container" style="{backgroundColor: #efefef}">
                <div class="window" id="window-view-container">
                    <!-- main -->
                    <div class="container-main" v-if="wxChatData && wxChatData.length>0">
                        <div class="message">
                            <ul>
                                <van-row v-for="message in wxChatData" :key="message.id+Math.random()*10">
                                    <van-col span="24">
                                        <li :class="message.direction==2?'an-move-right':'an-move-left'">
                                            <!-- 后端说时间去除 -->
                                            <!-- <div class="time">
                                                    <span v-text="message.time"></span>
                                                </div> -->
                                            <p class="time system" v-if="message.type==10000">
                                                <span v-html="message.content"></span>
                                            </p>
                                            <div :class=" (message.direction==2?' self':'')" v-else>
                                                <div class="myimg">
                                                    <img class="avatar" width="45px" height="45px" :src="message.auther" v-if="message.auther!=''">

                                                </div>
                                                <!-- 文本 -->

                                                <!-- <div class="text" v-emotion="message.content"> -->
                                                <div class="text">
                                                    <div class="username">
                                                        {{message.name}}
                                                    </div>
                                                    <div v-emotion="message.content" class="neirong">内容</div>
                                                </div>

                                            </div>
                                        </li>
                                    </van-col>
                                </van-row>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- 2019年5月24日15:30:50q做心声页优化结束 -->
            <!-- </van-pull-refresh> -->
            <!-- 这里增加弹框 -->
            <!-- 不能留言提示 -->
            <van-dialog v-model="noSay" confirm-button-text="我知道了" confirm-button-color="#16317c" class="noSay">
                <h4>温馨提示</h4>
                <p>{{"感谢你的留言,今天我们已经收到了您的祝福,请明天再来～"}}</p>
            </van-dialog>
            <!-- 优惠券 -->
            <van-dialog v-model="youhuiShow" title="" show-cancel-button :showConfirmButton=false class="fanpiao">

                <h4>恭喜你获得司庆福利</h4>
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
                                <div class="btn" @click="goDiscount">去使用</div>
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
                                <div class="btn" @click="goDiscount">去使用</div>
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
                                <div class="btn" @click="goDiscount">去使用</div>
                            </div>
                        </van-col>
                    </van-row>
                </div>

            </van-dialog>
            <!--  -->
        </div>
        <footer class="footer" ref="mySend">
            <input id="text" type="text" placeholder="留言既得司庆大礼包" v-model="inputValue" class="my-input">
            <van-icon name="smile-o" @click="checkemoj" />
            <!-- <button @click="send" type="button">发送</button> -->
            <span @click="send" class="btn">发送</span>

            <div class="fuli" @click="goDiscount">
                <div class="first">司庆</div>
                <div>福利</div>
            </div>
        </footer>

        <van-row>
            <van-col span="24">
                <van-popup v-model="emojShow" position="bottom" :overlay="true">
                    <div class="my-emojlists">
                        <ul>
                            <li v-for="(item, index) in emojLists" :key="index">
                                <img :src="item.address" alt="" @click="emojHide(item)">
                            </li>
                        </ul>
                    </div>
                </van-popup>
            </van-col>
        </van-row>

    </div>

</template>
<script>
import Vue from 'vue'
import { Toast } from 'vant'
import { Icon } from 'vant'
import { PullRefresh } from 'vant'
import { Notify } from 'vant'
import { Popup } from 'vant'
import { Dialog } from 'vant'
import { Row, Col } from 'vant'
Vue.use(Toast)
    .use(Icon)
    .use(PullRefresh)
    .use(Notify)
    .use(Popup)
    .use(Dialog)
    .use(Row)
    .use(Col)

export default {
    name: 'Aspirations',
    data() {
        return {
            noSay: false, //不能留言
            caihui_coupon: 0, //优惠券
            caifu_coupon: 0,
            caipark_coupon: 0,

            emojLists: [
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/2.gif'),
                    content: '[撇嘴]',
                },
                {
                    address: require('../../../assets/emoj/3.gif'),
                    content: '[色]',
                },
                {
                    address: require('../../../assets/emoj/4.gif'),
                    content: '[发呆]',
                },
                {
                    address: require('../../../assets/emoj/5.gif'),
                    content: '[得意]',
                },
                {
                    address: require('../../../assets/emoj/6.gif'),
                    content: '[流泪]',
                },
                {
                    address: require('../../../assets/emoj/7.gif'),
                    content: '[害羞]',
                },
                {
                    address: require('../../../assets/emoj/8.gif'),
                    content: '[闭嘴]',
                },
                {
                    address: require('../../../assets/emoj/9.gif'),
                    content: '[睡]',
                },
                {
                    address: require('../../../assets/emoj/10.gif'),
                    content: '[大哭]',
                },
                {
                    address: require('../../../assets/emoj/11.gif'),
                    content: '[尴尬]',
                },
                {
                    address: require('../../../assets/emoj/12.gif'),
                    content: '[发怒]',
                },
                {
                    address: require('../../../assets/emoj/13.gif'),
                    content: '[调皮]',
                },
                {
                    address: require('../../../assets/emoj/14.gif'),
                    content: '[呲牙]',
                },
                {
                    address: require('../../../assets/emoj/15.gif'),
                    content: '[惊讶]',
                },
                {
                    address: require('../../../assets/emoj/16.gif'),
                    content: '[难过]',
                },
                {
                    address: require('../../../assets/emoj/17.gif'),
                    content: '[酷]',
                },
                {
                    address: require('../../../assets/emoj/18.gif'),
                    content: '[冷汗]',
                },
                {
                    address: require('../../../assets/emoj/19.gif'),
                    content: '[抓狂]',
                },
                {
                    address: require('../../../assets/emoj/20.gif'),
                    content: '[吐]',
                },
                {
                    address: require('../../../assets/emoj/21.gif'),
                    content: '[偷笑]',
                },
                {
                    address: require('../../../assets/emoj/22.gif'),
                    content: '[愉快]',
                },
                {
                    address: require('../../../assets/emoj/23.gif'),
                    content: '[白眼]',
                },
                {
                    address: require('../../../assets/emoj/24.gif'),
                    content: '[傲慢]',
                },
                {
                    address: require('../../../assets/emoj/25.gif'),
                    content: '[饥饿]',
                },
                {
                    address: require('../../../assets/emoj/26.gif'),
                    content: '[困]',
                },
                {
                    address: require('../../../assets/emoj/27.gif'),
                    content: '[惊恐]',
                },
                {
                    address: require('../../../assets/emoj/28.gif'),
                    content: '[流汗]',
                },
                {
                    address: require('../../../assets/emoj/29.gif'),
                    content: '[憨笑]',
                },
                {
                    address: require('../../../assets/emoj/30.gif'),
                    content: '[大兵]',
                },
                {
                    address: require('../../../assets/emoj/31.gif'),
                    content: '[奋斗]',
                },
                {
                    address: require('../../../assets/emoj/32.gif'),
                    content: '[咒骂]',
                },
                {
                    address: require('../../../assets/emoj/33.gif'),
                    content: '[疑问]',
                },
                {
                    address: require('../../../assets/emoj/34.gif'),
                    content: '[嘘]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[强]',
                },
            ],
            youhuiShow: false, //优惠
            emojShow: false, //表情选择
            isLoading: false, //下拉刷新
            isShow: false, //默认不显示
            inputValue: '', //输入框的值
            count: 1, //下拉数值
            // 心声内容
            upperTimes: 0,
            underTimes: 0,
            upperId: 0,
            underId: 6,
            width: window.screen.width,

            // 下面这是心声内容
            wxChatData: [],
            // wxChatData: [
            //     //     心声内容说明:
            //     //     direction: 2, //为2表示微信主人发出的消息，1表示联系人
            //     //     id: 1, //消息id
            //     //     content: '你好!![呲牙]', //当type为1时这里是文本消息，当type2为2时这里要存放图片地址；后续会支持语音的显示
            //     //     time: new Date().toLocaleString() //显示当前消息的发送时间
            //     {
            //         direction: 1,
            //         id: 1,
            //         auther: '../../../../../static/img/avatar2.png',
            //         content: '上市五周年,雄起 ! ! ![强][强]',
            //         time: new Date().toLocaleString(),
            //     },
        }
    },
    components: {},
    created() {
        if (this.wxChatData.length == 0) {
            // 下面这个后续解开
            this.isShow = true
        }
    },
    mounted() {
        // 指定时间(8:00-22:00),获取dom,并隐藏
        let now = new Date()
        let hour = now.getHours()
        //    hour=8;
        //    console.log("现在时间是:"+hour+"点");
        if (hour < 8 || hour >= 22) {
            //    console.log(this.$refs.mySend)
            let sedDom = this.$refs.mySend
            sedDom.style.display = 'none'
        }

        // 测试token
        let tokentest =
            'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBfaWQiOiJJQ0VTTUpIWkYtNTQ4Qy1KUVhFLUVOOFEtNUUxSUZCTjU3UERMIiwianRpIjoiODVjN2I0ZDQ0ZjIxZmNlZWQ3NTBlMGYyYTcwNjExODEiLCJpYXQiOjE1NTkyMDc3MDksIm5iZiI6MTU1OTIwNzcwOSwiZXhwIjoxNTU5MjE0OTA5LCJzdWIiOjEwMDI4NTExODMsInNjb3BlcyI6IltdIn0_.1bd87c12107e95e8c4ff7f59f6404a8fc70c34af534170f10cd5f0756a6da1dc'
        let token = sessionStorage.getItem('access_token')
        // 第一次加载先获取一次
        this.$axios
            .get(`/activity/messageview?access_token=${token}`)
            .then(response => {
                let arr = JSON.parse(response.data.content)
                arr = arr.reverse()
                this.wxChatData = arr
            })
            .catch(error => {
                console.log(error)
            })

        this.getMessage()
    },
    methods: {
        onClickLeft() {
            this.$router.go(-1)
        },
        // 表情显示
        checkemoj() {
            // 选择表情事件
            this.emojShow = true
        },
        // 表情隐藏
        emojHide(value) {
            this.emojShow = false

            this.inputValue = this.inputValue.concat(value.content)
        },
        send() {
            let tokentest =
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBfaWQiOiJJQ0VTTUpIWkYtNTQ4Qy1KUVhFLUVOOFEtNUUxSUZCTjU3UERMIiwianRpIjoiMDViMDIxYWI1YmY0ODE1NThkNDBhYzljYzgxZDk1ZTUiLCJpYXQiOjE1NTkyMDgzMjksIm5iZiI6MTU1OTIwODMyOSwiZXhwIjoxNTU5MjE1NTI5LCJzdWIiOjEwMDI4NTExODYsInNjb3BlcyI6IltdIn0_.a66564f4c6a0d2c1b4e0ac0d010f3706250e7f2aeb972e31aa5341c91d9f1172'
                
            let token = sessionStorage.getItem('access_token')
            // let that = this;
            if (this.inputValue != '') {
                // 测试发送
                this.$axios
                    .post(`activity/messageadd`, {
                        content: this.inputValue,
                        access_token: token,
                    })
                    .then(response => {
                        //  Toast.success('发送成功')
                        // console.log(response)
                        if (response.data.message) {
                            this.noSay = true
                            // alert(response.data.message)
                            // return false
                        }
                        // that.wxChatData.push(response)
                        let is_first = JSON.parse(response.data[0]).is_first
                        if (is_first == 1) {
                            this.$axios
                                .post('/coupon/combine/send', {
                                    access_token: tokentest,
                                })
                                .then(response => {
                                    // console.log(response)
                                    console.log(response.data.content)
                                    let content = response.data.content
                                    // alert('第一次')
                                    if (
                                        content.caihui_coupon == 1 ||
                                        content.caifu_coupon == 1 ||
                                        content.caipark_coupon == 1
                                    ) {
                                        this.caipark_coupon =
                                            content.caihui_coupon
                                        this.caifu_coupon = content.caifu_coupon
                                        this.caihui_coupon =
                                            content.caipark_coupon
                                        this.youhuiShow = true
                                    }
                                })
                                .catch(err => {
                                    console.log(err)
                                    // 这是测试用的
                                    // this.youhuiShow = true
                                    //  console.log(response.data.content);
                                    // 有任意一个就显示
                                    // let isHave=response.content.caihui_coupon

                                    // alert('第一次')
                                })
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        //这是测试用的
                        // this.youhuiShow = true
                    })

                this.inputValue = ''
            } else {
                Notify({
                    message: '内容不能为空哦',
                    duration: 2000,
                    background: '#1989fa',
                })
            }
        },
        //    下拉刷新
        onRefresh() {
            setTimeout(() => {
                //   这里后续可以增加请求,请求更多数据

                this.count++
                // 测试发送
                // this.$axios
                //     .get(
                //
                //         `activity/getmore?page=${this.count}`
                //     )
                //     .then((response)=> {
                //

                //
                //         let arr=JSON.parse(response.data.content);
                //
                //         arr.forEach(element => {
                //             let obj=JSON.parse(element);

                //         this.wxChatData.push(obj)
                //         });
                //     })
                //     .catch((error)=> {
                //         console.log(error)
                //     })

                this.isLoading = false
                // this.$toast('刷新成功')
            }, 500)
        },
        goDiscount() {
            this.$router.push({
                path: 'page3-1',
                query: {
                    caihui_coupon: this.caihui_coupon,
                    caifu_coupon: this.caifu_coupon,
                    caipark_coupon: this.caipark_coupon,
                },
            })
        },
        // 封装函数
        getMessage() {
            let tokentest =
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBfaWQiOiJJQ0VTTUpIWkYtNTQ4Qy1KUVhFLUVOOFEtNUUxSUZCTjU3UERMIiwianRpIjoiODVjN2I0ZDQ0ZjIxZmNlZWQ3NTBlMGYyYTcwNjExODEiLCJpYXQiOjE1NTkyMDc3MDksIm5iZiI6MTU1OTIwNzcwOSwiZXhwIjoxNTU5MjE0OTA5LCJzdWIiOjEwMDI4NTExODMsInNjb3BlcyI6IltdIn0_.1bd87c12107e95e8c4ff7f59f6404a8fc70c34af534170f10cd5f0756a6da1dc'
            let token = sessionStorage.getItem('access_token')
            let that = this
            let timeId = setInterval(() => {
                this.$axios
                    .get(
                        // `/activity/messageadd?access_token=123&content=${this.inputValue}`
                        `/activity/messageview?access_token=${token}&`
                    )
                    .then(function(response) {
                        let arr = JSON.parse(response.data.content)
                        // console.log(arr);

                        arr = arr.reverse()
                        that.wxChatData = arr
                    })
                    .catch(function(error) {
                        // console.log(error)
                    })
            }, 2000)
        },
        // 封装函数结束
    },
    watch: {
        wxChatData: function() {
            // console.log(11);

            if (this.wxChatData.length != 0) {
                // 下面这个后续解开
                this.isShow = false
            }
        },
    },
    updated() {},
    destroyed() {
        clearInterval(this.timeId)
    },
}
</script>


<style lang="scss" >
@import '../../../../static/css/aspirations.scss';
.aspirations .yh-main {
    transform: scale(0.8);
    margin-left: -1.3rem;
    margin-top: -1.93rem;
    .first {
        font-size: 0.8rem;
        width: 19.43rem;
        height: 6.43rem;
        background: url('../../../../static/img/icon_yhq@2x.png') no-repeat
            center center;
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
        background: url('../../../../static/img/icon_yhq@2x.png') no-repeat
            center center;
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
        background: url('../../../../static/img/icon_yhq@2x.png') no-repeat
            center center;
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
.noSay h4 {
    color: #16317c;
    font-weight: 600;
}
.noSay p {
   padding: 0 1.8rem;
    line-height: 1.5rem;
}
.aspirations .footer{
    width: 100%;
}
.aspirations #myheader{
    width: 100%;
}

</style>
