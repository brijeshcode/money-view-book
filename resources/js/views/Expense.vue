<template>
    <div class="container">
        <div class="columns">
            <div class="column">Total This month: {{ total }} </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="columns">
                    <div class="column is-4">
                        <expense-transactions ></expense-transactions>
                    </div>
                    <div class="column is-4">
                         <expense-category ></expense-category>
                    </div>
				</div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
import addExpense from '../component/addExpense.vue';
import expenseTransactions from '../component/expenseTransaction.vue';
import expenseCategory from '../component/expenseByCategory.vue';
import Expenses from '../Models/Expense';

    export default {
        components: {
            // 'add-expense': addExpense,
            'expense-transactions': expenseTransactions,
            'expense-category': expenseCategory,
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

