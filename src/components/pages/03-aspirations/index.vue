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
                                                    <img class="avatar" width="45" height="45" :src="message.auther" v-if="message.auther!=''">

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
            <van-dialog v-model="youhuiShow" title="" show-cancel-button :showConfirmButton=false class="fanpiao">

                <h3>恭喜你获得司庆福利</h3>
                <van-row class="caihui">
                    <van-col span="8">你好</van-col>
                    <van-col span="16"></van-col>
                </van-row>
                <van-row class="chewei">
                    <van-col span="8"></van-col>
                    <van-col span="16"></van-col>
                </van-row>
                <van-row class="caifu">
                    <van-col span="8"></van-col>
                    <van-col span="16"></van-col>
                </van-row>
            </van-dialog>
            <!--  -->
        </div>
        <footer class="footer">
            <input id="text" type="text" placeholder="留言既得司庆大礼包" v-model="inputValue" class="my-input">
            <van-icon name="smile-o" @click="checkemoj" />
            <!-- <button @click="send" type="button">发送</button> -->
            <span @click="send" class="btn">发送</span>

        </footer>
        <div class="fuli" @click="goDiscount">
            <div class="first">司庆</div>
            <div>福利</div>
        </div>
        
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
            //     {
            //         direction: 1,
            //         id: 1,
            //         auther: '../../../../../static/img/avatar2.png',
            //         content: '上市五周年,雄起 ! ! ![强][强]',
            //         time: new Date().toLocaleString(),
            //     },
            //     {
            //         direction: 1,
            //         id: 2,
            //         auther: '../../../../../static/img/avatar3.png',
            //         content: '反手就是几个赞 [强][强][强]',
            //         time: new Date().toLocaleString(),
            //     },

            //     {
            //         direction: 1,
            //         id: 3,
            //         auther: '../../../../../static/img/avatar4.png',
            //         content:
            //             '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
            //         time: new Date().toLocaleString(),
            //     },
            //     {
            //         direction: 2,
            //         id: 5,
            //         auther: '../../../../../static/img/avatar1.png',
            //         content: '上市五周年,雄起 ! ! ![微笑]',
            //         time: new Date().toLocaleString(),
            //     },
            //     {
            //         direction: 1,
            //         id: 3,
            //         auther: '../../../../../static/img/avatar4.png',
            //         content:
            //             '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
            //         time: new Date().toLocaleString(),
            //     },
            //     {
            //         direction: 1,
            //         id: 3,
            //         auther: '../../../../../static/img/avatar4.png',
            //         content:
            //             '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
            //         time: new Date().toLocaleString(),
            //     },
            //     {
            //         direction: 2,
            //         id: 5,
            //         auther: '../../../../../static/img/avatar1.png',
            //         content: '上市五周年,雄起 ! ! ![微笑]',
            //         time: new Date().toLocaleString(),
            //     },
            // ],
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
        // 测试token
        let tokentest =
            'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBfaWQiOiJJQ0VTTUpIWkYtNTQ4Qy1KUVhFLUVOOFEtNUUxSUZCTjU3UERMIiwianRpIjoiYjRiZWU5ZmUwYWVmOTI3ZTJhOWUyYjcwNzI4MzJkNmUiLCJpYXQiOjE1NTkxMzQwMTIsIm5iZiI6MTU1OTEzNDAxMiwiZXhwIjoxNTU5MTQxMjEyLCJzdWIiOjEwMDI4NTEyMDUsInNjb3BlcyI6IltdIn0_.19c4d1e9e0204e03bf05c33a805070652caa6ac6198014d5c0d39b6ec12f08ed'
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
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBfaWQiOiJJQ0VTTUpIWkYtNTQ4Qy1KUVhFLUVOOFEtNUUxSUZCTjU3UERMIiwianRpIjoiYjRiZWU5ZmUwYWVmOTI3ZTJhOWUyYjcwNzI4MzJkNmUiLCJpYXQiOjE1NTkxMzQwMTIsIm5iZiI6MTU1OTEzNDAxMiwiZXhwIjoxNTU5MTQxMjEyLCJzdWIiOjEwMDI4NTEyMDUsInNjb3BlcyI6IltdIn0_.19c4d1e9e0204e03bf05c33a805070652caa6ac6198014d5c0d39b6ec12f08ed'
            let token = sessionStorage.getItem('access_token')
            // let that = this;
            if (this.inputValue != '') {
                // 测试发送
                this.$axios
                    .post(
                        `activity/messageadd`,
                        {
                            content:this.inputValue,
                            access_token:token
                        }
                    )
                    .then(response => {
                        //  Toast.success('发送成功')
                        console.log(response);
                        // that.wxChatData.push(response)
                        let is_first = JSON.parse(response.data[0]).is_first;
                        console.log(is_first);
                        if (is_first == 1) {
                            this.$axios
                                .post('/coupon/combine/send', {
                                    access_token: token,
                                })
                                .then(response => {
                                    console.log(response)
                                    this.youhuiShow = true;
                                    alert("第一次")
                                })
                                .catch(err => {
                                    console.log(err)
                                })
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })

                this.inputValue = ''
                // 这里后续加一个优惠券弹框判断
                // this.youhuiShow = true
                // 上述没问题,返回成功
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
        goDiscount(){
            this.$router.push({ path: 'page3-1' })
        },
        // 封装函数
        getMessage() {
            let tokentest =
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBfaWQiOiJJQ0VTTUpIWkYtNTQ4Qy1KUVhFLUVOOFEtNUUxSUZCTjU3UERMIiwianRpIjoiYjRiZWU5ZmUwYWVmOTI3ZTJhOWUyYjcwNzI4MzJkNmUiLCJpYXQiOjE1NTkxMzQwMTIsIm5iZiI6MTU1OTEzNDAxMiwiZXhwIjoxNTU5MTQxMjEyLCJzdWIiOjEwMDI4NTEyMDUsInNjb3BlcyI6IltdIn0_.19c4d1e9e0204e03bf05c33a805070652caa6ac6198014d5c0d39b6ec12f08ed'
            let token = sessionStorage.getItem('access_token')
            let that = this
            let timeId = setInterval(() => {
                this.$axios
                    .get(
                        // `/activity/messageadd?access_token=123&content=${this.inputValue}`
                        `/activity/messageview?access_token=${token}&`
                    )
                    .then(function(response) {
                        // console.log(response);

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


<style lang="scss" scoped>
@import '../../../../static/css/aspirations.scss';
</style>
