import axios from 'axios';
// general routes
import Home from '../views/pages/Home.vue';
import AboutUs from '../views/pages/AboutUs.vue';
import ContactUs from "../views/pages/ContactUs.vue";
import ResidentialProjects from "../views/pages/projects/ResidentialProjects.vue";
import CommercialProjects from "../views/pages/projects/CommercialProjects.vue";
import MalabarExotica from "../views/pages/projects/MalabarExotica.vue";

export default [
  {
    path: '/',
    component: Home,
    name: 'home',
  },
  {
    path: '/about-us',
    component: AboutUs,
    name: 'about-us',
  },
  {
    path: '/contact-us',
    component: ContactUs,
    name: 'contact-us',
  },
  {
    path: '/residential-projects',
    component: ResidentialProjects,
    name: 'residential-projects',
  },
  {
    path: '/commercial-projects',
    component: CommercialProjects,
    name: 'commercial-projects',
  },
  {
    path: '/malabar-exotica',
    component: MalabarExotica,
    name: 'malabar-exotica',
  },
];
export const routes = [
  {
    path: '/getHompageData',
    component: Home,
    props: route => ({ apiData: route.meta.apiData }), // Pass the API data as a prop
  },
  {
    path: '/getAboutUsData',
    component: AboutUs,
    props: route => ({ apiData: route.meta.apiData }), // Pass the API data as a prop
  },
  {
    path: '/getContactUsData',
    component: ContactUs,
    props: route => ({ apiData: route.meta.apiData }), // Pass the API data as a prop
  },
  {
    path: '/getResidentialProjectsData',
    component: ResidentialProjects,
    props: route => ({ apiData: route.meta.apiData }), // Pass the API data as a prop
  },
  {
    path: '/getMalabarExoticaData',
    component: MalabarExotica,
    props: route => ({ apiData: route.meta.apiData }), // Pass the API data as a prop
  },
];

// Fetch the API data before the route is resolved
routes[0].beforeEnter = async (to, from, next) => {
  try {
    const response = await axios.get('/api/data');
    const apiData = response.data;
    to.meta.apiData = apiData; // Store the data in the route's meta object
    next();
  } catch (error) {
    console.error(error);
    next(error);
  }
};
// console.log(routes);