<template>
    <div class="container">
        <div class="columns">
            <div class="column">Total This month: {{ total }} </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="columns">
                    <div class="column is-6">
                        <expense-transactions ></expense-transactions>
                    </div>

                    <div class="column is-6">
                        <add-expense></add-expense>
					</div>
				</div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
import addExpense from '../component/addExpense.vue';
import expenseTransactions from '../component/expenseTransaction.vue';
import Expenses from '../Models/Expense';

    export default {

        components: {
            'add-expense': addExpense,
            'expense-transactions': expenseTransactions,
        },

        data() {
           return  {
                total: 0,
		    }
        },

        created(){
            Expenses.monthTotal(totalExp => this.total = totalExp);
        },

        methods: {

        }
    };

</script>

