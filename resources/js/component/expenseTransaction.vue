<template>
    <article class="message is-primary">
        <div class="message-header">
            <p>
                Latest Transactions<br />
                <span style="font-size: 10px;">Updated As on {{ lastTranstionDate }}</span>
            </p>
            <router-link  class="navbar-item" to="/expense/add">
                Add
            </router-link>

        </div>
        <div class="message-body transaction-body">
            <ul>
                <li class="panel-block transaction"
                    v-for="expense in expenses">

                    <div class="column is-2" style="padding: 0px;">
                        <category-icons :category="expense.category" text="hide"></category-icons>

                    </div>
                    <div class="column is-6">
                        <p class="title" v-text="expense.transaction_title"></p>
                        <p class="category" v-text="expense.category.name"></p>
                        <!-- <p class="type" v-text="expense.transaction_type"></p> -->
                    </div>

                    <div class="column is-4 transaction-ammount">
                        <span class="curreny" >
                            <i class="fas fa-2x fa-rupee-sign"></i>
                        </span>
                        <span class="amount" v-text="expense.amount"></span>
                        <p class="date" v-text="addedOn(expense.date)"></p>
                    </div>
                </li>
            </ul>
            <div class="simplePagionation">
                <div v-on:click="next()">Next</div>
                <div v-if="showPervous" v-on:click="previous()">Back</div>
            </div>
        </div>
    </article>
</template>
<style type="text/css">
    .simplePagionation{
        display: flex;
        justify-content: space-between;
    }
    .simplePagionation div{
        cursor: pointer;
    }
    .icon-img {
        text-align: center;
        border-radius: 58%;
        display: table-cell;
        vertical-align: middle;
        height: 45px;
        width: 45px;
        background: #c1a9a9;
        position: relative;
    }
    .transaction-body{
        padding: 0px;
        border: none;
    }
    .transaction img.icon {
        width: 60%;
        height: 60%;
    }
    .transaction .title {
        font-size: 15px;
        font-weight: normal;
        text-transform: capitalize;
        margin-bottom: 5px;
    }

    .transaction p.category {
        font-size: 12px;
        color: gray;
    }

    .transaction p.type {
        font-size: 10px;
        color: gray;
    }
    .transaction .curreny {
        font-size: 7px;
        color: #7aa3cc;
    }

    .transaction .amount {
        font-size: 25px;
    }

    .transaction-ammount{
        text-align: right;
    }

    .transaction .date {
        color: gray;
        font-size:14px;
    }
</style>
<script>
import moment from 'moment';
import categoryIcons from '../common-components/icon.vue';
import Expenses from '../Models/Expense';
    export default{
        components: {
            'category-icons': categoryIcons
        },

        data(){
            return {
                expenses: [],
                page : 1,
                showPervous: false,
                hideNext: false,
                lastTranstionDate: new Date().toLocaleDateString("hi-IN", {year: 'numeric', month: 'long', day: 'numeric'}).substr(0, 18),
            }
        },
        created(){
            Expenses.all(expenses => this.expenses = expenses.data);
        },

        methods:{
            addedOn(date){
                return moment(date).format('DD MMM');
            },
            next(){
                this.page = this.page + 1;
                Expenses.all(expenses => this.expenses = expenses.data, this.page);
                this.showPervous  = this.page <= 1 ? false: true;
            },
            previous(){
                this.page = this.page - 1;
                Expenses.all(expenses => this.expenses = expenses.data, this.page);
                this.showPervous  = this.page <= 1 ? false: true;
            }
        }
    };
</script>