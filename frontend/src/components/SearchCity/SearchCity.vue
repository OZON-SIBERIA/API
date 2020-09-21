<template>
  <div class="wrapper-search-city">

    <div class="wrapper-input">
      <input class="input" type="text" v-model="message" placeholder="Введите город, который вас интересует...">
      <button v-on:click='searchApiPost'></button>
    </div>

    <Body/>

  </div>
</template>

<script>

import axios from 'axios'
import Body from "@/components/Body/Body";

export default {
  name: 'SearchCity',
  components: {Body},
  data() {
    return {
      message: "",
      city: null,
      getAnswer: false
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

      axios
          .get('http://localhost:9000/' )
          .then(response => {
            this.city = response.data;
            this.getAnswer = true
          })
          .catch((error) => {
            console.log(error);
          });

      console.log(this.city)
    }
  }
}
</script>

<style>
.wrapper-search-city {
  position: relative;
  padding-top: 50px;
  min-height: 700px;
}
.wrapper-input{
  position: relative;
  margin: 0 auto;
  width: 300px;
  padding-bottom:50px ;
}

input, button {
  border: none;
  outline: none;
  border-radius: 3px;
}
input {
  width: 100%;
  height: 42px;
  background: #F9F0DA;
  padding-left: 15px;
}
button {
  height: 26px;
  width: 26px;
  position: absolute;
  top: 8px;
  right: -8px;
  background: #F15B42;
  cursor: pointer;
}

button:hover{
  background: #921904;
}

input:hover{
  background: #bfbab2;
}


button:before {
  content: ">";
  color: #F9F0DA;
  font-size: 20px;
  font-weight: bold;
}
.wrapper-city{
  padding-top: 50px;
  font-size: 80px;
}

</style>