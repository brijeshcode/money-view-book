<template>
	<div class="container">
		<div class="columns">
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
				statuses:[]
			}
		},
		created(){
			Status.all(statusesData => this.statuses = statusesData);
		}

		,
		methods:{
			postedOn(status){
				return moment(status.created_at).fromNow();
			},

			addStatus(status){
				this.statuses.unshift(status);
				alert('Your message have be added');
				window.scrollTo(0,0);
			}
		}
	}
</script>