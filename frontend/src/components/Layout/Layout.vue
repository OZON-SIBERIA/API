<template>
  <div class="wrapper-layout">

    <HeaderFront/>
    <div class="wrapper-bg-img">
        <div v-if="this.weatherOne === 'suny'" class="weather sunny"></div>
        <div v-if="this.weatherTwo === 'rainn'" class="weather rain"></div>
        <div v-if="this.weatherThree === 'gray'" class="weather gray"></div>
        <SearchCity/>

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
      weatherOne: 'sunny',
      weatherTwo: 'rain',
      weatherThree: 'gray'

    }
  }
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
  object-fit: cover;

  background-color: rgba(0, 0, 0, .3);
}

.sunny{
  background-image: url(http://oboi.cc/uploads/new/big/oboik.ru_29246.jpg);
  background-repeat: no-repeat;
}
.rain{
  background-image: url(https://rus.azattyq-ruhy.kz/cache/imagine/main_page_full/uploads/news/2020/03/30/5e81881a08b7d834348537.jpg) ;
}
.gray{
  background-image: url(https://www.locman.net/img/609/11653.jpg) ;
}

</style>