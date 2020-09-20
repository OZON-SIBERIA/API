<template>
  <div class="wrapper-sreach-city">
    <input type="text" v-model="message" placeholder="Введите город, который вас интересует...">

    <p>Ваш город: {{message}}</p>

    <button v-on:click='sreachApiPost'>Поиск</button>   
  </div>
</template>

<script>
export default {
    name: 'SreachCity',
    data(){
        return{
            message: "",
        }
    },
    methods: {
        sreachApiPost(){
            console.log(this.message)
        },

    }
    
}
</script>

<style>
.wrapper-sreach-city{
    padding-top: 50px;
}


</style>