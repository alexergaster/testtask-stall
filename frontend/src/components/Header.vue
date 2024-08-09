<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <div class="order-1">
        <a class="navbar-brand" href="/">MyShop</a>
      </div>

      <div class="collapse navbar-collapse order-2 justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Головна</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Товари</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/category">Категорії</a>
          </li>
        </ul>
      </div>

      <div class="order-3">
        <a class="navbar-brand" href="#">Корзина</a>
      </div>

    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style scoped>
.navbar-brand {
  margin: 0 15px;
}

.order-1, .order-3 {
  display: flex;
  align-items: center;
}

.order-2 {
  flex: 1;
}

.nav-item {
  margin: 0 10px;
}
</style>
