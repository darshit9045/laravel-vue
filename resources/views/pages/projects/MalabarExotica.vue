<template>
  <Header></Header>
  <div class="container rounded-lg p-12 text-center">
    <div v-if="apiData">
      <div v-html="apiData[0].description"></div>
    </div>
  </div>
  <Footer></Footer>
</template>
<script>
import Header from "../Header.vue";
import Footer from "../Footer.vue";
import axios from 'axios';
export default {
  components: {Header,Footer},
  data() {
    return {
      currentTab: 'ongoing',
      ongoingProjects: [],
      completedProjects: [],
      apiData: null, // Initialize variable to store the received data
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('/api/getMalabarExoticaData');
        this.apiData = response.data;
        console.log(this.apiData);
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>