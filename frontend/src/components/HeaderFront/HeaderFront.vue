<template>
  <div class="wrapper-HeaderFront">
      <span class="str-W">W</span><span class="str">eather</span>
  </div>
</template>

<script>
export default {
    name: 'HeaderFront'
}
</script>

<style>
.wrapper-HeaderFront{
  background-color: #000;
  width: 100%;
  height: 150px;
  line-height: 150px;
}

.str{
  color: #fff;
  font-size: 60px;
  letter-spacing:3px;
  /*font-family: Cantarell;*/

}
.str-W {
  font-family: Cantarell;
  color: #F15B42;
  font-size: 60px;
  letter-spacing: 3px;
}


</style>