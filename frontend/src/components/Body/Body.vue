<template>
<div  class="wrapper-body">
  <div class="wrapper-body__city">
    Пермь
    <div class="wrapper-body__temp">12 °C</div>
    <div class="wrapper-body__weather">Переменная облачность, ощущается как 10°C</div>

    <div class="wrapper-body__wind">
      Ветер северо-западный, скорость 12 м/с
    </div>
    <div class="wrapper-body__wind">
      Влажность 15%
    </div>

  </div>
</div>
</template>

<script>
export default {
name: "Body",
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