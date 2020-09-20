<template>
  <div id="app">
    <div class="wrapper-background-img">
      <SearchCurrentWeather/>
      <WeatherCard/>
      <WeatherInfo/>
    </div>
  </div>
</template>
<script>
import SearchCurrentWeather from "@/components/SearchCurrentWeather";
import WeatherCard from "@/components/WeatherCard";
import WeatherInfo from "@/components/WeatherInfo";

export default {
  name: 'App',
  components: {
    WeatherInfo,
    SearchCurrentWeather,
    WeatherCard
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  position: relative;
}
.wrapper-background-img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
}
.day {
  background-image:;
}
</style>
