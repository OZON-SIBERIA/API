<template>
  <div class="wrapper-layout">

    <HeaderFront/>
    <div class="wrapper-bg-img">
        <div v-if="weatherSunny" class="weather sunny"></div>
        <div v-else-if="weatherRain" class="weather rain"></div>
        <div v-else class="weather gray"></div>



        <SearchCity
            :getWeather="getWeather"
        />

    </div>
    <Footer/>
    </div>
</template>

<script>
import HeaderFront from '../HeaderFront/HeaderFront'
import SearchCity from '../SearchCity/SearchCity'
import Footer from "@/components/Footer/Footer";

export default {
  name: "Layout",
  components: {
    Footer,
    HeaderFront,
    SearchCity
  },
  data() {
    return {
      weatherNow: '',
      classWeatherSunny : '',
      classWeatherRain: '',
      classWeatherGray: '',
      weatherSunny: false,
      weatherRain: false,
    }
  },
  methods:{
    getWeather(weather){
      // this.weatherSunny = false
      // this.weatherRain = false
      console.log(weather)
      if(weather ===  'ясно' || weather === "небольшаДая облачность"){
          this.weatherSunny = true
          this.weatherRain = false

        } else if(weather === 'дождь' || weather ==='небольшой дождь' || weather ==='небольшой проливной дождь'){
        this.weatherSunny = false
        this.weatherRain = true

        } else {
        this.weatherSunny = false
        this.weatherRain = false
      }

      // if(this.weatherNow === 'null' || 'ясно' || 'облачно с прояснениями'){
      //   this.classWeatherSunny = 'weather sunny'
      //   console.log(this.weatherNow)
      //   console.log(this.classWeather)
      // } else if(this.weatherNow === 'дождь' || 'небольшой дождь'|| 'небольшой проливной дождь'){
      //   this.classWeatherRain = 'weather rain'
      //   console.log(this.weatherNow)
      //   console.log(this.classWeather)
      // } else if(this.weatherNow === 'переменная облачность' || 'пасмурно'){
      //   this.classWeatherGray = 'weather gray'
      //   console.log(this.weatherNow)
      //   console.log(this.classWeather)
      // }
    }
  },

}
</script>

<style>
.wrapper-layout {
  margin: 0 auto;
  text-align: center;
  z-index: 2;
}
.wrapper-bg-img{
  position: relative;
  z-index: 2;
}

.weather {
  position: absolute;
  top: 0;
  left: 0;
  min-height: 100%;
  min-width: 100%;
  background-size: 100%;
}
.weather:after{
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  z-index: 0;
  background-color: rgba(0, 0, 0, .3);
}
.sunny{
  background-image: url(http://oboi.cc/uploads/new/big/oboik.ru_29246.jpg);
}
.rain{
  background-image: url(https://rus.azattyq-ruhy.kz/cache/imagine/main_page_full/uploads/news/2020/03/30/5e81881a08b7d834348537.jpg) ;
}
.gray{
  background-image: url(https://www.locman.net/img/609/11653.jpg) ;
}

</style>