<template>
    <div>
        <div style="margin-left: 10%; margin-top: 20px;" v-if="userType === 'seller'">
      <a href="/products/create">
        <button class="btn btn-primary">Create New Product</button>
      </a>
    </div>
      <div class="product-cards">
        <div v-if="loading">Loading products...</div>
        <div v-else-if="products.length > 0">
          <div v-for="product in products" :key="product.id" class="product-card">
            <div class="product-content">
              <img :src="getImageUrl(product.image)" alt="Product Image" class="product-image" />
              <div class="product-details">
                <h3>{{ product.name }}</h3>
                <p><strong>Seller:</strong> {{ product.seller ? product.seller.name : 'Unknown Seller' }}</p>
                <p>{{ product.description }}</p>
              </div>
            </div>
            <div class="product-actions">
              <button @click="submitOffer(product.id)" class="btn btn-secondary">Add Offer</button>
              <button v-if="userType === 'seller'" @click="viewOffers(product.id, product.name)" class="btn btn-info">View Offers</button>
            </div>
          </div>
        </div>
        <div v-else>No products found.</div>
      </div>

      <!-- نافذة عرض العروض -->
      <div v-if="showOffersModal" class="modal-overlay">
        <div class="modal-content">
          <h3>Offers for {{ selectedProductName }}</h3>
          <ul v-if="offers.length > 0">
            <li v-for="offer in offers" :key="offer.user_id">
              {{ offer.user_name }}: {{ offer.offer_price }} $
            </li>
          </ul>
          <div v-else>No offers found.</div>
          <button @click="closeOffersModal" class="btn btn-secondary">Close</button>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        products: [],
        userType: null,
        loading: true,
        showOffersModal: false,
        offers: [],
        selectedProductName: '',
        selectedProductId: null,
      };
    },
    mounted() {
      this.fetchUserType();
      this.fetchProducts();
    },
    methods: {
      async fetchUserType() {
        try {
          const token = localStorage.getItem('token');
          const response = await axios.get('/api/user', {
            headers: {
              'Authorization': `Bearer ${token}`,
            },
          });
          this.userType = response.data.type;
        } catch (error) {
          console.error("Error fetching user type:", error);
        }
      },
      async fetchProducts() {
        try {
          const response = await axios.get('/api/products');
          this.products = response.data;
        } catch (error) {
          console.error("Error fetching products:", error);
        } finally {
          this.loading = false;
        }
      },
      async submitOffer(productId) {
        const price = prompt("Enter your price offer:");
        if (price && !isNaN(price) && price > 0) {
          try {
            await axios.post(`/api/products/${productId}/offer`, { offer_price: parseFloat(price) });
            alert("Your offer has been submitted!");
            this.fetchProducts();
          } catch (error) {
            console.error("Error submitting offer:", error);
            alert("There was an error submitting your offer.");
          }
        } else {
          alert("Please enter a valid price.");
        }
      },
      getImageUrl(imagePath) {
        return imagePath ? `/images/${imagePath}` : '/path/to/default/image.jpg';
      },
      async viewOffers(productId, productName) {
        try {
          const response = await axios.get(`/api/products/${productId}/offers`);
          this.offers = response.data;
          this.selectedProductId = productId;
          this.selectedProductName = productName;
          this.showOffersModal = true;
        } catch (error) {
          console.error("Error fetching offers:", error);
          alert("There was an error fetching offers.");
        }
      },
      closeOffersModal() {
        this.showOffersModal = false;
        this.offers = [];
      },
    },
  };
  </script>

  <style scoped>
  .product-cards {
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }

  .product-card {
    display: flex;
    flex-direction: column;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    width: 80%;
    margin: 0 auto;
    box-sizing: border-box;
    background-color: #f9f9f9;
    margin-top: 20px;
  }

  .product-content {
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .product-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
  }

  .product-details {
    flex: 1;
  }

  .product-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 10px;
  }

  .btn-primary {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
  }

  .btn-secondary {
    background-color: #008CBA;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
  }

  .btn-info {
    background-color: #17a2b8;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
  }

  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }

  .modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 80%;
    max-width: 500px;
    text-align: center;
  }

  .modal-content h3 {
    margin-top: 0;
  }

  .modal-content ul {
    list-style-type: none;
    padding: 0;
  }

  .modal-content li {
    padding: 10px 0;
  }

  .modal-content .btn-secondary {
    margin-top: 20px;
  }
  </style>
