<template>
  <div class="wrapper-layout">
      
      <HeaderFront/>
      <SearchCity/>
  </div>
</template>

<script>
import HeaderFront from '../HeaderFront/HeaderFront'
import SearchCity from '../SearchCity/SearchCity'
export default {
    name: "Layout",
    components:{
        HeaderFront,
      SearchCity
    }
}
</script>

<style>
.wrapper-layout{
    width: 50%;
    background-color: #ccc;
    margin: 0 auto;
    text-align: center;
    padding-top:50px ;
}

</style>