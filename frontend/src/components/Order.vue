<template>
  <div class="container mt-5">
    <h1 class="mb-4">Оформлення замовлення</h1>

    <form @submit.prevent="submitOrder">
      <div class="form-group">
        <label for="name">Ім’я:</label>
        <input
            type="text"
            id="name"
            v-model="name"
            class="form-control"
            :class="{ 'is-invalid': nameError }"
        />
        <div v-if="nameError" class="invalid-feedback">{{ nameError }}</div>
      </div>
      <div class="form-group mt-3">
        <label for="phone">Номер телефону:</label>
        <input
            type="text"
            id="phone"
            v-model="phone"
            class="form-control"
            :class="{ 'is-invalid': phoneError }"
        />
        <div v-if="phoneError" class="invalid-feedback">{{ phoneError }}</div>
      </div>

      <div class="form-group mt-3">
        <label for="email">Ел. пошта:</label>
        <input
            type="email"
            id="email"
            v-model="email"
            class="form-control"
            :class="{ 'is-invalid': emailError }"
        />
        <div v-if="emailError" class="invalid-feedback">{{ emailError }}</div>
      </div>

      <div class="form-group mt-3">
        <label for="email">Ваші товари:</label>
        <div v-for="product in products" :key="product.id">
          <h5> {{ product.title }} - <span class="text-success">{{ product.price }} грн</span></h5>
        </div>
      </div>

      <div class="form-group mt-3">
        <label>Загальна сума:</label>
        <h5 class="text-success">{{ sumPrice }} грн</h5>
      </div>

      <button type="submit" class="btn btn-success btn-lg mt-4">
        Підтвердити замовлення
      </button>
    </form>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  name: "Order",

  data() {
    return {
      name: '',
      phone: '',
      email: '',
      nameError: '',
      phoneError: '',
      emailError: '',
      products: JSON.parse(localStorage.getItem('cart')),
      sumPrice: 0,
    };
  },
  computed: {
    sumPrice() {
      return Object.values(this.products).reduce((sum, product) => {
        return sum + (product.price * product.quantity);
      }, 0);
    }
  },
  methods: {
    validateForm() {
      this.nameError = '';
      this.phoneError = '';
      this.emailError = '';

      let isValid = true;

      if (!this.name || this.name.length < 3) {
        this.nameError = 'Ім’я повинно містити принаймні 3 символи';
        isValid = false;
      }

      const phonePattern = /^\d{10,12}$/;
      if (!this.phone || !phonePattern.test(this.phone)) {
        this.phoneError = 'Введіть коректний номер телефону (10-12 цифр)';
        isValid = false;
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!this.email || !emailPattern.test(this.email)) {
        this.emailError = 'Введіть коректну електронну пошту';
        isValid = false;
      }

      return isValid;
    },
   async submitOrder() {
      if (this.validateForm()) {
        const data = {
          name: this.name,
          phone: this.phone,
          email: this.email,
          productsId: this.products
        };
        console.log(data)

        axios.post('users', data)
            .then(response => {
              console.log('User created successfully:', response.data);
            })
            .catch(error => {
              console.error('There was an error creating the user:', error);
            });
      }
    }
  }
}

</script>