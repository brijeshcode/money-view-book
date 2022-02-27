<template>
    <article class="message is-success">
        <div class="message-header">
            <p>
                Category<br />
                <span style="font-size: 10px;">{{ currentMonth }}</span>
            </p>
        </div>
        <div class="message-body transaction-body">
            <ul>
                <li class="panel-block transaction"
                    v-for="expense in expenses">

                    <div class="column is-2" style="padding: 0px;">
                        <category-icons :category="expense.category" text="hide"></category-icons>

                    </div>
                    <div class="column is-6">
                        <p class="title" v-text="expense.category.name"></p>
                    </div>

                    <div class="column is-4 transaction-ammount">
                        <span class="curreny" >
                            <i class="fas fa-2x fa-rupee-sign"></i>
                        </span>
                        <span class="amount" v-text="expense.amount"></span>
                        <p class="date" v-text="expense.percent_string"></p>
                    </div>
                </li>
            </ul>
            <!-- <div v-on:click="laodMore()">Load more</div> -->
        </div>
    </article>
</template>
<script>
import categoryIcons from '../common-components/icon.vue';
import Expenses from '../Models/Expense';
    export default{
        components: {
            'category-icons': categoryIcons
        },

        data(){
            return {
                found : 'no not found',
                expenses: [],
                page : 1,
                currentMonth: new Date().toLocaleDateString("en-US", {year: 'numeric', month: 'long'}).substr(0, 18),
            }
        },
        created(){

            Expenses.currentMonthReport(expenses =>  this.expenses = expenses );
            // Expenses.currentMonthReport(expenses => { expenses.length > 0 ? this.expenses = expenses : console.log('no data found')});
            // Expenses.currentMonthReport(expenses => { expenses.length > 0 ? this.found = expenses : this.found = 'no' ; });
            // Expenses.currentMonthReport(expenses => console.log( expenses));
            // console.log(this.expenses);
        },

        methods:{
            laodMore(){
                // console.log(this.found);
                /*this.page = this.page + 1;
                Expenses.all(expenses => this.expenses = expenses.data, this.page);*/

            }
        }
    };
</script>