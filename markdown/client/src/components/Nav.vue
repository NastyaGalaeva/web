/* eslint-disable */
<template>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="#">Markdown editor</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="/">Создать</b-nav-item>
        <b-nav-item href="/preview">Просмотр</b-nav-item>
        <b-nav-item href="/list">Редактировать</b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
export default {
  name: 'Nav'
}
</script>

<style scoped>

</style>
