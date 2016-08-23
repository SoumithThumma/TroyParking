window.sdkAsyncInit = function() {
			// Instantiate the SDK
			var res = new EDMUNDSAPI('r4nd99j8b5qf58dzv8cj7zxs');

			// Optional parameters
			var options = {};
			// Callback function to be called when the API response is returned
			function success(res) {
				var dropdown = document.getElementById('Make');
				for(var i = 0;i < res.makesCount;i++)
				{
					if(i == 0)
					{
						var option = document.createElement('option');
						option.text = "";
						dropdown.add(option);
						option = document.createElement('option');
						option.text = res.makes[i].name;
						dropdown.add(option);
					}
					else
					{
						var option = document.createElement('option');
						option.text = res.makes[i].name;
						dropdown.add(option);
					}
				}
			}
			function Model(res) {

				var dropdown = document.getElementById('Model');
				for(var i = 0;i < res.modelsCount;i++)
				{
					if(i == 0)
					{
						var option = document.createElement('option');
						option.text = "";
						dropdown.add(option);
						option = document.createElement('option');
						option.text = res.models[i].name;
						dropdown.add(option);
					}
					else
					{
						var option = document.createElement('option');
						option.text = res.models[i].name;
						dropdown.add(option);
					}
				}
			}
			function Year(res) {
				var dropdown = document.getElementById('Year');
				for(var i = 0;i < res.yearsCount;i++)
				{
					if(i == 0)
					{
						var option = document.createElement('option');
						option.text = "";
						dropdown.add(option);
						option = document.createElement('option');
						option.text = res.years[i].year;
						dropdown.add(option);
					}
					else
					{
						var option = document.createElement('option');
						option.text = res.years[i].year;
						dropdown.add(option);
					}
				}
			}
			
			
			function APIModel()
			{
				var select = document.getElementById("Model");
				if(select.text != ""){select.text = "";}
				var length = select.options.length;
				for (i = 0; i < length; i++) 
				{
				  select.remove(0);
				}
				select = document.getElementById("Year");
				if(select.text != ""){select.text = "";}	
				length = select.options.length;
				for (i = 0; i < length; i++) 
				{
				  select.remove(0);
				}
				select = document.getElementById("Color");
				if(select.text != ""){select.selectedIndex = null;}
				
				var MakeSelect = document.getElementById("Make");
				var Maketxt = MakeSelect.options[MakeSelect.selectedIndex].text;
				res.api('/api/vehicle/v2/' + Maketxt + '/models/', options, Model, fail);
			}
			function APIYear()
			{
				var select = document.getElementById("Year");
				if(select.text != ""){select.text = "";}	
				var length = select.options.length;
				for (i = 0; i < length; i++) 
				{
				  select.remove(0);
				}
				select = document.getElementById("Color");
				if(select.text != ""){select.selectedIndex = null;}	

				var MakeSelect = document.getElementById("Make");
				var Maketxt = MakeSelect.options[MakeSelect.selectedIndex].text;	
				var ModelSelect = document.getElementById("Model");
				var Modeltxt = ModelSelect.options[ModelSelect.selectedIndex].text;
				res.api('/api/vehicle/v2/' + Maketxt + '/' + Modeltxt + '/years/', options, Year, fail);
			}
			
			// Oops, Houston we have a problem!
			function fail(data) {
				console.log(data);
			}
			// Fire the API call
			res.api('/api/vehicle/v2/makes/', options, success, fail);
			

			// Additional initialization code such as 
			// adding Event Listeners goes here
			
			document.getElementById('Make').addEventListener("change", APIModel);
			document.getElementById('Model').addEventListener("change", APIYear);
			
		};
	// Load the SDK asynchronously
	(function(d, s, id){
		var js, sdkjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "sdk-javascript-master/edmunds.api.sdk.js";
		sdkjs.parentNode.insertBefore(js, sdkjs);
	}(document, 'script', 'edmunds-jssdk'));