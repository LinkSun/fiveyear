<template>
    <div class="aspirations">
        <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" />
        <div class="top">
            <img src="../../../../static/img/lunbo2.jpg" alt="">
        </div>

        <div class="main">
            <!-- 下面是显示的背景 -->
            <img class="bgc" src="../../../../static/img/xs-bgc.jpg" alt="" v-if="isShow">
            <!-- van-pull-refresh下拉刷新 -->
            <van-pull-refresh v-model="isLoading" @refresh="onRefresh">
                <wxChat :data="wxChatData" :showShade="false" :ownerAvatarUrl="ownerAvatarUrl" :contactAvatarUrl="contactAvatarUrl" :width="width">
                </wxChat>
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
            <!-- <van-popup v-model="youhuiShow" :overlay="false">
            <img src="../../../../static/img/xs-youhui.jpg" alt="">
            <van-popup> -->

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

Vue.use(Toast)
    .use(Icon)
    .use(PullRefresh)
    .use(Notify)
    .use(Popup)
    .use(Dialog)
import wxChat from './children/wxChat'
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
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/2.gif'),
                    content: '[撇嘴]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/2.gif'),
                    content: '[撇嘴]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/1.gif'),
                    content: '[微笑]',
                },
                {
                    address: require('../../../assets/emoj/2.gif'),
                    content: '[撇嘴]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
                },
                {
                    address: require('../../../assets/emoj/74.gif'),
                    content: '[赞]',
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
            ownerAvatarUrl: '../../../../static/img/avatar1.png',
            contactAvatarUrl: '../../../../static/img/avatar2.png',
            // 下面这是心声内容
            wxChatData: [
                //     心声内容说明:
                //     direction: 2, //为2表示微信主人发出的消息，1表示联系人
                //     id: 1, //根据这个来排序消息
                //     type: 1, //1为文本，2为图片
                //     content: '你好!![呲牙]', //当type为1时这里是文本消息，当type2为2时这里要存放图片地址；后续会支持语音的显示
                //     ctime: new Date().toLocaleString() //显示当前消息的发送时间
                {
                    direction: 1,
                    id: 1,
                    auther: '../../../../../static/img/avatar2.png',
                    content: '上市五周年,雄起 ! ! !',
                    // ctime: new Date().toLocaleString(),
                },
                {
                    direction: 1,
                    id: 2,
                    auther: '../../../../../static/img/avatar3.png',
                    content: '反手就是几个赞 [强][强][强]',
                    // ctime: new Date().toLocaleString(),
                },
                {
                    direction: 1,
                    id: 3,
                    auther: '../../../../../static/img/avatar4.png',
                    content:
                        '祝贺彩生活上市五周年,希望彩生活越来越好![强][强][强]',
                    // ctime: new Date().toLocaleString(),
                },
                {
                    direction: 2,
                    id: 5,
                    auther: '../../../../../static/img/avatar1.png',
                    content: '上市五周年,雄起 ! ! ![微笑]',
                    // ctime: new Date().toLocaleString(),
                },
            ],
        }
    },
    components: { wxChat },
    created() {
        this.initWidth()

        if (this.wxChatData.length == 0) {
            // 下面这个后续解开
            this.isShow = true
        }
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
                // this.$axios
                //     .get(
                //         `/activity/messageadd?access_token=123&content=${this.inputValue}`
                //     )
                //     .then(function(response) {
                //         // console.log(response)
                //     })
                //     .catch(function(error) {
                //         console.log(error)
                //     })

                // 最新需求:不需要这个
                // Toast.success('    提交成功        等待审核')
                this.inputValue = ''
                // 这里后续加一个优惠券弹框判断,已加
                this.youhuiShow = true
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

                this.$toast('刷新成功')
                this.isLoading = false
                // this.count++;
            }, 500)
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

/* 这是心声聊天的其它部分 */
.aspirations {
    background-color: #f2f3f5;
}
.top {
    height: 220px;
    img {
        width: 100%;
        height: 100%;
    }
}

.main {
    position: relative;
    height: 27.18rem;
    margin-bottom: 2.18rem;
    .bgc {
        margin: 7rem auto;
    }
    .message {
        height: 27.18rem;
        padding: 10px;
        .content {
            height: 28rem;

            background-color: skyblue;
        }
    }
}

.footer {
    position: fixed;
    bottom: 0;
    width: 20rem;
    height: 2.18rem;
    z-index: 999;
    background-color: white;
    input {
        padding-left: 0.62rem;
        float: left;
        width: 13.48rem;
        height: 2.18rem;
        font-size: 16px;
    }
    i {
        width: 2.3rem;
        height: 2.18rem;
        line-height: 2.18rem;
        float: left;
        font-size: 1.5rem;
    }
    button {
        width: 3.2rem;
        height: 2.18rem;
        float: left;
        background-color: #333b46;
        color: #fff;
        border-radius: 5px;
    }
}

.my-emojlists ul {
    padding: 20px;
    li {
        float: left;
    }
}
.van-popup--bottom {
    width: 20rem;
}
.youhui-bgc {
    width: 278px;
}
</style>
