<template>
    <div>
        <full-page ref="fullpage" :options="options">
            <div class="section">
                <!-- <button class="next" @click="$refs.fullpage.api.moveSectionDown()">Next</button> -->
                Section 1
            </div>
            <div class="section">
                <!-- <button class="prev" @click="$refs.fullpage.api.moveSectionUp()">Prev</button> -->
                Section 2
            </div>
            <div class="section">
                <!-- <button class="prev" @click="$refs.fullpage.api.moveSectionUp()">Prev</button> -->
                Section 3
            </div>
            <div class="section">
                <!-- <button class="prev" @click="$refs.fullpage.api.moveSectionUp()">Prev</button> -->
                Section 4
            </div>
            <div class="section">
                <!-- <button class="prev" @click="$refs.fullpage.api.moveSectionUp()">Prev</button> -->
                Section 5
            </div>
            <div class="section">
                <!-- <button class="prev" @click="$refs.fullpage.api.moveSectionUp()">Prev</button> -->
                Section 6
            </div>

        </full-page>
    </div>

</template>

<script>
export default {
    data() {
        return {
            options: {
                // menu: '#menu',
                anchors: ['page1', 'page2', 'page3','page4','page5','page6'],
                sectionsColor: ['#41b883', '#ff5f45', '#0798ec','#41b883', '#ff5f45', '#0798ec'],
                
            },
        }
    },
}
</script>

<style>

</style>