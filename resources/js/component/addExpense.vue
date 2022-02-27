<template>
    <div class="columns">
        <div class="column">
            <div class="box">
                <h2 class="title">Add</h2>
                <form @submit.prevent="onSubmti" @keydown="form.errors.clear($event.target.name)">

                    <!-- <f-form-radio
                    :radios="radios"
                    label="Select Your Gender"
                    name="radiortesr"
                    v-model="form.radio"
                    ></f-form-radio> -->


                    <!-- <f-form-checkbox
                        label="Checkbox"
                        v-model="form.transaction_title"
                        checkedVal="new"
                        unCheckedVal="falsevalue"
                    ></f-form-checkbox> -->

                    <!-- <f-form-checkbox
                        label="Checkbox"
                        v-model="form.transaction_title"
                        checkedVal="other"
                        false="you"
                    ></f-form-checkbox> -->

                    <f-field-input
                        type="text"
                        placeholder="Enter Amount"
                        label="Amount*"
                        name="amount"
                        icon="fas fa-rupee-sign"
                        v-model="form.amount"
                        v-bind:error="form.errors.has('amount')"
                        v-bind:errmsg="form.errors.get('amount')"
                    ></f-field-input>

                    <f-field-input
                        type="text"
                        placeholder="Enter Title"
                        v-model="form.transaction_title"
                        label="Title*"
                        name="transaction_title"
                        icon="fas fa-rupee-sign"
                        v-bind:error="form.errors.has('transaction_title')"
                        v-bind:errmsg="form.errors.get('transaction_title')"
                    ></f-field-input>

                    <f-field-input
                        type="date"
                        placeholder="Enter Date"
                        v-model="form.date"
                        label="Date*"
                        name="date"
                        icon="fas fa-calendar-alt"
                        v-bind:error="form.errors.has('date')"
                        v-bind:errmsg="form.errors.get('date')"
                    ></f-field-input>

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
    import formComponentsLoader from '../common-components/form/loader';

    export default {
        data() {
            return {
                categories: [],
                activeIcon: "",
                loadAll: true,
                form: new Form({
                    amount: "",
                    select: "",
                    radio: "",
                    transaction_title: "falsevalue",
                    transaction_type: "",
                    date: new Date().toISOString().substr(0, 10),
                    category_id: "",
                    updated_by: "",
                    added_by: ""
                }),
                some: []
            };
        },
        created(){
            // this.form.date = "";
            Categories.recent(category => this.categories = category);
            this.some= [
                {edit: false},
                {edit: false},
                {edit: false},
                {edit: true},
                {edit: true},
            ];
        },
        methods: {
            onSubmti() {
                console.log('submitted');
                console.log(this.form.transaction_title);
                this.loadAll = true;
                this.form.post("/expense").then((expense) => this.$emit("completed", expense));
                // this.$router.push("/expense");
            },
            changesome(index){
                this.some[index].edit = !this.some[index].edit;
                // console.log(this.some[index].edit);
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
