<template>
  <div class="container mt-5">
    <h1 class="mb-4">Кошик</h1>
    <div class="row">
      <ProductCard
          v-for="product in products"
          :key="product.id"
          :product="product"
          :isInCart="true"
          @selectProduct="goToProduct"
          @removeWithCart="handleRemoveToCart(product.id)"
      />
    </div>
    <div class="row justify-content-center mt-4">
      <button class="btn btn-success btn-lg" @click="checkout">
        Оформити замовлення
      </button>
    </div>
  </div>
</template>

<script>
import ProductCard from './ProductCard.vue';

export default {
  name: 'ShoppingCart',
  components: {ProductCard},

  data() {
    return {
      products: JSON.parse(localStorage.getItem('cart')),
    };
  },
  methods: {
    goToProduct(id) {
      this.$router.push(`/products/${id}`);
    },
    handleRemoveToCart(productId) {
      let cart = JSON.parse(localStorage.getItem('cart'));

      if (cart[productId]) {
        if (cart[productId].quantity > 1) {
          cart[productId].quantity--;
          this.products[productId].quantity--;
        } else {
          delete cart[productId];
          delete this.products[productId];

          this.products = {...this.products};
        }

        localStorage.setItem('cart', JSON.stringify(cart));
      }
    },
    checkout(){
      this.$router.push(`/order`);
    }
  }
}

</script>


<style scoped>

</style>