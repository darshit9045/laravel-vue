<template>
<div class="main-header">
<div class="top-header py-4">
  <section class="page_toplogo table_section ls mainpge_toplogo section_padding_25">
    <div class="container">
      <div class="row d-flex justify-content-between align-items-center">

        <div class="col-sm-6 col-lg-2 logo"> <a href="#"> <img src="/images/logo.png" alt> </a>
        </div>

        <div
            class="col-sm-12 col-lg-8 text-center text-sm-right teasers-line d-flex justify-content-between align-items-center address">
          <div class="text-uppercase semibold small-teaser text-left ">
            <div class="grey bold text-uppercase" style="font-size: 15px;font-weight: 700; color: #343434;">Any question at
            </div>
            <div style="font-weight: 700;font-size: 14px;color: #868686;"> 1-800-23-456-7890</div>
          </div>
          <div class=" semibold small-teaser  icon d-flex align-items-center">
            <img src="/images/home.png" class="p-3">
            <div style="text-align: start;">
              <div class="grey bold" style="font-size: 15px;font-weight: 700;">0258 Hans Centers
              </div>
              <div style="font-weight: 700;font-size: 14px;color: #868686;"> Cristoballand, USA </div>
            </div>
          </div>
          <div class=" semibold small-teaser  icon d-flex align-items-center">
            <img src="/images/mail.png" class="p-3">
            <div style="text-align: start;">
              <div class="grey bold" style="font-size: 15px;font-weight: 700;">Send your mail at
              </div>
              <div style="font-weight: 700;font-size: 14px;color: #868686;"> moveco@support.com </div>
            </div>
          </div>

        </div>

        <div
            class="col-sm-6 col-lg-2 text-center text-sm-right teasers-line d-flex justify-content-end p-0 social-media">
          <a href="#">
            <img href="#" src="/images/facebook.png" class="border">
          </a>
          <a href="#">
            <img href="#" src="/images/twitter.png" class="border">
          </a>
          <a href="#">
            <img href="#" src="/images/goggleplus.png" class="border"> </a>
        </div>

      </div>
    </div>

  </section>
</div>
<!-- Navbar  -->
<nav class="navbar sticky-top navbar-expand-lg  p-0">
  <div class="container p-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img src="/images/hamburger-menu-icon.svg">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto w-100" style="align-items: center;">
        <li class="nav-item active">
          <a class="nav-link" href="#">TEST <span class="sr-only"></span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"> ABOUT US <span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"> RESIDENTIAL PROJECTS
            <span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#" style="color: white;">CONTACT
            US</a>
        </li>
        <li>
          <a href="#">
            <div class="input-group rounded">
                           <span class="input-group-text border-0" id="search-addon">
                              <img class="fas fa-search" src="/images/magnifying-glass.svg">
                           </span>
            </div>
          </a>
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
// console.log(arrayData);
export default {
  props: {
    arrayData: {
      type: Array,
      required: true,
    },
  },
  methods: {
    processArray() {
      // Accessing myArray (arrayData) in the child component
      // Perform operations or manipulations on the array
      console.log(this.arrayData); // Output the array to the console

      // Example: Summing up the array elements
      const sum = this.arrayData.reduce((acc, currentValue) => acc + currentValue, 0);
      // console.log("Sum of the array elements:", sum);
    }
  },
  mounted() {
    // Call the method to process the array when the component is mounted
    this.processArray();
    // Use the arrayData prop in your child component as needed
  }
}
</script>