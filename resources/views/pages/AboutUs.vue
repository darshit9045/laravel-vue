<template>
  <Header></Header>
  <div class="rounded-lg p-12 text-center">
    <div class="mb-5 flex items-center justify-between">
    </div>
    <div v-if="apiData">
      <div v-for="data in apiData.data">
        <div v-html="data.body"></div>
      </div>
    </div>
  </div>
  <Footer></Footer>
</template>

<script>
//axios library is use for get data from php laravel side
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import axios from 'axios';
export default {
  components: {Header,Footer},
  data() {
    return {
      apiData: null, // Initialize variable to store the received data
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('/api/getAboutUsData');
        this.apiData = response.data;
        //print dynamic data of json format
        // console.log(this.apiData.data[0].body);
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>
