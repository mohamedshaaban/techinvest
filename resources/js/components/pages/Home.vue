<template>
    <div  id="content" class="site-content home-v3 page-template-template-homepage-v3 woocommerce-active" tabindex="-1">
        <!-- :style="'background-size:cover; background-position:center center; background-image:url( '+ this.storeSettings.config.background_image.value +' );'" -->
        <!--START INTRO LOCATION DEFINDER -->

        <router-link :to="'/book/add'">
            Add new Book
        </router-link>
        <router-link :to="'/invoices'">
            invoices
        </router-link>
        <table  class="table"
                 >
            <thead>
            <tr>
                <td>Book ID</td>
                <td>Title</td>
                <td>price</td>
                <td>image</td>
                <td>shipping price</td>
                <td>discount precentage</td>
                <td>final price</td>
                <td>Action</td>
            </tr>
            </thead>

            <tbody>
            <tr v-for="book in books"
                :key="book.id">
                 <td>{{ book.id }}</td>
                <td>{{ book.title}}</td>
                <td>{{ book.price}}</td>
                <td><img :src="'/'+ book.image_path" width="40" height="40"/></td>
                <td>{{book.shipping_price}}</td>
                <td>{{ book.discount_precentage}}</td>
                <td>{{book.final_price}}</td>
                <td>
                     <router-link :to="'/book/edit/'+book.id">
                        Edit
                    </router-link>
                    <a href="#" class="delete-4-cart" @click.prevent="deleteBook(book)">
                        Delete
                    </a>
                </td>
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
            books:{},
        };
    },

    mounted() {
        axios.get("/api/v1/books").then(response => {
            this.books = response.data.books;
        });


    },
    methods: {
        deleteBook(book) {
            this.$swal({
                title: 'are you sure',
                text: 'you wont to able revert',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText:  ('Cancel'),
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText:'yes delete it'
            }).then((result) => {
                if (result.value) {
                    axios.get("/api/v1/book/delete/"+book.id).then(response => {
                        this.books = response.data.books;
                    });
                }
            });
        }
    },

};
</script>

