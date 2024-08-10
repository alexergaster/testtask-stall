<template>
  <div class="container mt-5">
    <h1 class="mb-4">Кошик</h1>
    <div v-if="Object.keys(products).length">
      <div class="row">
        <ProductCard
            v-for="product in products"
            :key="product.id"
            :product="product"
            :isInCart="true"
            @selectProduct="goToProduct"
            @removeWithCart="handleRemoveToCart"
        />
      </div>
      <div class="row justify-content-center mt-4 mb-5">
        <button class="btn btn-success btn-lg" @click="checkout">
          Оформити замовлення
        </button>
      </div>
    </div>
    <div v-else>
      <p>Товару в кошику поки що немає</p>
    </div>
  </div>
</template>

<script setup>
import {ref, watch} from 'vue';
import {useRouter} from 'vue-router';
import ProductCard from './ProductCard.vue';

const router = useRouter();
const products = ref(JSON.parse(localStorage.getItem('cart')) || {});

watch(products, (newProducts) => {
  localStorage.setItem('cart', JSON.stringify(newProducts));
}, {deep: true});

const goToProduct = (id) => {
  router.push(`/products/${id}`);
};

const handleRemoveToCart = (product) => {
  const cart = JSON.parse(localStorage.getItem('cart')) || {};
  const productId = product.id

  if (cart[productId]) {
    if (cart[productId].quantity > 1) {
      cart[productId].quantity--;
      products.value[productId].quantity--;
    } else {
      delete cart[productId];
      delete products.value[productId];
    }

    products.value = {...products.value};
    localStorage.setItem('cart', JSON.stringify(cart));
  }
};

const checkout = () => {
  router.push('/order');
};
</script>

<style scoped>

</style>
