<template>
    <div>
       
        <van-popup v-model="show" position="bottom" >
            内容asdlfkasasdfasdfffffffffffffdasefcsdc

            asfewqf4e
        </van-popup>
    </div>

</template>

<script>
import Vue from 'vue'
import { Popup } from 'vant'

Vue.use(Popup);
export default {
    data() {
        return {
          show: true
        }
    },
}
</script>

<style>
</style>