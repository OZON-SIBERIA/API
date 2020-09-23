<template>
  <div class="wrapper-search-city">

    <div class="wrapper-input">
      <input class="input" type="text" v-model="message" placeholder="Введите город, который вас интересует...">
      <button v-on:click="searchApiPost" ></button>
    </div>
    <Body
        :getAnswer="getAnswer"
        :cityWeather="city"/>
    <ErrorBody
        :getError="getError"/>

  </div>
</template>

<script>

import axios from 'axios'
import Body from "@/components/Body/Body";
import ErrorBody from "@/components/ErrorBody/ErrorBody";

export default {
  name: 'SearchCity',
  components: {ErrorBody, Body},
  props: ["getWeather"],
  data() {
    return {
      message: "",
      city: {},
      weather: '',
      getAnswer: false,
      getError: false
    }
  },
  methods: {
    searchApiPost(){
      let str = JSON.stringify(this.message);
      axios
          .post('http://localhost:9000/', str)
          .then((response) => {
            if (response.data.city === null) {
              this.getAnswer = false
              this.getError = true
              this.city = {}
              this.message = ''

            } else {
              this.getAnswer = true
              this.getError = false
              this.city = response.data
              this.weather = this.city.weather
              //отправляем данные в Layout
              this.$props.getWeather(this.weather)
              this.message = ''
            }


          })
          .catch((error) => {
            console.log(error);
          });
    },

  }
}
</script>

<style>
.wrapper-search-city {
  position: relative;
  padding-top: 50px;
  min-height: 700px;
}

.wrapper-input {
  position: relative;
  margin: 0 auto;
  width: 300px;
  padding-bottom: 50px;
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

button:hover {
  background: #921904;
}

input:hover {
  background: #bfbab2;
}


button:before {
  content: ">";
  color: #F9F0DA;
  font-size: 20px;
  font-weight: bold;
}



</style>