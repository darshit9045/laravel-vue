<style>
.search-box {
  width: 0;
  overflow: hidden;
  transition: width 0.5s;
}

.search-box.active {
  width: 200px; /* Adjust the width as per your requirement */
}
</style>
<template>
<div class="main-header">
<div class="top-header py-4">
  <section class="page_toplogo table_section ls mainpge_toplogo section_padding_25">
    <div class="container">
      <div class="row d-flex justify-content-between align-items-center">
<!--        <div class="col-sm-6 col-lg-2 logo"> <a href="#"> <img src="/images/logo.png" alt=""> </a>-->
<!--        </div>-->

          <div class="col-sm1-6 col-lg-2 logo" v-if="apiData"> <a href="/"> <img :src="'/images/'+ apiData[0][3].value" alt=""> </a>
          </div>

        <div class="col-sm-12 col-lg-8 text-center text-sm-right teasers-line d-flex justify-content-between align-items-center address">
          <div class="text-uppercase semibold small-teaser text-left ">
            <div class="grey bold text-uppercase" style="font-size: 15px;font-weight: 700; color: #343434;">Any question at
            </div>
            <div style="font-weight: 700;font-size: 14px;color: #868686;" v-if="apiData">{{phoneNumber}}</div>
          </div>
          <div class=" semibold small-teaser  icon d-flex align-items-center">
            <img src="/images/home.png" class="p-3">
            <div style="text-align: start;">
              <div class="grey bold" style="font-size: 15px;font-weight: 700;" v-if="apiData">
                {{ arr[0]+' '+arr[1]+' '+arr[2] }}
              </div>
              <div style="font-weight: 700; font-size: 14px; color: rgb(134, 134, 134);">{{ arr[3]+' '+arr[4] }}</div>
            </div>
          </div>
          <div class=" semibold small-teaser  icon d-flex align-items-center">
            <img src="/images/mail.png" class="p-3">
            <div style="text-align: start;">
              <div class="grey bold" style="font-size: 15px;font-weight: 700;">Send your mail at
              </div>
              <div style="font-weight: 700;font-size: 14px;color: #868686;" v-if="apiData"> {{ apiData[0][11].value }} </div>
            </div>
          </div>

        </div>

        <div class="col-sm-6 col-lg-2 text-center text-sm-right teasers-line d-flex justify-content-end p-0 social-media">

          <a :href="socialArr.facebook">
            <img href="#" src="/images/facebook.png" class="border">
          </a>
          <a :href="socialArr.twitter">
            <img href="#" src="/images/twitter.png" class="border">
          </a>
<!--          <a href="#">-->
<!--            <img href="#" src="/images/goggleplus.png" class="border">-->
<!--          </a>-->
        </div>

      </div>
    </div></section>
</div>
<!-- Navbar  -->
<nav class="navbar sticky-top navbar-expand-lg  p-0">
  <div class="container p-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img src="/images/hamburger-menu-icon.svg">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto w-100" style="align-items: center;">

        <li class="nav-item home" data-name="">
          <a class="nav-link" href="/">HOME <span class="sr-only"></span></a>
        </li>

        <li class="nav-item about-us" data-name="">
          <a class="nav-link" href="/about-us"> ABOUT US <span class="sr-only"></span></a>
        </li>

        <li class="nav-item residential-projects" data-name="">
<!--          <a class="nav-link" href="/residential-projects"> RESIDENTIAL PROJECTS-->
<!--            <span class="sr-only"></span></a>-->
          <div class="dropdown" v-if="apiData">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              PROJECTS
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li v-for="data in projectsArray" :key="data.id"><a class="dropdown-item" :href="'/'+ data.name.replace(/\s+/g, '-').toLowerCase()">{{ data.name }}</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item contact-us" data-name="contact-us">
          <a class="nav-link" href="/contact-us" style="color: white;">CONTACT
            US</a>
        </li>
        <li class="d-flex">
          <a href="javascript:void(0);">
            <div class="input-group rounded">
               <span class="input-group-text border-0" id="search-addon">
                  <img class="fas fa-search" src="/images/magnifying-glass.svg">
               </span>
            </div>
          </a>
          <div class="search-box">
            <input type="text" class="form-control" name="global_search" placeholder="Search...">
<!--            <button type="button" class="btn btn-primary">Search</button>-->
          </div>
        </li>
        <li class="inquire-now">
          <a href="#"> inquire now </a>
        </li>
      </ul>
    </div>

  </div>
</nav>
</div>
</template>
<script>
$(document).on("click","#search-addon",function(){
  if($('.search-box').hasClass('active')){
    $('.search-box').removeClass('active');
  }else{
    $('.search-box').addClass('active');
  }
})
import axios from 'axios';
export default {
  data() {
    return {
      apiData: null, // Initialize variable to store the received data
      arr: [],
      socialArr:[],
      phoneNumber : '',
      projectsArray : [],
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('/api/getHeaderData');
        //pass response data in apiData variable
        this.apiData = response.data;
        //breaking social links string into array
        this.socialArr = this.apiData[1].Social;
        //Splitting address in multiple parts for view
        this.arr = this.apiData[0][19].value.split(' ');
        //contact number formatter
        this.phoneNumber = `1-${ this.apiData[0][18].value.substring(1, 4)}-${ this.apiData[0][18].value.substring(4, 6)}-${ this.apiData[0][18].value.substring(6, 9)}-${ this.apiData[0][18].value.substring(9)}`;
        //projects category array load dynamically project categories
        this.projectsArray = this.apiData[2];
      } catch (error) {
        console.error(error);
      }
    },
  },
};

</script>