document.querySelector('form').onsubmit = check;

function check(event) {
	event.preventDefault();
	username = document.querySelector('[name=username]');
	password = document.querySelector('[name=password]');
	csrftoken = document.querySelector('[name=csrftoken]').value;
	
	var content = { "username": username.value,
					"password": password.value, 
					"csrftoken": csrftoken,
					"method": document.querySelector('form').method
				};

	var myHeaders = new Headers({
		"Content-Type": "application/json",
		"Accept": "application/json",
		"X-Custom-Header": "ProcessThisImmediately",
	});

	var myInit = { method: 'POST',
	headers: myHeaders,
	credentials: "same-origin",
	mode: 'same-origin',
	body: JSON.stringify(content) };

	var url = 'login/check';

	var myRequest = new Request(url, myInit);

	fetch(myRequest)
	.then(response => {
		return response.json();
	})
	.then(data => {
		var message = document.getElementById('message');
		var type = document.getElementById('type_messaje');
		if (data['rs'] == true) {
			window.location.href="dashboard";
		}else if(data['rs'] == false){
			window.location.href = "login";
		}else{
			alert(data['rs']);
			username.value = "";
			password.value = "";
		}
	})
	.catch(ex => {
		console.log("parsing failed", ex);
	});
}