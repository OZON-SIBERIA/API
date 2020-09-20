<template>
  <div class="wrapper-layote">
      
      <HeaderFront/>
      <SreachCity/>
  </div>
</template>

<script>
import HeaderFront from '../HeaderFront/HeaderFront'
import SreachCity from '../SreachCity/SreachCity'
export default {
    name: "Layote",
    components:{
        HeaderFront,
        SreachCity
    }
}
</script>

<style>
.wrapper-layote{
    width: 50%;
    background-color: #ccc;
    margin: 0 auto;
    text-align: center;
    padding-top:50px ;
}

</style>