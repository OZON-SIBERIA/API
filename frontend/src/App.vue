<template>
  <div class="wrapper-app">

    <Layout/>
  </div>
 
</template>
<script>
import Layout from './components/Layout/Layout'
export default {
  name: 'App',
  components: {
    Layout
  }
}
</script>

<style>
*{
  font-family: Arial, sans-serif;
  padding: 0;
  margin: 0;
}
/*
.wrapper-background-img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
} */

</style>
