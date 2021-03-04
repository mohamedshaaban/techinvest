<template>
    <div  id="content" class="site-content home-v3 page-template-template-homepage-v3 woocommerce-active" tabindex="-1">
        <!-- :style="'background-size:cover; background-position:center center; background-image:url( '+ this.storeSettings.config.background_image.value +' );'" -->
        <!--START INTRO LOCATION DEFINDER -->
        <form class="checkout woocommerce-checkout">
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="title" class="control-label">Title</label>
                <input type="text" class="input-text form-control"  required name="title" id="title" v-model="book.title" />
            </p>

            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="description" class="control-label">description</label>
                <input type="text" class="input-text form-control"  required name="description" id="description" v-model="book.description" />
            </p>

            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="price" class="control-label">price</label>
                <input type="number" class="input-text form-control"  required name="price" id="price" v-model="book.price" />
            </p>

            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="shipping_price" class="control-label">shipping price</label>
                <input type="number" class="input-text form-control"  required name="shipping_price" id="shipping_price" v-model="book.shipping_price" />
            </p>
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="discount_precentage" class="control-label">Discount Precentage</label>
                <input type="number" class="input-text form-control"  required name="discount_precentage" id="discount_precentage" v-model="book.discount_precentage" />
            </p>
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="shipping_price" class="control-label">final price</label>
                <input type="number" class="input-text form-control"  required name="final_price" id="final_price" v-model="book.final_price" />
            </p>
            <p class="form-row form-row-first validate-required" id="billing_addresse_name">
                <label for="shipping_price" class="control-label">Sold</label>
                <input type="checkbox" class="input-text form-control"  required name="sold" id="sold" v-model="book.sold" value="1" />
            </p>
            <p class="form-row form-row-wide text-center validate-required" >
                <button class="button alt place-order " @click.prevent="updateBook">save Book</button>
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
            book:{},
        };
    },

    mounted() {


    },
    methods: {
        updateBook(){
            //Initialize the form data
            let formData = new FormData();
            // upload file
            let  _this = this;


            formData.append('title', this.book.title);
            formData.append('description', this.book.description);
            formData.append('price', this.book.price);
            formData.append('shipping_price', this.book.shipping_price);
            formData.append('discount_precentage', this.book.discount_precentage);
            formData.append('final_price', this.book.final_price);
            formData.append('sold', this.book.sold);
            /*
              Make the request to the POST /single-file URL
            */

            axios.post('/api/v1/book/save',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                }
            ).then(response => {
                _this.$swal({
                    icon: 'success',
                    title: 'Book Saved',
                    text: 'Book Saved',
                }).then((result) => {

                    return this.$router.push({path: '/home'});
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

    },

};
</script>

