<template>
    <div class="aspirations">
        <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" />
        <!-- <div class="top">
            <img src="../../../../static/img/lunbo2.jpg" alt="">
        </div> -->
        <header class="header">

            <div>
                6205个日夜，因为有你，
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
            <img class="bgc" src="../../../../static/img/xs-bgc.jpg" alt="" v-if="isShow">
            <!-- van-pull-refresh下拉刷新 -->
            <van-pull-refresh v-model="isLoading" @refresh="onRefresh" :success-duration='100'>
                <!-- 2019年5月24日15:30:50q做心声页优化 -->
                <div class="wxchat-container" style="{backgroundColor: #efefef}">
                    <div class="window" id="window-view-container">
                        <!-- data is empty -->
                        <div class="loading" v-if="wxChatData && wxChatData.length==0">
                            <div style="margin-top: 300px;text-align:center; font-size: 16px;">
                                <span>未查找到聊天记录</span>
                            </div>
                        </div>
                        <!-- loading -->
                        <div class="loading" v-if="wxChatData.length==0">
                            <div style="margin-top: 300px;">
                                <div>加载中...</div>
                            </div>
                        </div>
                        <!-- main -->
                        <div class="container-main" v-if="wxChatData && wxChatData.length>0">
                            <div class="message">
                                <ul>
                                    <van-row v-for="message in wxChatData" :key="message.id+Math.random()*10">
                                        <van-col span="24">
                                            <li :class="message.direction==2?'an-move-right':'an-move-left'">
                                                <div class="time">
                                                    <span v-text="message.time"></span>
                                                </div>
                                                <p class="time system" v-if="message.type==10000">
                                                    <span v-html="message.content"></span>
                                                </p>
                                                <div :class=" (message.direction==2?' self':'')" v-else>
                                                    <img class="avatar" width="45" height="45" :src="message.auther">
                                                    <!-- 文本 -->
                                                    <div class="text" v-emotion="message.content"></div>

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
            </van-pull-refresh>
            <!-- 这里增加弹框 -->
            <van-dialog v-model="youhuiShow" title="恭喜你获得司庆福利" show-cancel-button :showConfirmButton=false>
                <img class="youhui-bgc" src="../../../../static/img/xs-youhuiquan.jpg">
            </van-dialog>
            <!--  -->
        </div>
        <footer class="footer">
            <input id="text" type="text" placeholder="说出你祝福..." v-model="inputValue">
            <van-icon name="smile-o" @click="checkemoj" />
            <button @click="send">发送</button>
            <van-popup v-model="emojShow" position="bottom" :overlay="false">
                <div class="my-emojlists">
                    <ul>
                        <li v-for="(item, index) in emojLists" :key="index">
                            <img :src="item.address" alt="" @click="emojHide(item)">
                        </li>
                    </ul>
                </div>
            </van-popup>
        </footer>

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
            // 心声内容
            upperTimes: 0,
            underTimes: 0,
            upperId: 0,
            underId: 6,
            width: window.screen.width,

            // 下面这是心声内容
            wxChatData: [
                //     心声内容说明:
                //     direction: 2, //为2表示微信主人发出的消息，1表示联系人
                //     id: 1, //根据这个来排序消息
                //     type: 1, //1为文本，2为图片
                //     content: '你好!![呲牙]', //当type为1时这里是文本消息，当type2为2时这里要存放图片地址；后续会支持语音的显示
                //     time: new Date().toLocaleString() //显示当前消息的发送时间
                {
                    direction: 1,
                    id: 1,
                    auther: '../../../../../static/img/avatar2.png',
                    content: '上市五周年,雄起 ! ! ![强][强]',
                    time: new Date().toLocaleString(),
                },
                {
                    direction: 1,
                    id: 1,
                    auther: '../../../../../static/img/avatar2.png',
                    content: '上市五周年,雄起 ! ! ![强][强]',
                    time: new Date().toLocaleString(),
                },
                {
                    direction: 1,
                    id: 2,
                    auther: '../../../../../static/img/avatar3.png',
                    content: '反手就是几个赞 [强][强][强]',
                    time: new Date().toLocaleString(),
                },

                {
                    direction: 1,
                    id: 3,
                    auther: '../../../../../static/img/avatar4.png',
                    content:
                        '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
                    time: new Date().toLocaleString(),
                },
                {
                    direction: 2,
                    id: 5,
                    auther: '../../../../../static/img/avatar1.png',
                    content: '上市五周年,雄起 ! ! ![微笑]',
                    time: new Date().toLocaleString(),
                },
                {
                    direction: 1,
                    id: 3,
                    auther: '../../../../../static/img/avatar4.png',
                    content:
                        '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
                    time: new Date().toLocaleString(),
                },
                {
                    direction: 1,
                    id: 3,
                    auther: '../../../../../static/img/avatar4.png',
                    content:
                        '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
                    time: new Date().toLocaleString(),
                },
                {
                    direction: 2,
                    id: 5,
                    auther: '../../../../../static/img/avatar1.png',
                    content: '上市五周年,雄起 ! ! ![微笑]',
                    time: new Date().toLocaleString(),
                },
            ],
        }
    },
    components: {},
    created() {
        this.initWidth()

        if (this.wxChatData.length == 0) {
            // 下面这个后续解开
            this.isShow = true
        }
    },
    mounted() {
       
        this.getMessage();
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
            // console.log(value.content);
            this.inputValue = this.inputValue.concat(value.content)
        },
        send() {
            if (this.inputValue != '') {
                // 测试发送
                this.$axios
                    .get(
                        // `/activity/messageadd?access_token=123&content=${this.inputValue}`
                        `activity/messageadd?content=${this.inputValue}`
                    )
                    .then(function(response) {
                        console.log(response)

                        this.wxChatData.push(response)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })

                this.inputValue = ''
                // 这里后续加一个优惠券弹框判断
                // this.youhuiShow = true;
                // 上述没问题,返回成功
                Toast.success('发送成功')
            } else {
                Notify({
                    message: '内容不能为空哦',
                    duration: 2000,
                    background: '#1989fa',
                })
            }
        },
        // 下面这个是心声的方法
        initWidth() {
            var ua = navigator.userAgent
            var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
                isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
                isAndroid = ua.match(/(Android)\s+([\d.]+)/),
                isMobile = isIphone || isAndroid
            //非移动端设置400px宽度，移动端是100%
            if (!isMobile) {
                this.width = 400
            }
        },
        //    下拉刷新
        onRefresh() {
            setTimeout(() => {
                //   这里后续可以增加请求,请求更多数据

                // this.$toast('刷新成功')
                this.isLoading = false
                // this.count++;
            }, 500)
        },
        // 封装函数
        getMessage() {
            let that = this
            let timeId= setInterval(()=> {
                this.$axios
                    .get(
                        // `/activity/messageadd?access_token=123&content=${this.inputValue}`
                        `/activity/messageview`
                    )
                    .then(function(response) {
                        // console.log(response);
                        let arr = []
                        let obj = response.data.content[0]
                        for (const key in obj) {
                            // console.log(JSON.parse(obj[key]));
                            arr.push(JSON.parse(obj[key]))
                        }
                        //  console.log(arr);
                        for (let index = 0; index < arr.length; index++) {
                            that.wxChatData.push(arr[index])
                            
                        }
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            }, 2000)
        },
        // 封装函数结束
    },
    destroyed() {
        clearInterval(timeId)
    },
}
</script>


<style lang="scss" scoped>
// 多的样式统一封装在static/css文件里
@import '../../../../static/css/aspirations.scss';
</style>
