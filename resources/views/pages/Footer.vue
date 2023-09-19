<!--<style>-->
<!--.modal {-->
<!--  display: none; /* Hide initially */-->
<!--  position: fixed;-->
<!--  z-index: 1;-->
<!--  left: 0;-->
<!--  top: 0;-->
<!--  width: 100%;-->
<!--  height: 100%;-->
<!--  overflow: auto;-->
<!--  background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent background */-->
<!--}-->

<!--.modal-content {-->
<!--  background-color: #fefefe;-->
<!--  margin: 15% auto;-->
<!--  padding: 20px;-->
<!--  border: 1px solid #888;-->
<!--  width: 80%;-->
<!--}-->

<!--.close {-->
<!--  color: #aaa;-->
<!--  float: right;-->
<!--  text-align: right;-->
<!--  font-size: 28px;-->
<!--  font-weight: bold;-->
<!--}-->
<!--p{-->
<!--  font-weight: bolder;-->
<!--  margin-top: 0;-->
<!--  margin-bottom: 1rem;-->
<!--  text-align: center;-->
<!--}-->

<!--.close:hover,-->
<!--.close:focus {-->
<!--  color: black;-->
<!--  text-decoration: none;-->
<!--  cursor: pointer;-->
<!--}-->
<!--</style>-->
<template>
  <footer class="footer-08" style="margin-top: 100px;">
    <div class="container-fluid px-lg-5 bg-dark">
      <div class="container">
        <div class="col-md-12 py-5">
          <div class="row flex-nowrap justify-content-between">
            <div class="col-md-12 mb-md-0 mb-4 col-lg-3" v-if="apiData">
              <img :src="'/images/'+ apiData[0][4].value" height="50">
              <p style="color: #9F9993;padding-right: 100px;" class="mt-5">{{apiData[0][1].value}}</p>
              <div class=" text-left  teasers-line d-flex justify-content-start p-0 social-media">
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
            <div class="col-md-12 col-lg-5" v-if="apiData">
              <div class="col d-flex p-0">
                <h5 class="text-uppercase"> address: </h5>
                <p>
                  {{ apiData[0][19].value }}
<!--                  SHILP DEVELOPERS, LLPSHILP HOUSE,-->
<!--                  Besides Rajpath Club,Rajpath Rangoli-->
<!--                  Road,Bodakdev,Ahmedabad – 380054,-->
<!--                  Gujarat, India.-->
                </p>
              </div>
              <div class="col d-flex">
                <h5 class="text-uppercase"> phone: </h5>
                <div>
                  <p>{{ apiData[0][18].value }} </p>
                <!--<p>+91 9081227227 </p>-->
                </div>
              </div>
              <div class="col d-flex">
                <h5 class="text-uppercase"> E-MAIL: </h5>
                <p>
                <!-- info@shilp.co.in-->
                  {{ apiData[0][11].value }}
                </p>
              </div>
            </div>
            <form action="#" id="contactUsFrom" class="contact-form col-md-12 col-lg-4">
              <div class="form-group">
                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Your Name">
                <div style="display:none;" class="text-danger" id="full_nameError">Please enter full name</div>
              </div>
              <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email">
                <div style="display:none;" class="text-danger" id="emailError">Please enter email</div>
              </div>
              <div class="form-group">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                <div style="display:none;" class="text-danger" id="subjectError">Please enter subject</div>
              </div>
              <div class="form-group">
                <textarea name="message" id="message"  cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                <div style="display:none;" class="text-danger" id="messageError">Please enter message</div>
              </div>
              <div class="form-group">
                <button type="button" class="form-control px-3" id="submitContactUs"> <a href="javascript:;">
                  send</a></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center p-2" style="background-color: #F69323;">
      <div class="col-md-12">
        <p class="copyright mb-0" style="font-weight: 700;">
          © MoveCo 2016 | Created with  by MWTemplates
        </p>
      </div>
    </div>
  </footer>
  <div class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
        <p>Your contact form submitted successfully.</p>
    </div>
  </div>
</template>
<script>

//Bootstrap Model show hide after submitting contact form
$(document).on("click",".close", function () {
  $(".modal").hide();
  $('#contactUsFrom')[0].reset();
});

$(document).on("click","#submitContactUs",function(){
  //Validating contact form start
  var error = false;
  var full_name = $("#full_name").val();
  var email = $("#email").val();
  var subject = $("#subject").val();
  var message = $("#message").val();

  if(full_name.length == 0){
    error = true;
    $("#full_nameError").show();
  }else{
    $("#full_nameError").hide();
  }

  if(email.length == 0){
    error = true;
    $("#emailError").show();
  }else{
    $("#emailError").hide();
  }

  if(subject.length == 0){
    error = true;
    $("#subjectError").show();
  }else{
    $("#subjectError").hide();
  }

  if(message.length == 0){
    error = true;
    $("#messageError").show();
  }else{
    $("#messageError").hide();
  }

  if(error == false){
    //validation end of contact form
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'/frontend/contact',
      data:$("#contactUsFrom").serializeArray(),
      type:"POST",
      success:function(response){
        $(".modal").show();
      }
    })
  }else{
    return false;
  }
})

import axios from 'axios';
export default {
  data() {
    return {
      apiData: null, // Initialize variable to store the received data
      arr: [],
      socialArr:[]
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
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>