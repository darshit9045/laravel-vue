<template>
  <Header></Header>
  <div class="container-fluid page-heading">
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="heroContent container">
          <h1>Commercial Projects</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="main">
    <div class="projects container">
      <div class="heading-before d-flex align-items-center pb-4">
        Projects
      </div>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s,Lorem Ipsum is simply dummy text of the
        printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the 1500s,</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s,Lorem Ipsum is simply dummy text of the
        printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the 1500s,</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s,Lorem Ipsum is simply dummy text of the
        printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the 1500s,</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s,Lorem Ipsum is simply dummy text of the
        printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the 1500s,</p>
    </div>

    <div class="ongoing-projects">
      <div class="site container ">
        <ul class="nav nav-tabs container" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" @click="currentTab = 'ongoing'" data-toggle="tab" href="#tabs-1"
               role="tab">Ongoing Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click="currentTab = 'completed'" data-toggle="tab" href="#tabs-2"
               role="tab">Completed Projects</a>
          </li>
        </ul>
        <!-- Tab panes -->

        <div class="tab-content">
          <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="card-deck container p-0" v-if="currentTab == 'ongoing'">
              <div v-for="project in ongoingProjects" :key="project.id"  class="card">
                <img :src="'/images/projects/'+project.image" class="card-img-top" alt="Project Image">
                <div class="centered">
                  <button> <a href="#"> opning projects </a> </button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ project.name }}</h5>
                  <ul>
                    <li class="house"> {{ project.type }} </li>
                    <li class="location"> {{ project.location }} </li>
                  </ul>
                  <button class="view-more"> <a href="#"> View More  </a> </button>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane active" id="tabs-2" role="tabpanel">
            <div class="card-deck container p-0" v-if="currentTab == 'completed'">
              <div v-for="project in completedProjects" :key="project.id" class="card">
                <img :src="'/images/projects/'+project.image" class="card-img-top" alt="Project Image">
                <div class="centered">
                  <button> <a href="#"> opning projects </a> </button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ project.name }}</h5>
                  <ul>
                    <li class="house"> {{ project.type }} </li>
                    <li class="location"> {{ project.location }} </li>
                  </ul>
                  <button class="view-more"> <a href="#"> View More  </a> </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--  <div>-->
  <!--    <div class="tab-buttons">-->
  <!--      <button @click="currentTab = 'ongoing'">Ongoing Projects</button>-->
  <!--      <button @click="currentTab = 'completed'">Completed Projects</button>-->
  <!--    </div>-->

  <!--    <div v-if="currentTab === 'ongoing'" class="row gap-3">-->
  <!--      <div v-for="project in ongoingProjects" :key="project.id" class="card">-->
  <!--        <img :src="'/images/projects/'+project.image" height="100" width="100" alt="Project Image">-->
  <!--        <div class="card-details">-->
  <!--          <h3 align="center">{{ project.name }}</h3>-->
  <!--          <p>Type: {{ project.type }}</p>-->
  <!--          <p>Status: {{ project.status }}</p>-->
  <!--          <p>Location: {{ project.location }}</p>-->
  <!--          <a class="btn btn-primary" href="javascript:;">View More</a>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->

  <!--    <div v-if="currentTab === 'completed'" class="row gap-3">-->
  <!--      <div v-for="project in completedProjects" :key="project.id" class="card">-->
  <!--        <img :src="'/images/projects/'+project.image" height="100" width="100" alt="Project Image">-->
  <!--        <div class="card-details">-->
  <!--          <h3 align="center">{{ project.name }}</h3>-->
  <!--          <p>Type: {{ project.type }}</p>-->
  <!--          <p>Status: {{ project.status }}</p>-->
  <!--          <p>Location: {{ project.location }}</p>-->
  <!--          <a class="btn btn-primary" href="javascript:;">View More</a>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <Footer></Footer>
</template>

<script>
//axios library is use for get data from php laravel side
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
        const response = await axios.get('/api/getCommercialProjectsData');
        this.apiData = response.data;
        this.ongoingProjects = this.apiData.ongoing;
        this.completedProjects = this.apiData.completed;
      } catch (error) {
        console.error(error);
      }
    },
  },
};


</script>