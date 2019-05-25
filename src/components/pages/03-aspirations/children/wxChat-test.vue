//微信聊天可视化组件
//依赖指令v-emotion（实现请查看main.js）

//参数：
// width               组件宽度，默认450
// wrapBg              外层父元素背景颜色，默认#efefef
// maxHeight           展示窗口最高高度, 默认900
// contactAvatarUrl    好友头像url
// ownerAvatarUrl      微信主人头像url
// ownerNickname       微信主人昵称
// getUpperData        （必需）当滚动到上方时加载数据的方法，返回值要为Promise对象，resolve的结构同data
// getUnderData        （必需）当滚动到下方时加载数据的方法，返回值同上
// data                （必需）传入初始化数据， 结构如下：
// [{
//     direction: 2, //为2表示微信主人发出的消息，1表示联系人
//     id: 1, //根据这个来排序消息
//     type: 1, //1为文本，2为图片
//     content: '你好!![呲牙]', //当type为1时这里是文本消息，当type2为2时这里要存放图片地址；后续会支持语音的显示
//     ctime: new Date().toLocaleString() //显示当前消息的发送时间
// },
// {
//     direction: 1,
//     id: 2,
//     type: 1,
//     content: '你也好。[害羞]',
//     ctime: new Date().toLocaleString()
// }]



<template>
    <div class="wxchat-container" :style="{backgroundColor: wrapBg}">
        <div class="window" id="window-view-container" >
            <!-- data is empty -->
            <div class="loading" v-if="dataArray && dataArray.length==0">
                <div style="margin-top: 300px;text-align:center; font-size: 16px;">
                    <span>未查找到聊天记录</span>
                </div>
            </div>
            <!-- loading -->
            <div class="loading" v-if="dataArray.length==0">
                <div style="margin-top: 300px;">
                    <div>加载中...</div>
                </div>
            </div>

    
            <!-- main -->
            <div :minHeight="minHeight"   class="container-main" v-if="dataArray && dataArray.length>0" >
                <div class="message">
                    <ul>
                        <li v-for="message in dataArray" :key="message.id+Math.random()*10" :class="message.direction==2?'an-move-right':'an-move-left'">
                            <p class="time">
                                <span v-text="message.ctime"></span>
                            </p>
                            <p class="time system" v-if="message.type==10000">
                                <span v-html="message.content"></span>
                            </p>
                            <div :class="'main' + (message.direction==2?' self':'')" v-else>
                                <img class="avatar" width="45" height="45" :src="message.auther">
                                <!-- 文本 -->
                                <div class="text" v-emotion="message.content" ></div>
                                
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>

    </div>
</template>

<script>


export default {
    name: 'wxChat',
    props: {
        contactNickname: {
            type: String,
            default: 'Mystic Faces',
        },

        data: {
            type: Array,
            required: true,
        },

        width: {
            type: Number,
            default: 450,
        },

        wrapBg: {
            type: String,
            default: '#efefef',
        },

        

        contactAvatarUrl: {
            type: String,
        },

        ownerAvatarUrl: {
            type: String,
        },

    },

    data() {
        return {
            isUpperLaoding: false,
            isUnderLaoding: false,

            isRefreshedAll: false,
            isLoadedAll: false,

            minHeight: 700,
            dataArray: [],
        }
    },
    beforeCreate() {
                   // 增加数据
        // this.$axios
        //     .get('activity/messageview')
        //     .then(res => {
        //         console.log(res);

        //         let resValue=res.data.content[5];
        //         let jsValue=JSON.parse(resValue)
        //         // console.log(jsValue)
        //         this.dataArray.push(jsValue)
        //     })
        //     .catch(error => {
        //         console.log(error)
        //     }) 
    },

    created() {
        this.initData();
  
    },
    mounted() {
   
    },

    methods: {
        initData() {
            this.dataArray = this.dataArray.concat(this.data)
        },  
    },
}
</script>

<style scoped>

.wxchat-container {
    width: 100%;
    height: 100%;
    z-index: 100;
    /* overflow: hidden; */
}
.shadow {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    background: #000;
    opacity: 0.2;
}
.window {
    /* box-shadow: 1px 1px 20px -5px #000; max-width: 450px; */
    min-width: 300px;
    background: #f5f5f5;
    margin: 0 auto;
    overflow: hidden;
    padding: 0;
    height: 100%;
    position: relative;
    z-index: 101;
}
button {
    border: 0;
    background: none;
    border-radius: 0;
    text-align: center;
}
button {
    outline: none;
}
.w100 {
    width: 100%;
}
.mt5 {
    margin-top: 5px;
}
.mt10 {
    margin-top: 10px;
}
.mt20 {
    margin-top: 20px;
}
.mb10 {
    margin-bottom: 10px;
}
.mb20 {
    margin-bottom: 20px;
}
.fs0 {
    font-size: 0;
}
.title {
    background: #000;
    text-align: center;
    color: #fff;
    width: 100%;
    height: 50px;
    line-height: 50px;
    font-size: 14px;
}
.loading,
.no-more {
    text-align: center;
    color: #b0b0b0;
    line-height: 100px;
}
.no-more {
    line-height: 60px;
}
.pull-right {
    float: right;
}
.link-line {
    text-decoration: underline;
}
.message {
    /* height: 24rem; */
    padding: 10px 15px;
    /*overflow-y: scroll;*/
    background-color: #f5f5f5;
}
.message li {
    margin-bottom: 15px;
    left: 0;
    position: relative;
    display: block;
    margin-top: 47px;
}
.message li:nth-child(1){
    margin-top: 0px;
}
.message .time {
    margin: 10px 0;
    text-align: center;
}
.message .text {
    display: inline-block;
    position: relative;
    padding: 0 10px;
    max-width: calc(100% - 75px);
    min-height: 35px;
    line-height: 2.1;
    font-size: 15px;
    padding: 6px 10px;
    text-align: left;
    word-break: break-all;
    background-color: #fff;
    color: #000;
    border-radius: 4px;
    box-shadow: 0px 1px 7px -5px #000;
    
}
.message .avatar {
    float: left;
    margin: 0 10px 0 0;
    border-radius: 3px;
    background: #fff;
}
.message .time > span {
    display: inline-block;
    padding: 0 5px;
    font-size: 12px;
    color: #fff;
    border-radius: 2px;
    background-color: #dadada;
}
.message .system > span {
    padding: 4px 9px;
    text-align: left;
}
.message .text:before {
    content: ' ';
    position: absolute;
    top: 9px;
    right: 100%;
    border: 6px solid transparent;
    border-right-color: #fff;
}
.message .self {
    text-align: right;
}
.message .self .avatar {
    float: right;
    margin: 0 0 0 10px;
}
.message .self .text {
    background-color: #9eea6a;
}

.message .self .text:before {
    right: inherit;
    left: 100%;
    border-right-color: transparent;
    border-left-color: #9eea6a;
}
.message .image {
    max-width: 200px;
}
img.static-emotion-gif,
img.static-emotion {
    vertical-align: middle !important;
}

.an-move-left {
    left: 0;
    animation: moveLeft 0.7s ease;
    -webkit-animation: moveLeft 0.7s ease;
    display: flex;
}

.an-move-right {
    left: 0;
    animation: moveRight 0.7s ease;
    -webkit-animation: moveRight 0.7s ease;
}
.bgnone {
    background: none;
}
/* 这是我加的 */
.an-move-left >div >div{
    float: left;
}
@keyframes moveRight {
    0% {
        left: -20px;
        opacity: 0;
    }
    100% {
        left: 0;
        opacity: 1;
    }
}

@-webkit-keyframes moveRight {
    0% {
        left: -20px;
        opacity: 0;
    }
    100% {
        left: 0px;
        opacity: 1;
    }
}
@keyframes moveLeft {
    0% {
        left: 20px;
        opacity: 0;
    }
    100% {
        left: 0px;
        opacity: 1;
    }
}

@-webkit-keyframes moveLeft {
    0% {
        left: 20px;
        opacity: 0;
    }
    100% {
        left: 0px;
        opacity: 1;
    }
}

@media (max-width: 367px) {
    .fzDInfo {
        width: 82%;
    }
}
</style>
