<template>
  <div v-if="getError" class="wrapper-error-body">
    <div>По вашему вопросу ничего не найдено</div>
  </div>
</template>

<script>
export default {
name: "ErrorBody",
  props:["getError"]

}
</script>

<style scoped>
.wrapper-error-body{
  margin:0 auto;
  background-color: rgba(0,0,0,0.5);
  width: 50%;
  height: 400px;
  border-radius: 10px;
}
.wrapper-error-body div {
  color: #fff;
  font-size: 40px;
  padding-top: 150px;
}
</style>