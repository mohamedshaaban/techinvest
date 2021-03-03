<template>
    <div  id="content" class="site-content home-v3 page-template-template-homepage-v3 woocommerce-active" tabindex="-1">
        <!-- :style="'background-size:cover; background-position:center center; background-image:url( '+ this.storeSettings.config.background_image.value +' );'" -->
        <!--START INTRO LOCATION DEFINDER -->
5

        5
        5
        5

        5
        
    </div>
</template>

<script>
import _ from "lodash";
 import { mapGetters } from "vuex";

export default {
    data() {
        return {

        };
    },
    computed: {

    },
    mounted() {
        axios.get("/api/v1/country/governatesareas").then(response => {
            this.governates = response.data.governates;
        });

        axios.post("api/v1/restaurant/area").then(response => {
             this.area = response.data.area;
            this.fields.area_id = response.data.selectedarea;
            this.categories = response.data.categories;
        });

    },
    computed: {

    },
    methods: {

    }
};
</script>

