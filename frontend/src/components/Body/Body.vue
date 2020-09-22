<template>
<div v-if="getAnswer" class="wrapper-body">
  <div class="wrapper-body__city">
    {{ cityWeather.city }}
    <div class="wrapper-body__temp">{{ cityWeather.temperature}} °C</div>
    <div class="wrapper-body__weather">{{cityWeather.weather}}, ощущается как {{ cityWeather.feels_like}}°C</div>

    <div class="wrapper-body__wind">
      Ветер {{cityWeather.wind_direction}}, скорость {{cityWeather.wind_speed}} м/с
    </div>
    <div class="wrapper-body__wind">
      Влажность {{cityWeather.humidity}}%
    </div>

  </div>
</div>
</template>

<script>
export default {
name: "Body",
props: ["cityWeather", "getAnswer"]
}
</script>

<style scoped>

.wrapper-body{
  margin:0 auto;
  background-color: rgba(0,0,0,0.5);
  width: 50%;
  height: 400px;
  border-radius: 10px;
}
.wrapper-body__city{
  color: #fff;
  font-size: 60px;
  font-weight: bold;
  padding-top: 10px;
  padding-bottom: 10px;
}
.wrapper-body__temp{
  font-size: 70px;
  padding-top: 15px;
  color: #fff;
}

.wrapper-body__weather{
  font-size: 15px;
  font-weight: lighter;
  color: #fff;
}
.wrapper-body__wind{
  padding-top: 40px;
  font-size: 20px;
  font-weight: normal;
  color: #fff;
}

</style>