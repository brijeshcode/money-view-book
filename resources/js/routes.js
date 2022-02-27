import VueRouter from 'vue-router';
import Vue from 'vue';

let routes = [
	{
		path: '/',
		component: require('./views/Home').default,
		meta: {
	        title: 'Home',
	        subTitle: 'home sub',

	    },
	},
	{
		path: '/about',
		component: require('./views/About').default,
		meta: {
	        title: 'About',
	        subTitle: 'About expense',

	    },
	},
	{
		path: '/expense',
		component: require('./views/Expense').default,
		meta: {
	        title: 'Expense',
	        subTitle: 'Expense category list',

	    }
	},
	{
      	path: '/expense/add',
		component: require('./views/Expense/create').default,
		meta: {
	        title: 'Expense Add',
	        subTitle: 'Add new expense',
	    }
    },
	{
      	path: '/categories',
		component: require('./views/Categories').default,
		meta: {
	        title: 'Categories',
	        subTitle: 'List of categories',
	    }
    },
    {
      	path: '/icons',
		component: require('./views/Icons').default,
		meta: {
	        title: 'Fontawesome Icons',
	        subTitle: 'List of Icons',
	    }
    }
];

export default new VueRouter({
	routes,
	linkActiveClass: 'is-active'
});