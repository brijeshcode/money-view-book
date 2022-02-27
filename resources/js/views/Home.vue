<template>
	<div class="container">
		<!-- <div class="columns">
			<div class="column">
				<div class="message" v-for="status in statuses" >
					<div class="message-header">
						<p>{{ status.user.name }} said ...</p>
						<p>{{ postedOn(status) }} ...</p>
					</div>
					<div class="message-body">{{ status.body }}</div>
				</div>
				<add-to-streams @completed="addStatus"></add-to-streams>
			</div>
		</div> -->
		<div class="columns">
			<div class="column">
				<input type="number" v-model="year" min="2000" max="2050" step="1" required="true">
			</div>
			<div class="column">
				<select v-model="month">
					<option v-for="month in months" v-text="month"></option>
				</select>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<table class="table">
				 	<thead>
				 		<tr>
				 			<th v-for="day in week">{{ day }}</th>
				 		</tr>
				 	</thead>
				 	<tfoot>
				 		<tr>
				 			<th v-for="day in week">{{ day }}</th>
				 		</tr>
				 	</tfoot>

				 	<tbody>
				 		<tr v-for="weekRow in weekcount">
				 			<td v-for="(weekDay , index) in week" >
				 				<span v-if="canStartMonth(index, week , weekRow)">
				 					<div v-if="printDate(index, weekRow)">
					 					<input type="text" placeholder="first half">
					 					<input type="text" placeholder="second half">
					 					<input type="number" placeholder="working hours" value="0" min="0">
				 					</div>
				 				 {{ printDate(index, weekRow) }}
				 				</span>
				 			</td>
				 		</tr>
				 	</tbody>

				 </table>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
import moment from 'moment';
import AddToStream from '../component/addToStream.vue';
import Status from '../Models/Status';

	export default {
		components: {
			'add-to-streams': AddToStream
		},

		data(){
			return {
				xdate: 1,
			    year: moment().year().toString(),
			    month: moment().format("MMMM"),
			    months: moment.months(),
				week: moment.weekdays(),
				statuses:[],
			}
		},

		created(){
			// Status.all(statusesData => this.statuses = statusesData);
		},
		computed:{
			weekcount: function(){
				let weekcount = 0;
				for(let days = 1 ; days <= this.testtemp.monthSize; days++){
					if (weekcount > 0) {
						days = days + 6;
					}else{
						days = 7 - this.week.indexOf(this.testtemp.firstDay);
					}
					weekcount += 1;
				}
				return weekcount;
			},
			testtemp: function(){
				let date = this.year+"-"+this.month+"-01";
				let month = this.year+"-"+this.month;
				let para = {
					firstDay: moment(date, 'YYYY-MMMM-01').format("dddd"),
			      	monthSize: parseInt(moment(month).daysInMonth()),
				}
				return para;
			}
		},
		methods:{
			postedOn(status){
				return moment(status.created_at).fromNow();
			},

			canStartMonth(index, week, weekRow){
				if(weekRow > 1){
					return true;
				}
				if(index >= week.indexOf(this.testtemp.firstDay)){
					return  true;
				};
			},

			printDate(index, weekRow){
				let temp = this.week.indexOf(this.testtemp.firstDay);
				let todayDate =  ((7 * (weekRow - 1))  + (index + 1)) - temp;

				if (todayDate <= this.testtemp.monthSize) {
					return todayDate;
				}
				return '';
			},
			addStatus(status){
				this.statuses.unshift(status);
				alert('Your message have be added');
				window.scrollTo(0,0);
			}
		}
	};
</script>
<style>
table input{
	width: 50PX;;
}
</style>