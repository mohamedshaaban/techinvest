<template>
    <div  id="content" class="site-content home-v3 page-template-template-homepage-v3 woocommerce-active" tabindex="-1">
        <!-- :style="'background-size:cover; background-position:center center; background-image:url( '+ this.storeSettings.config.background_image.value +' );'" -->
        <!--START INTRO LOCATION DEFINDER -->
        <router-link :to="'/invoice/add'">
            Add Invoice
        </router-link>
        <table  class="table"
        >
            <thead>
            <tr>
                <td>Book </td>
                <td>Customer Name</td>
                <td>Customer Number</td>
                <td>Customer Address</td>
                <td>Total</td>
            </tr>
            </thead>




            <tbody>
            <tr v-for="invoice in invoices"
                :key="invoice.id">
                <td>{{ invoice.books.title }}</td>
                <td>{{ invoice.customer_name}}</td>
                <td>{{ invoice.customer_number}}</td>
                <td>{{invoice.customer_address}}</td>
                <td>{{ invoice.total}}</td>

            </tr>
            </tbody>

        </table>


    </div>
</template>

<script>
import _ from "lodash";
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            invoices:{},
        };
    },
    mounted() {
        axios.get("/api/v1/invoice").then(response => {
            this.invoices = response.data.orders;
        });


    },
    methods: {


    },

};
</script>

