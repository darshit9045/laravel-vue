<template>
  <Header></Header>
  <div class="rounded-lg p-12 text-center">
    <div class="mb-5 flex items-center justify-between">
<!--      <ChatBubbleLeftEllipsisIcon-->
<!--          class="r-2 flex h-20 w-20 w-0 flex-1 justify-start text-indigo-400 dark:text-indigo-200"-->
<!--      />-->
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
//Bootstrap Model show hide after submitting contact form
$(document).on("click",".close", function () {
  $(".modal").hide();
  $('#contactFrom')[0].reset();
});

$(document).on("click","#submitContact",function(){
  //Validating contact form start
  var error = false;
  var full_name = $("#full_name_").val();
  var email = $("#email_").val();
  var subject = $("#subject_").val();
  var message = $("#message_").val();

  if(full_name.length == 0){
    error = true;
    $("#full_name_Error").show();
  }else{
    $("#full_name_Error").hide();
  }

  if(email.length == 0){
    error = true;
    $("#email_Error").show();
  }else{
    $("#email_Error").hide();
  }

  if(subject.length == 0){
    error = true;
    $("#subject_Error").show();
  }else{
    $("#subject_Error").hide();
  }

  if(message.length == 0){
    error = true;
    $("#message_Error").show();
  }else{
    $("#message_Error").hide();
  }

  if(error == false){
    //validation end of contact form
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'/frontend/contact',
      data:$("#contactFrom").serializeArray(),
      type:"POST",
      success:function(response){
        $(".modal").show();

      }
    })
  }else{
    return false;
  }
})
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
        const response = await axios.get('/api/getContactUsData');
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
