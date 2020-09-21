<template>
  <div class="wrapper-search-city">
    <input type="text" v-model="message" placeholder="Введите город, который вас интересует...">

    <p>Ваш город: {{ message }}</p>

    <button v-on:click='searchApiPost'>Поиск</button>
  </div>
</template>

<script>

import axios from 'axios'

export default {
  name: 'SearchCity',

  data() {
    return {
      message: "",
    }
  },
  methods: {
    searchApiPost() {
      let str = JSON.stringify(this.message);
      axios
          .post('http://localhost:9000/', str)
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
    }
  }
}
</script>

<style>
.wrapper-search-city {
  padding-top: 50px;
}


</style>