<template>
	<div class="container">
		<div class="columns">
			<div class="column">
				<div class="box">

						<div class=" column">
						    <label class="label">Category Icon</label>
						    <div class="control">

						    	<ul>
						    		<!-- <li v-for="(icon , index) in icons" v-if="icon.isShortListed" > -->
						    		<li v-for="(icon , index) in icons"  >

						    			<b>{{ index }} </b>
						    			<i v-bind:class="icon.icon" class=" fa-2x" style="margin-left:5px;"></i>
						    			: {{ icon.icon }}

						    			<br>
						    		</li>
						    	</ul>

						    	<!-- <ul>
						    		<li v-for="(icon , index) in iconPlain" >

						    			{
						    			<br>

						    				&emsp;&emsp;type: 'fontawesome',
						    				<br>
						    				&emsp;&emsp;icon: '{{ icon }}',
						    				<br>
						    				&emsp;&emsp;selected: false,
						    				<br>
						    				&emsp;&emsp;isShortListed: false,
						    				<br>
						    				&emsp;&emsp;tags: ['fontawesome', '{{ icon }}' ]
						    				<br>

						    			},
						    		</li>
						    	</ul> -->
						    </div>
						</div>

						</div>




				</div>
			</div>
	</div>
</template>

<style>
.color-select{
    display: inline-block;
    padding: 14px;
    border-radius: 50%;
    margin-left: 5px;
    cursor: pointer;
    width: 50px;
    margin-bottom: 5px;
}

.is-selected{
	border: 5px solid gainsboro;
    width: 57px;
    height: 59px;
}
</style>


<script>
import faIcons from '../utilities/icons';

	export default{
		data(){
			return {
				icons : faIcons[0],
				iconPlain: faIcons[1]
			};
		}
	}
</script>
