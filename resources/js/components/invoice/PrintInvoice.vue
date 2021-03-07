<template>
    <div  id="printMe" class="site-content home-v3 page-template-template-homepage-v3 woocommerce-active" tabindex="-1">
        <!-- :style="'background-size:cover; background-position:center center; background-image:url( '+ this.storeSettings.config.background_image.value +' );'" -->
        <!--START INTRO LOCATION DEFINDER -->
        <form class="checkout woocommerce-checkout">
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="title" class="control-label">customer name</label>
                <input type="text" class="input-text form-control" disabled required name="customer_name" id="customer_name" v-model="invoice.customer_name" />
            </p>

            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="customer_number" class="control-label">customer number</label>
                <input type="text" class="input-text form-control" disabled required name="customer_number" id="customer_number" v-model="invoice.customer_number" />
            </p>

            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="customer_address" class="control-label">customer address</label>
                <input type="text" class="input-text form-control" disabled required name="customer_address" id="customer_address" v-model="invoice.customer_address" />
            </p>

            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="invoice_number" class="control-label">invoice number</label>
                <input type="text" class="input-text form-control" disabled required name="invoice_number" id="invoice_number" v-model="invoice.invoice_number" />
            </p>
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="invoice_date" class="control-label">invoice date</label>
                <input type="date" class="input-text form-control" disabled required name="invoice_date" id="invoice_date" v-model="invoice.invoice_date" />
            </p>
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="book_id" class="control-label">book</label>
                <select class="input-text form-control"  required disabled name="book_id" id="book_id" v-model="invoice.book_id" >

                    <option  v-for="book in books"
                             :key="book.id" :value="book.id">{{ book.title}}</option>
                </select>
            </p>

            <p class="form-row form-row-wide text-center validate-required" >
                <button class="button alt place-order " @click.prevent="printInvoice">print Invoice</button>
            </p>
        </form>

    </div>
</template>

<script>
import _ from "lodash";
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            invoice:{},
            books:{},
        };
    },
    mounted() {
        this.id = this.$route.params.id;
        axios.get("/api/v1/invoice/"+this.id).then(response => {
            this.invoice = response.data.invoice;
         });
        axios.get("/api/v1/books").then(response => {
            this.books = response.data.books;
        });

    },
    methods: {
        updateInvoice(){
            //Initialize the form data
            let formData = new FormData();
            // upload file
            let  _this = this;


            formData.append('book_id', this.invoice.book_id);
            formData.append('customer_name', this.invoice.customer_name);
            formData.append('customer_number', this.invoice.customer_number);
            formData.append('customer_address', this.invoice.customer_address);
            formData.append('invoice_number', this.invoice.invoice_number);
            formData.append('invoice_date', this.invoice.invoice_date);

            /*
              Make the request to the POST /single-file URL
            */

            axios.post('/api/v1/invoice/save',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                }
            ).then(response => {
                _this.$swal({
                    icon: 'success',
                    title: 'Order Saved',
                    text: 'Order Saved',
                }).then((result) => {

                    return this.$router.push({path: '/invoices'});
                });
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.messages || {};
                }
                if (error.response.status === 500) {
                    _this.$swal({
                        icon: 'error',
                        title: _this.$t('pages.book_not_updated'),
                        text: _this.$t('pages.book_not_updated_error'),
                    });
                }
            });
        },
        printInvoice()
        {
            window.print();
        }

    },

};
</script>

