<template>
    <div class="columns">
        <div class="column">
            <div class="box">
                <h2 class="title">Add</h2>
                <form @submit.prevent="onSubmti" @keydown="form.errors.clear()">

                    <div class="field">
                        <div>Amount*</div>
                        <div class="control has-icons-left">
                            <input class="input" type="number" placeholder="Enter Amount" v-model="form.amount" />
                            <span class="icon is-small is-left">
                                <i class="fas fa-rupee-sign"></i>
                            </span>
                        </div>
                        <!-- <error></error> -->
                        <spam class="help is-danger" v-if="form.errors.has('amount')" v-text="form.errors.get('amount')"></spam>
                    </div>

                    <div class="field">
                        <div>Title*</div>
                        <div class="control has-icons-left">
                            <input class="input" type="text" placeholder="Title" v-model="form.transaction_title" />
                            <span class="icon is-small is-left">
                                <i class="fas fa-store-alt"></i>
                            </span>
                        </div>
                        <!-- <error></error> -->
                        <spam class="help is-danger" v-if="form.errors.has('transaction_title')" v-text="form.errors.get('transaction_title')"></spam>
                    </div>

                    <div class="field">
                        <div>Date*</div>
                        <div class="control has-icons-left">
                            <input class="input" type="date" placeholder="Date" v-model="form.date" />

                            <span class="icon is-small is-left">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                        <spam class="help is-danger" v-if="form.errors.has('date')" v-text="form.errors.get('date')"></spam>

                    </div>

                    <div class="field">
                        <div style="margin-bottom:20px;">Category* <span v-if="loadAll" v-on:click="laodAllCategories()">All Categories</span></div>
                        <spam class="help is-danger" v-if="form.errors.has('category_id')" v-text="form.errors.get('category_id')"></spam>
                        <div class=" columns is-multiline has-icons-left">

                            <div class="categories column "
                                v-for="category in categories"
                                v-on:click="categorySelected(category.id)"
                                >
                                <div class="category-icon"
                                v-bind:style="{background: category.color}"
                                >
                                    <i v-if="category.icon_type == 'fontawesome'" v-bind:class="category.class_or_path"></i>
                                    <span v-if="category.icon_type == 'character'" v-text="category.name.charAt(0)"></span>

                                </div>
                                <p v-text="category.name"></p>
                            </div>

                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import faIcons from '../utilities/icons';
    import colors from '../utilities/colors';
    import Categories from '../Models/Category';
    export default {
        data() {
            return {
                categories: [],
                activeIcon: "",
                loadAll: true,
                form: new Form({
                    transaction_title: "",
                    date: "",
                    transaction_type: "",
                    amount: "",
                    category_id: "",
                    updated_by: "",
                    added_by: "",
                }),
            };
        },
        created(){
            Categories.recent(category => this.categories = category);
        },
        methods: {
            onSubmti() {
                this.loadAll = true;
                this.form.post("/expense").then((expense) => this.$emit("completed", expense));
                this.$router.push("/expense");
                // Categories.recent(category => this.categories = category);
            },

			categorySelected(category){
                this.form.updated_by = 1;
                this.form.added_by = 1;
                this.form.transaction_type = "Expense";
				this.form.category_id = category;
			},

            laodAllCategories(){
                this.loadAll = false;

                Categories.all(category => this.categories = category);

            }
        },
    };
</script>
