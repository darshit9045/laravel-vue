<template>
  <HeaderComponent :array-data="myArray"></HeaderComponent>
  <HomeComponent></HomeComponent>

</template>
<script>
import {defineComponent} from "vue";
import HomeComponent from "./components/HomeComponent.vue";
import HeaderComponent from "./components/HeaderComponent.vue";

export default defineComponent({
  components: {HeaderComponent, HomeComponent},
  name: 'App',
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
  data() {
    return {
      myArray: [1, 2, 3, 4, 5],
    };
  },
})

</script>