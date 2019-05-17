<template>
    <div class="great">
        <div class="content1">
            <!-- <p>第一页</p> -->
            <!-- 动画 -->
            <div>
                <div class="ballon"></div>
            </div>

        </div>
        <div class="content2">
            <!-- <p>第二页</p> -->
        </div>
        <div class="content3">
            <!-- <p>第三页</p> -->

        </div>

    </div>

</template>
<script>
export default {
    name: 'great',
    data() {
        return {}
    },
}
</script>
<style lang="scss" scoped>
.great {
    width: 100%;
    height: 111.25rem;
    .content1 {
        background: url('../../../../static/img/great1-2.jpg') no-repeat center
            top;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            >div{
                padding-bottom: 1.87rem;
            }
            p{
                text-align: center;
            }
            
        
    }
    .content2 {
        background: url('../../../../static/img/great2.jpg') no-repeat center
            top;
    }
    .content3 {
        background: url('../../../../static/img/great3.jpg') no-repeat center
            top;
    }
    .content1,
    .content2,
    .content3 {
        width: 100%;
        height: 32.82rem;
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
</style>
